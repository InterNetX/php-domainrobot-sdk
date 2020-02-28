<?php

namespace IXDomainRobot\Service;

use IXDomainRobot\DomainRobot;
use IXDomainRobot\Lib\ArrayHelper;
use IXDomainRobot\Lib\DomainRobotConfig;
use IXDomainRobot\Lib\DomainRobotPromise;
use IXDomainRobot\Model\Query;
use IXDomainRobot\Model\DomainCancelation;
use IXDomainRobot\Service\DomainRobotService;

class DomainCancelationService extends DomainRobotService
{
    private $domainCancelationModel;

    /**
     *
     * @param DomainCancelation $domainCancelationModel
     * @param DomainRobotConfig $domainRobotConfig
     */
    public function __construct(DomainCancelation $domainCancelationModel, DomainRobotConfig $domainRobotConfig)
    {
        parent::__construct($domainRobotConfig);
        $this->domainCancelationModel = $domainCancelationModel;
    }

    /**
     * Sends a DomainCancelation create request.
     *
     * @param [string] $name
     * @return DomainCancelation
     */
    public function create($name)
    {
        $domainRobotPromise = $this->createAsync($name);
        $domainRobotResult = $domainRobotPromise->wait();

        DomainRobot::setLastDomainRobotResult($domainRobotResult);

        return new DomainCancelation(ArrayHelper::getValueFromArray($domainRobotResult->getResult(), 'data.0', []));
    }

    /**
     * Sends a DomainCancelation create request.
     *
     * @return DomainRobotPromise
     */
    public function createAsync($name)
    {
        return $this->sendRequest(
            $this->domainRobotConfig->getUrl() . "/domain/$name/cancelation",
            'POST',
            ["json" => $this->domainCancelationModel->toArray(true)]
        );
    }

    /**
     * Sends a DomainCancelation update request.
     *
     * @param [string] $name
     * @return DomainCancelation
     */
    public function update($name)
    {
        $domainRobotPromise = $this->updateAsync($name);
        $domainRobotResult = $domainRobotPromise->wait();

        DomainRobot::setLastDomainRobotResult($domainRobotResult);

        return new DomainCancelation(ArrayHelper::getValueFromArray($domainRobotResult->getResult(), 'data.0', []));
    }

    /**
     * Sends a DomainCancelation update request.
     *
     * @param [string] $name
     * @return DomainRobotPromise
     */
    public function updateAsync($name)
    {

        return $this->sendRequest(
            $this->domainRobotConfig->getUrl() . "/domain/$name/cancelation",
            'PUT',
            ["json" => $this->domainCancelationModel->toArray(true)]
        );
    }

    /**
     * Deletes an existing cancelation for the given domain.
     *
     * @param [string] $name
     * @return 
     */
    public function delete($name)
    {
        $domainRobotPromise = $this->deleteAsync($name);
        $domainRobotPromise->wait();
    }


    /**
     * Deletes an existing cancelation for the given domain.
     *
     * @param [string] $name
     * @return
     */
    public function deleteAsync($name)
    {
        $this->sendRequest(
            $this->domainRobotConfig->getUrl() . "/domain/$name/cancelation",
            'DELETE',
        );
    }


    /**
     * Fetches the cancelation for the given domain.
     *
     * @param [string] $name
     * @return DomainCancelation
     */
    public function info($name)
    {
        $domainRobotPromise = $this->infoAsync($name);
        $domainRobotResult = $domainRobotPromise->wait();


        return new DomainCancelation(ArrayHelper::getValueFromArray($domainRobotResult->getResult(), 'data.0', []));
    }

    /**
     * Fetches the cancelation for the given domain.
     *
     * @param [string] $name
     * @return DomainRobotPromise
     */
    public function infoAsync($name)
    {
        return $this->sendRequest(
            $this->domainRobotConfig->getUrl() . "/domain/$name/cancelation",
            'GET'
        );
    }

    /**
     * Sends a DomainCancelation list request.
     * 
     * The following keys can be used for filtering, ordering or fetching additional
     * data via query parameter:
     * 
     * * disconnect
     * * execdate
     * * ctid
     * * created
     * * registryStatus
     * * sld
     * * type
     * * tld
     * * subtld
     * * gainingRegistrar
     * * updated
     *
     * @return DomainCancelation[]
     */
    public function list(Query $query = null)
    {
        $domainRobotPromise = $this->listAsync($query);
        $domainRobotResult = $domainRobotPromise->wait();

        DomainRobot::setLastDomainRobotResult($domainRobotResult);
        $data = $domainRobotResult->getResult()['data'];
        $domainCancelations = array();
        foreach ($data as $d) {
            $dc = new DomainCancelation($d);
            array_push($domainCancelations, $dc);
        }
        return $domainCancelations;
    }

    /**
     * Sends a DomainCancelation list request.
     * 
     * The following keys can be used for filtering, ordering or fetching additional
     * data via query parameter:
     * 
     * * disconnect
     * * execdate
     * * ctid
     * * created
     * * registryStatus
     * * sld
     * * type
     * * tld
     * * subtld
     * * gainingRegistrar
     * * updated
     * 
     * @return DomainRobotPromise
     */

    public function listAsync(Query $query = null)
    {
        if ($query === null) {
            return new DomainRobotPromise($this->sendRequest(
                $this->domainRobotConfig->getUrl() . "/domain/cancelation/_search",
                'POST',
                ["json" => null]
            ));
        } else {
            return new DomainRobotPromise($this->sendRequest(
                $this->domainRobotConfig->getUrl() . "/domain/cancelation/_search",
                'POST',
                ["json" => $query->toArray(true)]
            ));
        }
    }
}
