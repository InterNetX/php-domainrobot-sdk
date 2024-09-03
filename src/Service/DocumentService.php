<?php

namespace Domainrobot\Service;

use Domainrobot\Domainrobot;
use Domainrobot\Lib\DomainrobotPromise;
use Domainrobot\Service\DomainrobotService;

class DocumentService extends DomainrobotService
{
    public function info($id, $fileURI)
    {
        $domainrobotPromise = $this->infoAsync($id, $fileURI);
        $domainrobotResult = $domainrobotPromise->wait();

        Domainrobot::setLastDomainrobotResult($domainrobotResult);

        return $domainrobotResult->getStatusCode();
    }

    /**
     * Sends a contact info request.
     *
     * @param int $id
     * @return DomainrobotPromise
     */
    public function infoAsync($id, $fileURI)
    {
        return $this->sendRequest(
            $this->domainrobotConfig->getUrl() . "/document/$id",
            'GET',
            ['sink' => $fileURI]
        );
    }
}