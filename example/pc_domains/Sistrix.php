<?php

namespace Example;

use Domainrobot\Domainrobot;
use Domainrobot\Lib\DomainrobotAuth;
use Domainrobot\Lib\DomainrobotException;

class SDKController
{
    /**
     * Sends an Sistrix Request
     *
     * @return ApiSistrixResponse
     */
    public function sistrix()
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

            $domain = "internetx.com"; // Name of the Domain to check
            $country = "de"; // Country ISO Code

            $apiSistrixResponse = $domainrobot->pcDomains->sistrix($domain, $country);

        } catch (DomainrobotException $exception) {
            return $exception;
        }
        
        // Instead of returning the $apiSistrixResponse Object we also can
        // instead return the last Result of the Domainrobot directly 
        return $domainrobot::getLastDomainrobotResult()->getResult();
    }
}