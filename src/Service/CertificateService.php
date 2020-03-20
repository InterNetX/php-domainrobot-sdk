<?php

namespace Domainrobot\Service;

use Domainrobot\DomainRobot;
use Domainrobot\Lib\ArrayHelper;
use Domainrobot\Lib\DomainRobotConfig;
use Domainrobot\Lib\DomainRobotPromise;
use Domainrobot\Model\Certificate;
use Domainrobot\Model\CertificateData;
use Domainrobot\Model\ObjectJob;
use Domainrobot\Model\Query;
use Domainrobot\Service\DomainRobotService;

class CertificateService extends DomainRobotService
{

    /**
     *
     * @param DomainRobotConfig $domainRobotConfig
     */
    public function __construct(DomainRobotConfig $domainRobotConfig)
    {
        parent::__construct($domainRobotConfig);
    }

    /**
     * Orders a certificate. The prepareOrder tasks should be called before to
     * generate the necessary DCV data. Returns a Job with an id that can be used
     * for polling.
     *
     * @param Certificate $body
     * @return Objectjob
     */
    public function create(Certificate $body)
    {
        $domainRobotPromise = $this->createAsync($body);
        $domainRobotResult = $domainRobotPromise->wait();

        DomainRobot::setLastDomainRobotResult($domainRobotResult);

        return new ObjectJob([
            "job" => ArrayHelper::getValueFromArray($domainRobotResult->getResult(), 'data.0.id', '')
        ]);
    }
    /**
     * Orders a certificate. The prepareOrder tasks should be called before to
     * generate the necessary DCV data. Returns a Job with an id that can be used
     * for polling.
     *
     * @param Certificate $body
     * @return DomainRobotPromise
     */
    public function createAsync(Certificate $body)
    {
        $this->prepareCsr($body);

        return $this->sendRequest(
            $this->domainRobotConfig->getUrl() . "/certificate",
            'POST',
            ["json" => $body->toArray(true)]
        );
    }

