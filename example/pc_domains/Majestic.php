<?php

namespace Example;

use Domainrobot\Domainrobot;
use Domainrobot\Lib\DomainrobotAuth;
use Domainrobot\Lib\DomainrobotException;
use Domainrobot\Model\Domains;

class SDKController
{
    /**
     * Sends an Majestic Request
     *
     * @return ApiMajesticResponse
     */
    public function majestic()
    {
        $domainrobot = new Domainrobot([
            "url" => "https://api.autodns.com/v1/service/pricer",
            "auth" => new DomainrobotAuth([
                "user" => "username",
                "password" => "password",
                "context" => 4
            ])
        ]);

        try {

            $domains = new Domains();
            $domains->setDomains(["internetx.com", "example.com"]);

            $domainrobot->pcDomains->majestic($domains);

        } catch (DomainrobotException $exception) {
            return $exception;
        }
        
        return [
          $domainrobot::getLastDomainrobotResult()->getResult(),
          $domainrobot::getLastDomainrobotResult()->getStatusCode()
        ];

    }
}