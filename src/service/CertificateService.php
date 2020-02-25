<?php

namespace IXDomainRobot\Service;

use IXDomainRobot\DomainRobot;
use IXDomainRobot\Lib\ArrayHelper;
use IXDomainRobot\Lib\DomainRobotConfig;
use IXDomainRobot\Lib\DomainRobotPromise;
use IXDomainRobot\Model\Certificate;
use IXDomainRobot\Model\CertificateData;
use IXDomainRobot\Model\ObjectJob;
use IXDomainRobot\Model\Query;
use IXDomainRobot\Service\DomainRobotService;

class CertificateService extends DomainRobotService
{
    private $certificateModel;

    /**
     *
     * @param Certificate $certificateModel
     * @param DomainRobotConfig $domainRobotConfig
     */
    public function __construct(Certificate $certificateModel, DomainRobotConfig $domainRobotConfig)
    {
        parent::__construct($domainRobotConfig);
        $this->certificateModel = $certificateModel;
    }

    /**
     * Orders a certificate. The prepareOrder tasks should be called before to
     * generate the necessary DCV data. Returns a Job with an id that can be used
     * for polling.
     *
     * @return Objectjob
     */
    public function create()
    {
        $domainRobotPromise = $this->createAsync();
        $domainRobotResult = $domainRobotPromise->wait();

        DomainRobot::setLastDomainRobotResult($domainRobotResult);

        return new ObjectJob([
            "job" => ArrayHelper::getValueFromArray($domainRobotResult->getResult(), 'data.0.id', ''),
            "object" => $this->certificateModel->getName()
        ]);
    }
    /**
     * Orders a certificate. The prepareOrder tasks should be called before to
     * generate the necessary DCV data. Returns a Job with an id that can be used
     * for polling.
     *
     * @return DomainRobotPromise
     */
    public function createAsync()
    {
        $this->prepareCsr();

        return $this->sendPostRequest(
            $this->domainRobotConfig->getUrl() . "/certificate",
            $this->certificateModel->toArray(true)
        );
    }

    /**
     * Orders a certificate in realtime. The prepareOrder tasks should be called
     * before to generate the necessary DCV data.
     * 
     * **Note:** This works only for certain DV certificate products and dcv
     * methods.
     * 
     * @return Certificate
     */
    public function realtime()
    {
        $domainRobotPromise = $this->realtimeAsync();
        $domainRobotResult = $domainRobotPromise->wait();

        DomainRobot::setLastDomainRobotResult($domainRobotResult);

        return new Certificate(ArrayHelper::getValueFromArray($domainRobotResult->getResult(), 'data.0', []));
    }

    /**
     * Orders a certificate in realtime. The prepareOrder tasks should be called
     * before to generate the necessary DCV data.
     * 
     * **Note:** This works only for certain DV certificate products and dcv
     * methods.
     * 
     * @return DomainRobotPromise
     */
    public function realtimeAsync()
    {
        $this->prepareCsr();

        return $this->sendPostRequest(
            $this->domainRobotConfig->getUrl() . "/certificate/_realtime",
            $this->certificateModel->toArray(true)
        );
    }
    /**
     * Check the csr and generate DCV data for an order, renew and reissue. This
     * should be called everytime before the following tasks :
     * 
     * * realtime
     * * create
     * * reissue
     * * renew
     * 
     * @return CertificateData
     */
    public function prepareOrder()
    {
        $domainRobotPromise = $this->prepareOrderAsync();
        $domainRobotResult = $domainRobotPromise->wait();

        DomainRobot::setLastDomainRobotResult($domainRobotResult);

        return new CertificateData(ArrayHelper::getValueFromArray($domainRobotResult->getResult(), 'data.0', []));
    }

    /**
     * Check the csr and generate DCV data for an order, renew and reissue. This
     * should be called everytime before the following tasks :
     * 
     * * realtime
     * * create
     * * reissue
     * * renew
     *
     * @return DomainRobotPromise
     */
    public function prepareOrderAsync()
    {
        $this->prepareCsr();

        $certDataModel = new CertificateData();
        $certDataModel->setPlain($this->certificateModel->getCsr());

        return new DomainRobotPromise($this->sendPostRequest(
            $this->domainRobotConfig->getUrl() . "/certificate/_prepareOrder",
            $certDataModel->toArray(true)
        ));
    }

    /**
     * Sends a certificate list request.
     *
     * @return Certificate[]
     */
    public function list(Query $query = null)
    {
        $domainRobotPromise = $this->listAsync($query);
        $domainRobotResult = $domainRobotPromise->wait();

        DomainRobot::setLastDomainRobotResult($domainRobotResult);
        $data = $domainRobotResult->getResult()['data'];
        $certs = array();
        foreach ($data as $d) {
            $c = new Certificate($d);
            array_push($certs, $c);
        }
        return $certs;
    }

    /**
     * Sends a certificate list request.
     *
     * @return DomainRobotPromise
     */

    public function listAsync(Query $query = null)
    {

        if ($query === null) {
            return new DomainRobotPromise($this->sendPostRequest(
                $this->domainRobotConfig->getUrl() . "/certificate/_search",
                null
            ));
        } else {
            return new DomainRobotPromise($this->sendPostRequest(
                $this->domainRobotConfig->getUrl() . "/certificate/_search",
                $query->toArray(true)
            ));
        }
    }

