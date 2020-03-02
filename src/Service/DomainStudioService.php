<?php

namespace IXDomainrobot\Service;

use IXDomainRobot\DomainRobot;

use IXDomainRobot\Lib\ArrayHelper;
use IXDomainRobot\Lib\DomainRobotConfig;
use IXDomainRobot\Lib\DomainRobotPromise;
use IXDomainRobot\Model\DomainEnvelope;
use IXDomainRobot\Model\DomainEnvelopeSearchRequest;
use IXDomainRobot\Service\DomainRobotService;

/**
 * Implementation of the domainstudio specific API functions.
 *
 * @author Benjamin Krammel
 */
class DomainStudioService extends DomainRobotService
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
        $domainRobotPromise = $this->searchAsync($body);
        $domainRobotResult = $domainRobotPromise->wait();

        DomainRobot::setLastDomainRobotResult($domainRobotResult);

        $data = $domainRobotResult->getResult()['data'];
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
     * @return DomainRobotPromise
     */
    public function searchAsync(DomainEnvelopeSearchRequest $body)
    {
        return $this->sendRequest(
            $this->domainRobotConfig->getUrl()."/domainstudio",
            "POST",
            $body->toArray(true)
        );
    }
}
