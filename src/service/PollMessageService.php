<?php

namespace IXDomainRobot\Service;

use IXDomainRobot\DomainRobot;
use IXDomainRobot\Lib\ArrayHelper;
use IXDomainRobot\Lib\DomainRobotConfig;
use IXDomainRobot\Model\PollMessage;
use IXDomainRobot\Model\DomainRobotPromise;
use IXDomainRobot\Service\DomainRobotService;

class PollMessageService extends DomainRobotService
{
    /**
     *
     * @param DomainRobotConfig $domainRobotConfig
     */
    public function __construct(DomainRobotConfig $domainRobotConfig)
    {
        parent::__construct($domainRobotConfig);
    }


    /**
     * Fetches the latest poll message. To receive the next message, the current
     * message needs to be confirmed via the confirm function.
     *
     * The poll system works according to the "First In First Out (FIFO)" principle.
     * More information at https://help.internetx.com/display/APIPROCESSEN/Asynchronous+Notifications#AsynchronousNotifications-Polling
     *
     * @return PollMessage
     */
    public function info()
    {
        $domainRobotPromise = $this->infoAsync();
        $domainRobotResult = $domainRobotPromise->wait();

        return new PollMessage(ArrayHelper::getValueFromArray($domainRobotResult->getResult(), 'data.0', []));
    }

    /**
     * Fetches the latest poll message. To receive the next message, the current
     * message needs to be confirmed via the confirm function.
     *
     * The poll system works according to the "First In First Out (FIFO)" principle.
     * More information at https://help.internetx.com/display/APIPROCESSEN/Asynchronous+Notifications#AsynchronousNotifications-Polling
     *
     * @return GuzzleHttp\Promise\PromiseInterface $promise
     */
    public function infoAsync()
    {
        return $this->sendRequest(
            $this->domainRobotConfig->getUrl() . "/poll",
            'GET'
        );
    }


    /**
     * Confirms the PollMessage with the given id.
     *
     * @param [int] $id
     * @return
     */
    public function confirm($id)
    {
        $domainRobotPromise = $this->confirmAsync($id);
        $domainRobotResult = $domainRobotPromise->wait();

        DomainRobot::setLastDomainRobotResult($domainRobotResult);
    }

    /**
     * Confirms the PollMessage with the given id.
     *
     * @param [int] $id
     * @return DomainRobotPromise
     */
    public function confirmAsync($id)
    {
        $this->sendRequest(
            $this->domainRobotConfig->getUrl() . "/poll/$id",
            'PUT'
        );
    }
}
