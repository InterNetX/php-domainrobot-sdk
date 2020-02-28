<?php

namespace IXDomainRobot\Service;

use IXDomainRobot\DomainRobot;
use IXDomainRobot\Lib\ArrayHelper;
use IXDomainRobot\Lib\DomainRobotConfig;
use IXDomainRobot\Lib\DomainRobotPromise;
use IXDomainRobot\Model\Zone;
use IXDomainRobot\Model\Query;
use IXDomainRobot\Service\DomainRobotService;

class ZoneService extends DomainRobotService
{
    private $zoneModel;

    /**
     *
     * @param Zone $zoneModel
     * @param DomainRobotConfig $domainRobotConfig
     */
    public function __construct(Zone $zoneModel, DomainRobotConfig $domainRobotConfig)
    {
        parent::__construct($domainRobotConfig);
        $this->zoneModel = $zoneModel;
    }

    /**
     * Sends a zone create request.
     *
     * @return Zone
     */
    public function create()
    {
        $domainRobotPromise = $this->createAsync();
        $domainRobotResult = $domainRobotPromise->wait();

        DomainRobot::setLastDomainRobotResult($domainRobotResult);

        return new Zone(ArrayHelper::getValueFromArray($domainRobotResult->getResult(), 'data.0', []));
    }

    /**
     * Sends a zone create request.
     *
     * @return DomainRobotPromise
     */
    public function createAsync()
    {
        return $this->sendRequest(
            $this->domainRobotConfig->getUrl() . "/zone",
            'POST',
            ["json" => $this->zoneModel->toArray(true)]
        );
    }

    /**
     * Sends a zone stream request to add and/or remove records for every zone with
     * the given origin.
     * 
     * @param [string] $name
     * @return Zone
     */
    public function stream($name)
    {
        $domainRobotPromise = $this->streamAsync($name);
        $domainRobotResult = $domainRobotPromise->wait();

        DomainRobot::setLastDomainRobotResult($domainRobotResult);

        return new Zone(ArrayHelper::getValueFromArray($domainRobotResult->getResult(), 'data.0', []));
    }

    /**
     * Sends a zone stream request to add and/or remove records for every zone with
     * the given origin.
     * 
     * @param [string] $name
     * @return DomainRobotPromise
     */
    public function streamAsync($name)
    {
        return $this->sendRequest(
            $this->domainRobotConfig->getUrl() . "/zone/$name/_stream",
            'POST',
            ["json" => $this->zoneModel->toArray(true)]
        );
    }

    /**
     * Imports an existing zone.
     * 
     * @param [string] $name
     * @param [string] $systemNameServer
     * @return Zone
     */
    public function importZone()
    {
        $domainRobotPromise = $this->importZoneAsync();
        $domainRobotResult = $domainRobotPromise->wait();

        DomainRobot::setLastDomainRobotResult($domainRobotResult);

        return new Zone(ArrayHelper::getValueFromArray($domainRobotResult->getResult(), 'data.0', []));
    }

    /**
     * Imports an existing zone.
     * 
     * @param [string] $name
     * @param [string] $systemNameServer
     * @return DomainRobotPromise
     */
    public function importZoneAsync()
    {
        $name = $this->zoneModel->getOrigin();
        $systemNameServer = $this->zoneModel->getVirtualNameServer();

        return new DomainRobotPromise($this->sendRequest(
            $this->domainRobotConfig->getUrl() . "/zone/$name/$systemNameServer/_import",
            'POST',
            ["json" => $this->zoneModel->toArray(true)]
        ));
    }

    /**
     * Sends a zone list request.
     *
     * @return Zone[]
     */
    public function list(Query $query = null)
    {
        $domainRobotPromise = $this->listAsync($query);
        $domainRobotResult = $domainRobotPromise->wait();

        DomainRobot::setLastDomainRobotResult($domainRobotResult);
        $data = $domainRobotResult->getResult()['data'];
        $zones = array();
        foreach ($data as $d) {
            $z = new Zone($d);
            array_push($zones, $z);
        }
        return $zones;
    }

    /**
     * Sends a zone list request.
     *
     * @return DomainRobotPromise
     */
    public function listAsync(Query $query = null)
    {

        if ($query === null) {
            return new DomainRobotPromise($this->sendRequest(
                $this->domainRobotConfig->getUrl() . "/zone/_search",
                'POST',
                ["json" => null]
            ));
        } else {
            return new DomainRobotPromise($this->sendRequest(
                $this->domainRobotConfig->getUrl() . "/zone/_search",
                'POST',
                ["json" => $query->toArray(true)]
            ));
        }
    }

    /**
     * Sends a Contact info request.
     *
     * @param [string] $name
     * @param [string] $systemNameServer
     * @return Zone
     */
    public function info($name, $systemNameServer)
    {
        $domainRobotPromise = $this->infoAsync($name, $systemNameServer);
        $domainRobotResult = $domainRobotPromise->wait();

        return new Zone(ArrayHelper::getValueFromArray($domainRobotResult->getResult(), 'data.0', []));
    }

    /**
     * Sends a Contact info request.
     *
     * @param [string] $name
     * @param [string] $systemNameServer
     * @return DomainRobotPromise
     */
    public function infoAsync($name, $systemNameServer)
    {
        return $this->sendRequest(
            $this->domainRobotConfig->getUrl() . "/zone/$name/$systemNameServer",
            'GET'
        );
    }

    /**
     * Sends a Zone delete request.
     *
     * @param [string] $name
     * @param [string] $systemNameServer
     * @return 
     */
    public function delete($name, $systemNameServer)
    {
        $domainRobotPromise = $this->deleteAsync($name, $systemNameServer);
        $domainRobotPromise->wait();
    }

    /**
     * Sends a Zone delete request.
     *
     * @param [string] $name
     * @param [string] $systemNameServer
     * @return 
     */
    public function deleteAsync($name, $systemNameServer)
    {
        $this->sendRequest(
            $this->domainRobotConfig->getUrl() . "/zone/$name/$systemNameServer",
            'DELETE',
        );
    }

    /**
     * Sends a zone update request.
     *
     * @param [string] $name
     * @param [string] $systemNameServer
     * @return Zone
     */
    public function update($name, $systemNameServer)
    {
        $domainRobotPromise = $this->updateAsync($name, $systemNameServer);
        $domainRobotResult = $domainRobotPromise->wait();

        DomainRobot::setLastDomainRobotResult($domainRobotResult);

        return new Zone(ArrayHelper::getValueFromArray($domainRobotResult->getResult(), 'data.0', []));
    }

    /**
     * Sends a zone update request.
     *
     * @param [string] $name
     * @param [string] $systemNameServer
     * @return GuzzleHttp\Promise\PromiseInterface $promise
     */
    public function updateAsync($name, $systemNameServer)
    {
        return $this->sendRequest(
            $this->domainRobotConfig->getUrl() . "/zone/$name/$systemNameServer",
            'PUT',
            ["json" => $this->zoneModel->toArray(true)]
        );
    }
}
