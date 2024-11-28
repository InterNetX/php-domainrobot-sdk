<?php

namespace Domainrobot\Service;

use Domainrobot\Lib\ArrayHelper;
use Domainrobot\Domainrobot;
use Domainrobot\Lib\DomainrobotConfig;
use Domainrobot\Model\JsonNoData;
use Domainrobot\Model\OTPAuth;
use Domainrobot\Service\DomainrobotService;

class User2faService extends DomainrobotService
{

    /**
     *
     * @param DomainrobotConfig $domainrobotConfig
     */
    public function __construct(DomainrobotConfig $domainrobotConfig)
    {
        parent::__construct($domainrobotConfig);
    }

    /**
     * Get Info about the 2FA Configuration
     * 
     * @return OTPAuth
     */
    public function tokenConfigInfo()
    {
        $domainrobotPromise = $this->tokenConfigInfoAsync();
        $domainrobotResult = $domainrobotPromise->wait();

        Domainrobot::setLastDomainrobotResult($domainrobotResult);
                
        return new OTPAuth(ArrayHelper::getValueFromArray($domainrobotResult->getResult(), 'data.0', []));
    }

    /**
     * Get Info about the 2FA Configuration
     * 
     * @return DomainrobotPromise
     */
    public function tokenConfigInfoAsync()
    {
        return $this->sendRequest(
            $this->domainrobotConfig->getUrl() . "/OTPAuth",
            'GET'
        );
    }

    /**
     * Generate 2FA Secret
     * 
     * @return OTPAuth
     */
    public function tokenConfigCreate()
    {
        $domainrobotPromise = $this->tokenConfigCreateAsync();
        $domainrobotResult = $domainrobotPromise->wait();

        Domainrobot::setLastDomainrobotResult($domainrobotResult);

        return new OTPAuth(ArrayHelper::getValueFromArray($domainrobotResult->getResult(), 'data.0', []));
    }

    /**
     * Generate 2FA Secret
     * 
     * @return DomainrobotPromise
     */
    public function tokenConfigCreateAsync()
    {
        return $this->sendRequest(
            $this->domainrobotConfig->getUrl() . "/OTPAuth",
            'POST'
        );
    }

    /**
     * Activate the 2FA Authentication
     * 
     * @return OTPAuth
     */
    public function tokenConfigActivate()
    {
        $domainrobotPromise = $this->tokenConfigActivateAsync();
        $domainrobotResult = $domainrobotPromise->wait();

        Domainrobot::setLastDomainrobotResult($domainrobotResult);

        return new OTPAuth(ArrayHelper::getValueFromArray($domainrobotResult->getResult(), 'data.0', []));
    }

    /**
     * Activate the 2FA Authentication
     * 
     * @return DomainrobotPromise
     */
    public function tokenConfigActivateAsync()
    {
        return $this->sendRequest(
            $this->domainrobotConfig->getUrl() . "/user/_2fa",
            'PUT'
        );
    }

    /**
     * Deactivate the 2FA Authentication
     * 
     * @return JsonNoData
     */
    public function tokenConfigDelete()
    {
        $domainrobotPromise = $this->tokenConfigDeleteAsync();
        $domainrobotResult = $domainrobotPromise->wait();

        Domainrobot::setLastDomainrobotResult($domainrobotResult);

        return new JsonNoData();
    }

    /**
     * Deactivate the 2FA Authentication
     * 
     * @return DomainrobotPromise
     */
    public function tokenConfigDeleteAsync()
    {
        return $this->sendRequest(
            $this->domainrobotConfig->getUrl() . "/user/_2fa",
            'DELETE'
        );
    }
}