    /**
     * Fetches the information for an existing certificate.
     *
     * @param [int] $id
     * @return CertificateData
     */
    public function info($id)
    {
        $domainRobotPromise = $this->infoAsync($id);
        $domainRobotResult = $domainRobotPromise->wait();


        return new CertificateData(ArrayHelper::getValueFromArray($domainRobotResult->getResult(), 'data.0', []));
    }

    /**
     * Fetches the information for an existing certificate.
     *
     * @param [int] $id
     * @return GuzzleHttp\Promise\PromiseInterface $promise
     */
    public function infoAsync($id)
    {
        return $this->sendGetRequest(
            $this->domainRobotConfig->getUrl() . "/certificate/$id"
        );
    }

    /**
     * Deletes an existing certificate. Returns a Job with an id that can be used
     * for polling.
     *
     * @param [int] $id
     * @return Certificate
     */
    public function delete($id)
    {
        $domainRobotPromise = $this->deleteAsync($id);
        $domainRobotResult = $domainRobotPromise->wait();

        return new Certificate(ArrayHelper::getValueFromArray($domainRobotResult->getResult(), 'data.0', []));
    }


    /**
     * Deletes an existing certificate. Returns a Job with an id that can be used
     * for polling.
     *
     * @param [int] $id
     * @return GuzzleHttp\Promise\PromiseInterface $promise
     */
    public function deleteAsync($id)
    {
        return $this->sendDeleteRequest(
            $this->domainRobotConfig->getUrl() . "/certificate/$id",
            // $this->certificateModel->toArray(true)
        );
    }


    /**
     * Reissue a certificate. The prepareOrder tasks should be called before to
     * generate the necessary DCV data. Returns a Job with an id that can be used
     * for polling.
     *
     * @param [int] $id
     * @return ObjectJob
     */
    public function reissue($id)
    {
        $domainRobotPromise = $this->reissueAsync($id);
        $domainRobotResult = $domainRobotPromise->wait();

        DomainRobot::setLastDomainRobotResult($domainRobotResult);

        return new ObjectJob([
            "job" => ArrayHelper::getValueFromArray($domainRobotResult->getResult(), 'data.0.id', ''),
            "object" => $this->certificateModel->getName()
        ]);
    }

    /**
     * Reissue a certificate. The prepareOrder tasks should be called before to
     * generate the necessary DCV data. Returns a Job with an id that can be used
     * for polling.
     *
     * @param [int] $id
     * @return GuzzleHttp\Promise\PromiseInterface $promise
     */
    public function reissueAsync($id)
    {
        return $this->sendPutRequest(
            $this->domainRobotConfig->getUrl() . "/certificate/$id",
            $this->certificateModel->toArray(true)
        );
    }


    /**
     * Renew a certificate. The prepareOrder tasks should be called before to
     * generate the necessary DCV data. Returns a Job with an id that can be used
     * for polling.
     *
     * @param [int] $id
     * @return ObjectJob
     */
    public function renew($id)
    {
        $domainRobotPromise = $this->renewAsync($id);
        $domainRobotResult = $domainRobotPromise->wait();

        DomainRobot::setLastDomainRobotResult($domainRobotResult);

        return new ObjectJob([
            "job" => ArrayHelper::getValueFromArray($domainRobotResult->getResult(), 'data.0.id', ''),
            "object" => $this->certificateModel->getName()
        ]);
    }

    /**
     * Renew a certificate. The prepareOrder tasks should be called before to
     * generate the necessary DCV data. Returns a Job with an id that can be used
     * for polling.
     *
     * @param [int] $id
     * @return GuzzleHttp\Promise\PromiseInterface $promise
     */
    public function renewAsync($id)
    {
        return $this->sendPutRequest(
            $this->domainRobotConfig->getUrl() . "/certificate/$id/_renew",
            $this->certificateModel->toArray(true)
        );
    }

    /**
     * Updates the comment for an existing certificate.
     *
     * @param [int] $id, [string] comment
     * @return void
     */
    public function commentUpdate($id, $comment)
    {
        $domainRobotPromise = $this->commentUpdateAsync($id, $comment);
        $domainRobotResult = $domainRobotPromise->wait();

        DomainRobot::setLastDomainRobotResult($domainRobotResult);
    }

    /**
     * Updates the comment for an existing certificate.
     *
     * @param [int] $id
     * @return void
     */
    public function commentUpdateAsync($id, $comment)
    {
        $cert = new Certificate(['comment' => $comment]);
        $this->sendPutRequest(
            $this->domainRobotConfig->getUrl() . "/certificate/$id/_renew",
            $cert->toArray(true)
        );
    }

    /**
     * make sure the csr has the right format
     */
    private function prepareCsr()
    {
        preg_match(
            "/^(-----BEGIN CERTIFICATE REQUEST-----)(.*)(-----END CERTIFICATE REQUEST-----)$/",
            trim($this->certificateModel->getCsr()),
            $matches
        );
        if (!empty($matches)) {
            $this->certificateModel->setCsr(implode("\n", [
                $matches[1],
                $matches[2],
                $matches[3]
            ]));
        }
    }
}
