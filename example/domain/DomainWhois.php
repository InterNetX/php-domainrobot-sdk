<?php

namespace Example;

use Domainrobot\Domainrobot;
use Domainrobot\Lib\DomainrobotAuth;
use Domainrobot\Lib\DomainrobotException;
use Domainrobot\Model\Domain;

class SDKController
{
    /**
     * Perform an Whois Request of an Domain
     */
    public function domainWhois()
    {
        $domainrobot = new Domainrobot([
            "url" => "https://api.autodns.com/v1",
            "auth" => new DomainrobotAuth([
                "user" => "username",
                "password" => "password",
                "context" => 4
            ])
        ]);

        try {
            $domain = $domainrobot->domain->whois("example.com");
        } catch (DomainrobotException $exception) {
            return $exception;
        }
        
        return $domainrobot::getLastDomainrobotResult()->getResult();
    }
}
