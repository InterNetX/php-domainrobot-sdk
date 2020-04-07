<?php

namespace Domainrobot\Service;

use Domainrobot\Domainrobot;
use Domainrobot\Lib\ArrayHelper;
use Domainrobot\Lib\DomainrobotConfig;
use Domainrobot\Lib\DomainrobotPromise;
use Domainrobot\Model\Certificate;
use Domainrobot\Model\CertificateData;
use Domainrobot\Model\ObjectJob;
use Domainrobot\Model\Query;
use Domainrobot\Service\DomainrobotService;

class CertificateService extends DomainrobotService
{

    /**
     *
     * @param DomainrobotConfig $domainrobotConfig
     */
    public function __construct(DomainrobotConfig $domainrobotConfig)
    {
        parent::__construct($domainrobotConfig);
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
        $domainrobotPromise = $this->createAsync($body);
        $domainrobotResult = $domainrobotPromise->wait();

        Domainrobot::setLastDomainrobotResult($domainrobotResult);

        return new ObjectJob([
            "job" => ArrayHelper::getValueFromArray($domainrobotResult->getResult(), 'data.0.id', '')
        ]);
    }
    /**
     * Orders a certificate. The prepareOrder tasks should be called before to
     * generate the necessary DCV data. Returns a Job with an id that can be used
     * for polling.
     *
     * @param Certificate $body
     * @return DomainrobotPromise
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
        $domainrobotPromise = $this->realtimeAsync($body);
        $domainrobotResult = $domainrobotPromise->wait();

        Domainrobot::setLastDomainrobotResult($domainrobotResult);

        return new Certificate(ArrayHelper::getValueFromArray($domainrobotResult->getResult(), 'data.0', []));
    }

    /**
     * Orders a certificate in realtime. The prepareOrder tasks should be called
     * before to generate the necessary DCV data.
     *
     * **Note:** This works only for certain DV certificate products and dcv
     * methods.
     *
     * @param Certificate $body
     * @return DomainrobotPromise
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
        $domainrobotPromise = $this->prepareOrderAsync();
        $domainrobotResult = $domainrobotPromise->wait();

        Domainrobot::setLastDomainrobotResult($domainrobotResult);

        return new CertificateData(ArrayHelper::getValueFromArray($domainrobotResult->getResult(), 'data.0', []));
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
     * @return DomainrobotPromise
     */
    public function prepareOrderAsync(CertificateData $body)
    {
        //$this->prepareCsr();

        return new DomainrobotPromise($this->sendRequest(
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
        $domainrobotPromise = $this->listAsync($body);
        $domainrobotResult = $domainrobotPromise->wait();

        Domainrobot::setLastDomainrobotResult($domainrobotResult);
        $data = $domainrobotResult->getResult()['data'];
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
     * @return DomainrobotPromise
     */

    public function listAsync(Query $body = null)
    {
        $data = null;
        if ($query != null) {
            $data = $body->toArray(true);
        }
        return new DomainrobotPromise($this->sendRequest(
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
        $domainrobotPromise = $this->infoAsync($id);
        $domainrobotResult = $domainrobotPromise->wait();


        return new Certificate(ArrayHelper::getValueFromArray($domainrobotResult->getResult(), 'data.0', []));
    }

    /**
     * Fetches the information for an existing certificate.
     *
     * @param [int] $id
     * @return DomainrobotPromise
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
        $domainrobotPromise = $this->deleteAsync($id);
        $domainrobotResult = $domainrobotPromise->wait();

        return new ObjectJob([
            "job" => ArrayHelper::getValueFromArray($domainrobotResult->getResult(), 'data.0.id', '')
        ]);
    }


    /**
     * Deletes an existing certificate. Returns a Job with an id that can be used
     * for polling.
     *
     * @param [int] $id
     * @return DomainrobotPromise
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
        $domainrobotPromise = $this->reissueAsync($body);
        $domainrobotResult = $domainrobotPromise->wait();

        Domainrobot::setLastDomainrobotResult($domainrobotResult);

        return new ObjectJob([
            "job" => ArrayHelper::getValueFromArray($domainrobotResult->getResult(), 'data.0.id', '')
        ]);
    }

    /**
     * Reissue a certificate. The prepareOrder tasks should be called before to
     * generate the necessary DCV data. Returns a Job with an id that can be used
     * for polling.
     *
     * @param Certificate $body
     * @return DomainrobotPromise
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
        $domainrobotPromise = $this->renewAsync($body);
        $domainrobotResult = $domainrobotPromise->wait();

        Domainrobot::setLastDomainrobotResult($domainrobotResult);

        return new ObjectJob([
            "job" => ArrayHelper::getValueFromArray($domainrobotResult->getResult(), 'data.0.id', '')
        ]);
    }

    /**
     * Renew a certificate. The prepareOrder tasks should be called before to
     * generate the necessary DCV data. Returns a Job with an id that can be used
     * for polling.
     *
     * @param Certificate $body
     * @return DomainrobotPromise
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
        $domainrobotPromise = $this->commentUpdateAsync($id, $comment);
        $domainrobotResult = $domainrobotPromise->wait();

        Domainrobot::setLastDomainrobotResult($domainrobotResult);
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
