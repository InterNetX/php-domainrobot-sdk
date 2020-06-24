<?php

namespace Domainrobot\Lib;

use Domainrobot\Lib\DomainrobotAuth;
use Domainrobot\DomainrobotConstants;

class DomainrobotConfig {

    /**
     * AutoDNS Base URL
     *
     * @var String
     */
    private $url;
    /**
     * AutoDNS Auth
     *
     * @var DomainrobotAuth
     */
    private $auth;

    private $logRequestCallback = null;
    private $logResponseCallback = null;

    /**
     * [
     *   "url" => string, //optional
     *   "auth" => DomainrobotAuth //optional
     * ]
     *
     * @param array $config
     */
    public function __construct($config = [])
    {
        $this->setUrl(ArrayHelper::getValueFromArray($config, 'url', DomainrobotConstants::AUTODNS_URL));
        $this->setAuth(ArrayHelper::getValueFromArray($config, 'auth', new DomainrobotAuth()));
        $this->setLogRequestCallback(ArrayHelper::getValueFromArray($config, 'logRequestCallback', null));
        $this->setLogResponseCallback(ArrayHelper::getValueFromArray($config, 'logResponseCallback', null));
    }

    private function setUrl(string $url)
    {
        $this->url = $url;
    }

    private function setAuth(DomainrobotAuth $domainrobotAuth)
    {
        $this->auth = $domainrobotAuth;
    }

    public function getUrl() :string
    {
        return $this->url;
    }

    public function getAuth() :DomainrobotAuth
    {
        return $this->auth;
    }

    public function logRequest()
    {
        return $this->logRequestCallback;
    }

    public function logResponse()
    {
        return $this->logResponseCallback;
    }

    public function setLogRequestCallback($callback)
    {
        $this->logRequestCallback = $callback;
    }

    public function setLogResponseCallback($callback)
    {
        $this->logResponseCallback = $callback;
    }

    public function hasLogRequestCallback(){
        return $this->logRequestCallback !== null;
    }

    public function hasLogResponseCallback(){
        return $this->logResponseCallback !== null;
    }
}