    /**
     * Orders a certificate in realtime. The prepareOrder tasks should be called
     * before to generate the necessary DCV data.
     *
     * **Note:** This works only for certain DV certificate products and dcv
     * methods.
     *
     * @param Certificate $body
     * @return Certificate
     */
    public function realtime(Certificate $body)
    {
        $domainRobotPromise = $this->realtimeAsync($body);
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
     * @param Certificate $body
     * @return DomainRobotPromise
     */
    public function realtimeAsync(Certificate $body)
    {
        $this->prepareCsr($body);

        return $this->sendRequest(
            $this->domainRobotConfig->getUrl() . "/certificate/_realtime",
            'POST',
            ["json" => $body->toArray(true)]
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
     * @param CertificateData $body
     * @return CertificateData
     */
    public function prepareOrder(CertificateData $body)
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
     * @param CertificateData $body
     * @return DomainRobotPromise
     */
    public function prepareOrderAsync(CertificateData $body)
    {
        //$this->prepareCsr();

        return new DomainRobotPromise($this->sendRequest(
            $this->domainRobotConfig->getUrl() . "/certificate/_prepareOrder",
            'POST',
            ["json" => $body->toArray(true)]
        ));
    }

    /**
     * Sends a certificate list request.
     *
     * The following keys can be used for filtering, ordering or fetching additional
     * data via query parameter:
     *
     * * product
     * * technical
     * * orderId
     * * created
     * * admin
     * * type
     * * expire
     * * domain
     * * name
     * * comment
     * * id
     * * updated
     * * authentication
     *
     * @param Query $body
     * @return Certificate[]
     */
    public function list(Query $body = null)
    {
        $domainRobotPromise = $this->listAsync($body);
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
     * The following keys can be used for filtering, ordering or fetching additional
     * data via query parameter:
     *
     * * product
     * * technical
     * * orderId
     * * created
     * * admin
     * * type
     * * expire
     * * domain
     * * name
     * * comment
     * * id
     * * updated
     * * authentication
     *
     * @param Query $body
     * @return DomainRobotPromise
     */

    public function listAsync(Query $body = null)
    {
        $data = null;
        if ($query != null) {
            $data = $body->toArray(true);
        }
        return new DomainRobotPromise($this->sendRequest(
            $this->domainRobotConfig->getUrl() . "/certificate/_search",
            'POST',
            ["json" => $data]
        ));
    }

    /**
     * Fetches the information for an existing certificate.
     *
     * @param [int] $id
     * @return Certificate
     */
    public function info($id)
    {
        $domainRobotPromise = $this->infoAsync($id);
        $domainRobotResult = $domainRobotPromise->wait();


        return new Certificate(ArrayHelper::getValueFromArray($domainRobotResult->getResult(), 'data.0', []));
    }

    /**
     * Fetches the information for an existing certificate.
     *
     * @param [int] $id
     * @return DomainRobotPromise
     */
    public function infoAsync($id)
    {
        return $this->sendRequest(
            $this->domainRobotConfig->getUrl() . "/certificate/$id",
            'GET'
        );
    }

    /**
     * Deletes an existing certificate. Returns a Job with an id that can be used
     * for polling.
     *
     * @param [int] $id
     * @return ObjectJob
     */
    public function delete($id)
    {
        $domainRobotPromise = $this->deleteAsync($id);
        $domainRobotResult = $domainRobotPromise->wait();

        return new ObjectJob([
            "job" => ArrayHelper::getValueFromArray($domainRobotResult->getResult(), 'data.0.id', '')
        ]);
    }


    /**
     * Deletes an existing certificate. Returns a Job with an id that can be used
     * for polling.
     *
     * @param [int] $id
     * @return DomainRobotPromise
     */
    public function deleteAsync($id)
    {
        return $this->sendRequest(
            $this->domainRobotConfig->getUrl() . "/certificate/$id",
            'DELETE'
        );
    }


    /**
     * Reissue a certificate. The prepareOrder tasks should be called before to
     * generate the necessary DCV data. Returns a Job with an id that can be used
     * for polling.
     *
     * @param Certificate $body
     * @return ObjectJob
     */
    public function reissue(Certificate $body)
    {
        $domainRobotPromise = $this->reissueAsync($body);
        $domainRobotResult = $domainRobotPromise->wait();

        DomainRobot::setLastDomainRobotResult($domainRobotResult);

        return new ObjectJob([
            "job" => ArrayHelper::getValueFromArray($domainRobotResult->getResult(), 'data.0.id', '')
        ]);
    }

    /**
     * Reissue a certificate. The prepareOrder tasks should be called before to
     * generate the necessary DCV data. Returns a Job with an id that can be used
     * for polling.
     *
     * @param Certificate $body
     * @return DomainRobotPromise
     */
    public function reissueAsync(Certificate $body)
    {
        if ($body->getId() === null) {
            throw InvalidArgumentException("Field Certificate.id is missing.");
        }
        $this->prepareCsr($body);

        return $this->sendRequest(
            $this->domainRobotConfig->getUrl() . "/certificate/".$body->getId(),
            'PUT',
            ["json" => $body->toArray(true)]
        );
    }


    /**
     * Renew a certificate. The prepareOrder tasks should be called before to
     * generate the necessary DCV data. Returns a Job with an id that can be used
     * for polling.
     *
     * @param Certificate $body
     * @return ObjectJob
     */
    public function renew(Certificate $body)
    {
        $domainRobotPromise = $this->renewAsync($body);
        $domainRobotResult = $domainRobotPromise->wait();

        DomainRobot::setLastDomainRobotResult($domainRobotResult);

        return new ObjectJob([
            "job" => ArrayHelper::getValueFromArray($domainRobotResult->getResult(), 'data.0.id', '')
        ]);
    }

    /**
     * Renew a certificate. The prepareOrder tasks should be called before to
     * generate the necessary DCV data. Returns a Job with an id that can be used
     * for polling.
     *
     * @param Certificate $body
     * @return DomainRobotPromise
     */
    public function renewAsync(Certificate $body)
    {
        if ($body->getId() === null) {
            throw InvalidArgumentException("Field Certificate.id is missing.");
        }
        $this->prepareCsr($body);

        return $this->sendRequest(
            $this->domainRobotConfig->getUrl() . "/certificate/".$body->getId()."/_renew",
            'PUT',
            ["json" => $body->toArray(true)]
        );
    }

    /**
     * Updates the comment for an existing certificate.
     *
     * @param [int] $id, [string] comment
     * @return
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
     * @param [int] $id, [string] comment
     * @return
     */
    public function commentUpdateAsync($id, $comment)
    {
        $cert = new Certificate(['comment' => $comment]);
        $this->sendRequest(
            $this->domainRobotConfig->getUrl() . "/certificate/$id/_renew",
            'PUT',
            ["json" => $cert->toArray(true)]
        );
    }

    /**
     * make sure the csr has the right format
     *
     * @param Certificate $body
     * @return
     */
    private function prepareCsr(Certificate $body)
    {
        preg_match(
            "/^(-----BEGIN CERTIFICATE REQUEST-----)(.*)(-----END CERTIFICATE REQUEST-----)$/",
            trim($body->getCsr()),
            $matches
        );
        if (!empty($matches)) {
            $body->setCsr(implode("\n", [
                $matches[1],
                $matches[2],
                $matches[3]
            ]));
        }
    }
}
