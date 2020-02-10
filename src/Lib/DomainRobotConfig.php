<?php

namespace IXDomainRobot\Lib;

use IXDomainRobot\Lib\DomainRobotAuth;
use IXDomainRobot\DomainRobotConstants;

class DomainRobotConfig {

    /**
     * AutoDNS Base URL
     *
     * @var String
     */
    private $url;
    /**
     * AutoDNS Auth
     *
     * @var DomainRobotAuth
     */
    private $auth;

    /**
     * [
     *   "url" => string, //optional
     *   "auth" => DomainRobotAuth //optional
     * ]
     *
     * @param array $config
     */
    public function __construct($config = [])
    {
        $this->setUrl(ArrayHelper::getValueFromArray($config, 'url', DomainRobotConstants::AUTODNS_URL));
        $this->setAuth(ArrayHelper::getValueFromArray($config, 'auth', new DomainRobotAuth()));
    }

    private function setUrl(string $url)
    {
        $this->url = $url;
    }

    private function setAuth(DomainRobotAuth $domainRobotAuth)
    {
        $this->auth = $domainRobotAuth;
    }

    public function getUrl() :string
    {
        return $this->url;
    }

    public function getAuth() :DomainRobotAuth
    {
        return $this->auth;
    }
}