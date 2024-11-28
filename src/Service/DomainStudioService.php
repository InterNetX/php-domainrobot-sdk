<?php

namespace Domainrobot\Service;

use Domainrobot\Domainrobot;

use Domainrobot\Lib\ArrayHelper;
use Domainrobot\Lib\DomainrobotConfig;
use Domainrobot\Lib\DomainrobotPromise;
use Domainrobot\Model\DomainEnvelope;
use Domainrobot\Model\DomainEnvelopeSearchRequest;
use Domainrobot\Service\DomainrobotService;

/**
 * Implementation of the domainstudio specific API functions.
 *
 * @author Benjamin Krammel
 */
class DomainStudioService extends DomainrobotService
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
     * Sends a domainstudio search request.
     *
     * **Note:** By default, search results are provided synchronously. The
     * search response contains all the additional data for each domain name created.
     *
     * With the following header the asynchronous (websocket) mode can be activated:
     *
     * * X-Domainrobot-WS : ASYNC
     *
     * The additional domain data will then be delivered via websocket.
     * See the official at https://help.internetx.com/display/APIADDITIONALEN/DomainStudio+Guide for more information.
     *
     * @param DomainEnvelopeSearchRequest $body
     * @return DomainEnvelope[]
     */
    public function search(DomainEnvelopeSearchRequest $body)
    {
        $domainrobotPromise = $this->searchAsync($body);
        $domainrobotResult = $domainrobotPromise->wait();

        Domainrobot::setLastDomainrobotResult($domainrobotResult);

        $data = $domainrobotResult->getResult()['data'];
        $envelopes = array();
        foreach ($data as $d) {
            $c = new DomainEnvelope($d);
            array_push($envelopes, $c);
        }
        return $envelopes;
    }

    /**
     * Sends a domainstudio search request.
     *
     * **Note:** By default, search results are provided synchronously. The
     * search response contains all the additional data for each domain name created.
     *
     * With the following header the asynchronous (websocket) mode can be activated:
     *
     * * X-Domainrobot-WS : ASYNC
     *
     * The additional domain data will then be delivered via websocket.
     * See the official at https://help.internetx.com/display/APIADDITIONALEN/DomainStudio+Guide for more information.
     *
     * @param DomainEnvelopeSearchRequest $body
     * @return DomainrobotPromise
     */
    public function searchAsync(DomainEnvelopeSearchRequest $body)
    {
        return $this->sendRequest(
            $this->domainrobotConfig->getUrl()."/domainstudio",
            "POST",
            ["json" => $body->toArray()]
        );
    }
}

