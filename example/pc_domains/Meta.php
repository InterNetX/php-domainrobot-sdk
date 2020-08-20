<?php

namespace Example;

use Domainrobot\Domainrobot;
use Domainrobot\Lib\DomainrobotAuth;
use Domainrobot\Lib\DomainrobotException;

class SDKController
{
    /**
     * Sends an Meta Request
     * Get Meta Information like Online Status, Site Title, Site Description 
     *
     * @return ApiMetaResponse
     */
    public function meta()
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

            $apiMetaResponse = $domainrobot->pcDomains->meta($domain);

        } catch (DomainrobotException $exception) {
            return $exception;
        }
        
        return $apiMetaResponse;
    }
}