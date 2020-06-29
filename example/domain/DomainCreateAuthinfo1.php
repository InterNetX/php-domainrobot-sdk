<?php

namespace Example;

use Domainrobot\Domainrobot;
use Domainrobot\Lib\DomainrobotAuth;
use Domainrobot\Lib\DomainrobotException;
use Domainrobot\Model\Domain;

class SDKController
{
    /**
     * Inquire a domain by name
     *
     * @return Domain
     */
    public function domainCreateAuthinfo1()
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
            $domain = $domainrobot->domain->createAuthinfo1("example.de");
        } catch (DomainrobotException $exception) {
            return$exception;
        }
        
        return $domain;
    }
}
