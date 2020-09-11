<?php

namespace Domainrobot\Service;

use Domainrobot\Domainrobot;

use Domainrobot\Lib\DomainrobotConfig;
use Domainrobot\Model\BulkDomainPatchRequest;
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
