<?php

namespace Example;

use Domainrobot\Domainrobot;
use Domainrobot\Lib\DomainrobotAuth;
use Domainrobot\Lib\DomainrobotException;

class SDKController
{
    /**
     * Sends an Exchangerate Request
     *
     * @return ApiExchangeRateResponse
     */
    public function exchangerate()
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

            $sourceCurrency = "EUR";
            $targetCurrency = "USD";

            $apiExchangeRateResponse = $domainrobot->pcDomains->exchangerate($sourceCurrency, $targetCurrency);

        } catch (DomainrobotException $exception) {
            return $exception;
        }
        
        return $apiExchangeRateResponse;
    }
}