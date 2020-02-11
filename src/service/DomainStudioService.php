<?php

namespace IXDomainrobot\Service;

use IXDomainRobot\DomainRobot;

use IXDomainRobot\Lib\ArrayHelper;
use IXDomainRobot\Lib\DomainRobotConfig;
use IXDomainRobot\Lib\DomainRobotPromise;
use IXDomainRobot\Model\DomainEnvelope;
use IXDomainRobot\Model\DomainEnvelopeSearchRequest;
use IXDomainRobot\Service\DomainRobotService;

class DomainStudioService extends DomainRobotService
{
    private $domainEnvelopeSearchRequest;

    /**
    *
    * @param DomainEnvelopeSearchRequest $domainEnvelopeSearchRequest
    * @param DomainRobotConfig $domainRobotConfig
    */
    public function __construct(DomainEnvelopeSearchRequest $domainEnvelopeSearchRequest, DomainRobotConfig $domainRobotConfig)
    {
        parent::__construct($domainRobotConfig);
        $this->domainEnvelopeSearchRequest = $domainEnvelopeSearchRequest;
    }

    /**
     * Powerful search api for free domains, premium domains and alternate domain names.
     *
     * @return DomainEnvelope
     */
    public function search()
    {
        $domainRobotPromise = $this->searchAsync();
        $domainRobotResult = $domainRobotPromise->wait();

        DomainRobot::setLastDomainRobotResult($domainRobotResult);

        return new DomainEnvelope(ArrayHelper::getValueFromArray($domainRobotResult->getResult(), 'data.0', []));
    }

    /**
     * Async version of search()
     * Powerful search api for free domains, premium domains and alternate domain names.
     *
     * @return DomainRobotPromise $promise
     */
    public function searchAsync()
    {
        return $this->sendPostRequest(
            $this->domainRobotConfig->getUrl()."/domainstudio",
            $this->domainEnvelopeSearchRequest->toArray(true)
        );
    }
}
