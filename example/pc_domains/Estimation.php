<?php

namespace Example;

use Domainrobot\Domainrobot;
use Domainrobot\Lib\DomainrobotAuth;
use Domainrobot\Lib\DomainrobotException;
use Domainrobot\Model\Estimation;

class SDKController
{
    /**
     * Sends an Estimation Request
     * Estimates the value for the given domain
     *
     * @return ApiEstimationResponse
     */
    public function estimation()
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

            $estimation = new Estimation();
            $estimation->setDomains(["internetx.com", "example.com"]); // Domains to estimate the Value of
            $estimation->setCurrency("EUR"); // The Currency in which the Price Prediction is made 

            $apiEstimationResponse = $domainrobot->pcDomains->estimation($estimation);

        } catch (DomainrobotException $exception) {
            return $exception;
        }
        
        return $apiEstimationResponse;
    }
}