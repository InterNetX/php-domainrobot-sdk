<?php

namespace IXDomainRobot;

use IXDomainRobot\Service\CertificateService;
use IXDomainRobot\Lib\DomainRobotConfig;

class DomainRobot {

    /**
     *
     * @var DomainRobotConfig
     */
    private $domainRobotConfig;

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

    public function certificate($model)
    {
        return new CertificateService($model, $this->domainRobotConfig);
    }
}