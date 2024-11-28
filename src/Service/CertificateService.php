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
use Illuminate\Support\Facades\Log;

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
     * @param Certificate $certificate
     * @return ObjectJob
     */
    public function create(Certificate $certificate)
    {
        $domainrobotPromise = $this->createAsync($certificate);
        $domainrobotResult = $domainrobotPromise->wait();

        Domainrobot::setLastDomainrobotResult($domainrobotResult);

        return new ObjectJob([
            "job" => ArrayHelper::getValueFromArray($domainrobotResult->getResult(), 'data.0', '')
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
            $this->domainrobotConfig->getUrl() . "/certificate",
            'POST',
            ["json" => $body->toArray()]
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
            $this->domainrobotConfig->getUrl() . "/certificate/_realtime",
            'POST',
            ["json" => $body->toArray()]
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
    public function prepareOrder(CertificateData $certificateData)
    {
        $domainrobotPromise = $this->prepareOrderAsync($certificateData);
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
        $this->prepareCsr($body);

        return new DomainrobotPromise($this->sendRequest(
            $this->domainrobotConfig->getUrl() . "/certificate/_prepareOrder",
            'POST',
            ["json" => $body->toArray()]
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
     * @param Query|null $body
     * @return Certificate[]
     */
    public function list(?Query $body = null)
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
     * @param Query|null $body
     * @return DomainrobotPromise
     */

    public function listAsync(?Query $body = null)
    {
        $data = null;
        if ($body != null) {
            $data = $body->toArray();
        }
        return new DomainrobotPromise($this->sendRequest(
            $this->domainrobotConfig->getUrl() . "/certificate/_search",
            'POST',
            ["json" => $data]
        ));
    }

    /**
     * Fetches the information for an existing certificate.
     *
     * @param int $id
     * @return Certificate
     */
    public function info($id)
    {
        $domainrobotPromise = $this->infoAsync($id);
        $domainrobotResult = $domainrobotPromise->wait();

        Domainrobot::setLastDomainrobotResult($domainrobotResult);

        return new Certificate(ArrayHelper::getValueFromArray($domainrobotResult->getResult(), 'data.0', []));
    }

    /**
     * Fetches the information for an existing certificate.
     *
     * @param int $id
     * @return DomainrobotPromise
     */
    public function infoAsync($id)
    {
        return $this->sendRequest(
            $this->domainrobotConfig->getUrl() . "/certificate/$id",
            'GET'
        );
    }

    /**
     * Deletes an existing certificate. Returns a Job with an id that can be used
     * for polling.
     *
     * @param int $id
     * @return ObjectJob
     */
    public function delete($id)
    {
        $domainrobotPromise = $this->deleteAsync($id);
        $domainrobotResult = $domainrobotPromise->wait();

        Domainrobot::setLastDomainrobotResult($domainrobotResult);

        return new ObjectJob([
            "job" => ArrayHelper::getValueFromArray($domainrobotResult->getResult(), 'data.0', '')
        ]);
    }


    /**
     * Deletes an existing certificate. Returns a Job with an id that can be used
     * for polling.
     *
     * @param int $id
     * @return DomainrobotPromise
     */
    public function deleteAsync($id)
    {
        return $this->sendRequest(
            $this->domainrobotConfig->getUrl() . "/certificate/$id",
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
            "job" => ArrayHelper::getValueFromArray($domainrobotResult->getResult(), 'data.0', '')
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
            throw new \InvalidArgumentException("Field Certificate.id is missing.");
        }
        $this->prepareCsr($body);

        return $this->sendRequest(
            $this->domainrobotConfig->getUrl() . "/certificate/".$body->getId(),
            'PUT',
            ["json" => $body->toArray()]
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
            "job" => ArrayHelper::getValueFromArray($domainrobotResult->getResult(), 'data.0', '')
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
            throw new \InvalidArgumentException("Field Certificate.id is missing.");
        }
        $this->prepareCsr($body);

        return $this->sendRequest(
            $this->domainrobotConfig->getUrl() . "/certificate/".$body->getId()."/_renew",
            'PUT',
            ["json" => $body->toArray()]
        );
    }

    /**
     * Updates the comment for an existing certificate.
     *
     * @param int $id
     * @param string $comment
     * @return void
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
     * @param int $id
     * @param string $comment
     * @return DomainrobotPromise
     */
    public function commentUpdateAsync($id, $comment)
    {
        $cert = new Certificate(['comment' => $comment]);
        return $this->sendRequest(
            $this->domainrobotConfig->getUrl() . "/certificate/$id/_renew",
            'PUT',
            ["json" => $cert->toArray(true)]
        );
    }

    /**
     * make sure the csr has the right format
     *
     * @param Certificate|CertificateData $body
     * @return void
     */
    private function prepareCsr($body)
    {
        if (get_class($body) === "Domainrobot\Model\Certificate") {
            $getMethod = "getCsr";
            $setMethod = "setCsr";
        } else {
            $getMethod = "getPlain";
            $setMethod = "setPlain";
        }

        preg_match(
            "/^(-----BEGIN CERTIFICATE REQUEST-----)(.*)(-----END CERTIFICATE REQUEST-----)$/",
            preg_replace("/\r|\n/", "", trim($body->$getMethod())),
            $matches
        );

        if (!empty($matches)) {
            $body->$setMethod(implode("\r\n", [
                $matches[1],
                $matches[2],
                $matches[3]
            ]));
        }
    }
}

