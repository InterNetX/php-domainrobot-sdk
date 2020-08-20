<?php

namespace Example;

use Domainrobot\Domainrobot;
use Domainrobot\Lib\DomainrobotAuth;
use Domainrobot\Lib\DomainrobotException;
use Domainrobot\Model\Keywords;

class SDKController
{
    /**
     * Sends an Keyword Request
     * Get Google Ad Words Data
     *
     * @return ApiKeywordResponse
     */
    public function keyword()
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

            $keywords = new Keywords();
            $keywords->setKeywords(["programming", "development"]);

            $apiKeywordResponse = $domainrobot->pcDomains->keyword($keywords);

        } catch (DomainrobotException $exception) {
            return $exception;
        }
        
        return $apiKeywordResponse;
    }
}