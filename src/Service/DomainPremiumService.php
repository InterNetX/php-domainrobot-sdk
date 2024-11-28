<?php

namespace Domainrobot\Service;

use Domainrobot\Domainrobot;

use Domainrobot\Lib\ArrayHelper;
use Domainrobot\Lib\DomainrobotPromise;
use Domainrobot\Model\DomainPremium;
use Domainrobot\Service\DomainrobotService;

class DomainPremiumService extends DomainrobotService
{
    /**
     * Sends a domainpremium info request.
     *
     * @param string $name
     * @return DomainPremium
     */
    public function info($name)
    {
        $domainrobotPromise = $this->infoAsync($name);
        $domainrobotResult = $domainrobotPromise->wait();

        Domainrobot::setLastDomainrobotResult($domainrobotResult);

        return new DomainPremium(ArrayHelper::getValueFromArray($domainrobotResult->getResult(), 'data.0', []));
    }

    /**
     * Sends a domainpremium info request.
     *
     * @param string $name
     * @return DomainrobotPromise
     */
    public function infoAsync($name)
    {
        return $this->sendRequest(
            $this->domainrobotConfig->getUrl() . "/domainpremium/$name",
            'GET'
        );
    }
}

