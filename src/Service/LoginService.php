<?php

namespace Domainrobot\Service;

use Domainrobot\Domainrobot;
use Domainrobot\Lib\ArrayHelper;
use Domainrobot\Lib\DomainrobotConfig;
use Domainrobot\Lib\DomainrobotPromise;
use Domainrobot\Model\JsonResponseDataUser;
use Domainrobot\Service\DomainrobotService;
use Domainrobot\Model\LoginData;

class LoginService extends DomainrobotService
{
    /**
     * @param DomainrobotConfig $domainrobotConfig
     */
    public function __construct(DomainrobotConfig $domainrobotConfig)
    {
        parent::__construct($domainrobotConfig);
    }

    /**
     * @return DomainrobotPromise
     */
    public function sessionID(LoginData $body, array $keys = [])
    {
        $keysString = '';
        if ( count($keys) > 0 ) {
            $keysString = '?keys[]=' . implode('&keys[]=', $keys);
        }

        $domainrobotPromise = $this->createAsync($body, $keysString);
        $domainrobotResult = $domainrobotPromise->wait();

        Domainrobot::setLastDomainrobotResult($domainrobotResult);

        return new JsonResponseDataUser(ArrayHelper::getValueFromArray($domainrobotResult->getResult(), 'data.0', []));
    }
    
    /**
    //  * @return DomainrobotPromise
     */
    public function createAsync(LoginData $body, $keysString)
    {
        return $this->sendRequest(
            $this->domainrobotConfig->getUrl() . "/login" . $keysString,
            'POST',
            ["json" => $body->toArray()]
        );
    }
}

