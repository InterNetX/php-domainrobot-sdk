<?php

namespace Domainrobot\Service;

use Domainrobot\Domainrobot;

use Domainrobot\Lib\DomainrobotConfig;
use Domainrobot\Model\BulkDomainPatchRequest;
use Domainrobot\Model\BulkDomainPostRequest;
use Domainrobot\Model\JsonResponseDataDomain;
use Domainrobot\Service\DomainrobotService;

/**
 * Implementation of the Domain Bulk API functions
 *
 * @author Christian Pleintinger
 */
class DomainBulkService extends DomainrobotService
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
     * Sends a Domain Bulk Create request
     *
     * @param BulkDomainPostRequest $body
     * @return JsonResponseDataDomain[]
     */
    public function create(BulkDomainPostRequest $body) 
    {
        $domainrobotPromise = $this->createAsync($body);
        $domainrobotResult = $domainrobotPromise->wait();

        Domainrobot::setLastDomainrobotResult($domainrobotResult);

        $data = $domainrobotResult->getResult()['data'];

        $jsonResponseDataDomains = [];
        foreach ($data as $dataDomain) {
            $jsonResponseDataDomains[] = new JsonResponseDataDomain($dataDomain);
        }

        return $jsonResponseDataDomains;
    }

    /**
     * Sends a Domain Bulk Create request
     * 
     * @param BulkDomainPostRequest $body
     * @return DomainrobotPromise
     */
    public function createAsync(BulkDomainPostRequest $body) {

        return $this->sendRequest(
            $this->domainrobotConfig->getUrl() . "/bulk/domain",
            "POST",
            ["json" => $body->toArray()]
        );
    }

    /**
     * Sends a Domain Bulk Update request
     *
     * @param BulkDomainPatchRequest $body
     * @return JsonResponseDataDomain[]
     */
    public function update(BulkDomainPatchRequest $body) 
    {
        $domainrobotPromise = $this->updateAsync($body);
        $domainrobotResult = $domainrobotPromise->wait();

        Domainrobot::setLastDomainrobotResult($domainrobotResult);

        $data = $domainrobotResult->getResult()['data'];

        $jsonResponseDataDomains = [];
        foreach ($data as $dataDomain) {
            $jsonResponseDataDomains[] = new JsonResponseDataDomain($dataDomain);
        }

        return $jsonResponseDataDomains;
    }

    /**
     * Sends a Domain Bulk Update request
     * 
     * @param BulkDomainPatchRequest $body
     * @return DomainrobotPromise
     */
    public function updateAsync(BulkDomainPatchRequest $body) {

        return $this->sendRequest(
            $this->domainrobotConfig->getUrl() . "/bulk/domain",
            "PATCH",
            ["json" => $body->toArray()]
        );
    }
}
