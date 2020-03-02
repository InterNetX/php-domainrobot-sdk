<?php

namespace IXDomainRobot\Service;

use IXDomainRobot\DomainRobot;
use IXDomainRobot\Lib\ArrayHelper;
use IXDomainRobot\Lib\DomainRobotConfig;
use IXDomainRobot\Lib\DomainRobotPromise;
use IXDomainRobot\Model\Query;
use IXDomainRobot\Model\TrustedApplication;
use IXDomainRobot\Service\DomainRobotService;

class TrustedApplicationService extends DomainRobotService
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
     * Sends a TrustedApplication create request.
     *
     * @param TrustedApplication $body
     * @return TrustedApplication
     */
    public function create(TrustedApplication $body)
    {
        $domainRobotPromise = $this->createAsync($body);
        $domainRobotResult = $domainRobotPromise->wait();

        DomainRobot::setLastDomainRobotResult($domainRobotResult);

        return new TrustedApplication(ArrayHelper::getValueFromArray($domainRobotResult->getResult(), 'data.0', []));
    }

    /**
     * Sends a TrustedApplication create request.
     *
     * @param TrustedApplication $body
     * @return DomainRobotPromise
     */
    public function createAsync(TrustedApplication $body)
    {
        return $this->sendRequest(
            $this->domainRobotConfig->getUrl() . "/trustedapp",
            'POST',
            ["json" => $body->toArray(true)]
        );
    }

    /**
     *  Sends a TrustedApplication list request.
     *
     * @return TrustedApplication[]
     */
    public function list(Query $query = null)
    {
        $domainRobotPromise = $this->listAsync($query);
        $domainRobotResult = $domainRobotPromise->wait();

        DomainRobot::setLastDomainRobotResult($domainRobotResult);
        $data = $domainRobotResult->getResult()['data'];
        $trustedApps = array();
        foreach ($data as $d) {
            $t = new TrustedApplication($d);
            array_push($trustedApps, $t);
        }
        return $trustedApps;
    }

    /**
     *  Sends a TrustedApplication list request.
     *
     * @return DomainRobotPromise
     */
    public function listAsync(Query $query = null)
    {
        $body = null;
        if ($query != null) {
            $body = $query->toArray(true);
        }
        return new DomainRobotPromise($this->sendRequest(
            $this->domainRobotConfig->getUrl() . "/trustedapp/_search",
            'POST',
            ["json" => $body]
        ));
    }

    /**
     * Sends a TrustedApplication info request.
     *
     * @param [int] $id
     * @return TrustedApplication
     */
    public function info($id)
    {
        $domainRobotPromise = $this->infoAsync($id);
        $domainRobotResult = $domainRobotPromise->wait();


        return new TrustedApplication(ArrayHelper::getValueFromArray($domainRobotResult->getResult(), 'data.0', []));
    }

    /**
     * Sends a TrustedApplication info request.
     *
     * @param [int] $id
     * @return DomainRobotPromise
     */
    public function infoAsync($id)
    {
        return $this->sendRequest(
            $this->domainRobotConfig->getUrl() . "/trustedapp/$id",
            'GET'
        );
    }

    /**
     * Sends a TrustedApplication delete request.
     *
     * @param [int] $id
     * @return
     */
    public function delete($id)
    {
        $domainRobotPromise = $this->deleteAsync($id);
        $domainRobotPromise->wait();
    }


    /**
     * Sends a TrustedApplication delete request.
     *
     * @param [int] $id
     * @return DomainRobotPromise
     */
    public function deleteAsync($id)
    {
        $this->sendRequest(
            $this->domainRobotConfig->getUrl() . "/trustedapp/$id",
            'DELETE'
        );
    }

    /**
     * Sends a TrustedApplication update request.
     *
     * @param TrustedApplication $body
     * @return TrustedApplication
     */
    public function update(TrustedApplication $body)
    {
        $domainRobotPromise = $this->updateAsync($body);
        $domainRobotResult = $domainRobotPromise->wait();

        DomainRobot::setLastDomainRobotResult($domainRobotResult);
    }

    /**
     * Sends a TrustedApplication update request.
     *
     * @param TrustedApplication $body
     * @return DomainRobotPromise
     */
    public function updateAsync(TrustedApplication $body)
    {
        if ($body->getId() === null) {
            throw InvalidArgumentException("Field TrustedApplication.id is missing.");
        }
        $this->sendRequest(
            $this->domainRobotConfig->getUrl() . "/trustedapp/".$body->getId(),
            'PUT',
            ["json" => $this->trustedApplicationModel->toArray(true)]
        );
    }
}
