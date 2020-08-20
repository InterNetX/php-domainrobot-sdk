<?php

namespace Example;

use Domainrobot\Domainrobot;
use Domainrobot\Lib\DomainrobotAuth;
use Domainrobot\Lib\DomainrobotException;

class SDKController
{
    /**
     * Sends an DomainStudio Request
     * Get a list of Domain Name Suggestions
     *
     * @return ApiDomainStudioResponse
     */
    public function domainstudio()
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

            $keyword = "PHP"; // Keyword to get the Domain Name Suggestions for

            $apiDomainStudioResponse = $domainrobot->pcDomains->domainstudio($keyword);

        } catch (DomainrobotException $exception) {
            return $exception;
        }
        
        return $apiDomainStudioResponse;
    }
}