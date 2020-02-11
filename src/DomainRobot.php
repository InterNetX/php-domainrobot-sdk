<?php

namespace IXDomainRobot;

use IXDomainRobot\Service\CertificateService;
use IXDomainRobot\Lib\DomainRobotConfig;
use IXDomainRobot\Model\DomainEnvelopeSearchRequest;
use IXDomainRobot\Service\DomainStudioService;

class DomainRobot {

    /**
     *
     * @var DomainRobotConfig
     */
    private $domainRobotConfig;

    static private $lastDomainRobotResult;

    /**
     * [
     *   "url" => string, //optional
     *   "auth" => DomainRobotAuth //optional
     * ]
     *
     * @param array $domainRobotConfig
     */
    public function __construct($domainRobotConfig = [])
    {
        $this->setDomainRobotConfig(new DomainRobotConfig($domainRobotConfig));
    }

    public function setDomainRobotConfig(DomainRobotConfig $domainRobotConfig)
    {
        $this->domainRobotConfig = $domainRobotConfig;        
    }

    /**
     * Interface for all Certificate related requests
     *
     * @param $model
     * @return void
     */
    public function certificate($model)
    {
        return new CertificateService($model, $this->domainRobotConfig);
    }

    /**
     * Interface for all DomainStudio related requests
     *
     * @param DomainEnvelopeSearchRequest $model
     * @return DomainStudioService
     */
    public function domainStudio(DomainEnvelopeSearchRequest $model){
        return new DomainStudioService($model, $this->domainRobotConfig);
    }

    static public function setLastDomainRobotResult($lastDomainRobotResult){
        self::$lastDomainRobotResult = $lastDomainRobotResult;
    }

    static public function getLastDomainRobotResult(){
        return self::$lastDomainRobotResult;
    }
}