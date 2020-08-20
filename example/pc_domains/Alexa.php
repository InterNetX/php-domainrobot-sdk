<?php

namespace Example;

use Domainrobot\Domainrobot;
use Domainrobot\Lib\DomainrobotAuth;
use Domainrobot\Lib\DomainrobotException;

class SDKController
{
    /**
     * Sends an Alexa Site Info Request
     *
     * @return ApiAlexaSiteInfoResponse
     */
    public function alexa()
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

            $domain = "example.com"; // Name of the Domain to check

            $apiAlexaSiteInfoResponse = $domainrobot->pcDomains->alexa($domain);

        } catch (DomainrobotException $exception) {
            return $exception;
        }
        
        return $apiAlexaSiteInfoResponse;
    }
}