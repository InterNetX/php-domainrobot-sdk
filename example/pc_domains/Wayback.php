<?php

namespace Example;

use Domainrobot\Domainrobot;
use Domainrobot\Lib\DomainrobotAuth;
use Domainrobot\Lib\DomainrobotException;

class SDKController
{
    /**
     * Sends an Wayback Request
     * Retrieve Info from Wayback Snapshot Archive
     *
     * @return ApiWaybackResponse
     */
    public function wayback()
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

            $apiWaybackResponse = $domainrobot->pcDomains->wayback($domain);

        } catch (DomainrobotException $exception) {
            return $exception;
        }
        
        return $apiWaybackResponse;
    }
}