<?php

namespace Example;

use Domainrobot\Domainrobot;
use Domainrobot\Lib\DomainrobotAuth;
use Domainrobot\Lib\DomainrobotException;

class SDKController
{
    /**
     * Sends an Social Media User Check Request
     * Checks if Username is available on different Social Media Platforms  
     *
     * @return ApiSocialMediaResponse
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

            $user = "InterNetX"; // User to search after 

            $apiSocialMediaResponse = $domainrobot->pcDomains->smuCheck($user);

        } catch (DomainrobotException $exception) {
            return $exception;
        }
        
        return $apiSocialMediaResponse;
    }
}