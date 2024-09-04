<?php

namespace Domainrobot\Service;

use Domainrobot\Domainrobot;
use Domainrobot\Lib\DomainrobotPromise;
use Domainrobot\Service\DomainrobotService;

class DocumentService extends DomainrobotService
{
    public function info($id, $targetFileURI)
    {
        $domainrobotPromise = $this->infoAsync($id, $targetFileURI);
        $domainrobotResult = $domainrobotPromise->wait();

        Domainrobot::setLastDomainrobotResult($domainrobotResult);

        return $domainrobotResult->getStatusCode();
    }

    public function infoAsync($id, $targetFileURI)
    {
        return $this->sendRequest(
            $this->domainrobotConfig->getUrl() . "/document/$id",
            'GET',
            ['sink' => $targetFileURI]
        );
    }
}