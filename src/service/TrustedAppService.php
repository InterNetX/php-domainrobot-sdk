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
    private $trustedApplicationModel;

    /**
     *
     * @param TrustedApplicationModel $trustedApplicationModel
     * @param DomainRobotConfig $domainRobotConfig
     */
    public function __construct(TrustedApplication $trustedApplicationModel, DomainRobotConfig $domainRobotConfig)
    {
        parent::__construct($domainRobotConfig);
        $this->trustedApplicationModel = $trustedApplicationModel;
    }

    /**
     * Sends a TrustedApplication create request.
     *
     * @return TrustedApplication
     */
    public function create()
    {
        $domainRobotPromise = $this->createAsync();
        $domainRobotResult = $domainRobotPromise->wait();

        DomainRobot::setLastDomainRobotResult($domainRobotResult);

        return new TrustedApplication(ArrayHelper::getValueFromArray($domainRobotResult->getResult(), 'data.0', []));
    }

    /**
     * Sends a TrustedApplication create request.
     *
     * @return DomainRobotPromise
     */
    public function createAsync()
    {
        return $this->sendRequest(
            $this->domainRobotConfig->getUrl() . "/trustedapp",
            'POST',
            ["json" => $this->trustedApplicationModel->toArray(true)]
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

        if ($query === null) {
            return new DomainRobotPromise($this->sendRequest(
                $this->domainRobotConfig->getUrl() . "/trustedapp/_search",
                'POST',
                ["json" => null]
            ));
        } else {
            return new DomainRobotPromise($this->sendRequest(
                $this->domainRobotConfig->getUrl() . "/trustedapp/_search",
                'POST',
                ["json" => $query->toArray(true)]
            ));
        }
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
     * @return GuzzleHttp\Promise\PromiseInterface $promise
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
     * @return
     */
    public function deleteAsync($id)
    {
        $this->sendRequest(
            $this->domainRobotConfig->getUrl() . "/trustedapp/$id",
            'DELETE',
        );
    }

    /**
     * Sends a TrustedApplication update request.
     *
     * @param [int] $id
     * @return
     */
    public function update($id)
    {
        $domainRobotPromise = $this->updateAsync($id);
        $domainRobotResult = $domainRobotPromise->wait();

        DomainRobot::setLastDomainRobotResult($domainRobotResult);

        // return new TrustedApplication(ArrayHelper::getValueFromArray($domainRobotResult->getResult(), 'data.0', []));
    }

    /**
     * Sends a TrustedApplication update request.
     *
     * @param [int] $id
     * @return GuzzleHttp\Promise\PromiseInterface $promise
     */
    public function updateAsync($id)
    {

        $this->sendRequest(
            $this->domainRobotConfig->getUrl() . "/trustedapp/$id",
            'PUT',
            ["json" => $this->trustedApplicationModel->toArray(true)]
        );
    }
}
