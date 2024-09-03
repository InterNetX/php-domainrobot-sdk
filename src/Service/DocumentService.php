<?php

namespace Domainrobot\Service;

use Domainrobot\Lib\DomainrobotConfig;
use Domainrobot\Lib\DomainrobotPromise;
use Domainrobot\Service\DomainrobotService;

class DocumentService extends DomainrobotService
{
    public function info($id)
    {
        $domainrobotPromise = $this->infoAsync($id);
        $domainrobotResult = $domainrobotPromise->wait();
        
        return $domainrobotResult;
    }

    /**
     * Sends a contact info request.
     *
     * @param int $id
     * @return DomainrobotPromise
     */
    public function infoAsync($id)
    {
        return $this->sendRequest(
            $this->domainrobotConfig->getUrl() . "/document/$id",
            'GET'
        );
    }
}
