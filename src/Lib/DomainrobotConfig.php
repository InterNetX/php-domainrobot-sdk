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
}