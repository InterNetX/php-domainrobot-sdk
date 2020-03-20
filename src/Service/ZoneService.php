<?php

namespace Domainrobot\Service;

use Domainrobot\DomainRobot;
use Domainrobot\Lib\ArrayHelper;
use Domainrobot\Lib\DomainRobotConfig;
use Domainrobot\Lib\DomainRobotPromise;
use Domainrobot\Model\Zone;
use Domainrobot\Model\ZoneStream;
use Domainrobot\Model\Query;
use Domainrobot\Service\DomainRobotService;

class ZoneService extends DomainRobotService
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
     * Sends a zone create request.
     *
     * @param Zone $body
     * @return Zone
     */
    public function create(Zone $body)
    {
        $domainRobotPromise = $this->createAsync($body);
        $domainRobotResult = $domainRobotPromise->wait();

        DomainRobot::setLastDomainRobotResult($domainRobotResult);

        return new Zone(ArrayHelper::getValueFromArray($domainRobotResult->getResult(), 'data.0', []));
    }

    /**
     * Sends a zone create request.
     *
     * @param Zone $body
     * @return DomainRobotPromise
     */
    public function createAsync(Zone $body)
    {
        return $this->sendRequest(
            $this->domainRobotConfig->getUrl() . "/zone",
            'POST',
            ["json" => $body->toArray(true)]
        );
    }

    /**
     * Sends a zone stream request to add and/or remove records for every zone with
     * the given origin.
     *
     * @param [string] $origin
     * @param ZoneStream $body
     */
    public function stream($origin, ZoneStream $body)
    {
        $domainRobotPromise = $this->streamAsync($origin, $body);
        $domainRobotResult = $domainRobotPromise->wait();

        DomainRobot::setLastDomainRobotResult($domainRobotResult);

        return new Zone(ArrayHelper::getValueFromArray($domainRobotResult->getResult(), 'data.0', []));
    }

    /**
     * Sends a zone stream request to add and/or remove records for every zone with
     * the given origin.
     *
     * @param [string] $origin
     * @param ZoneStream $body
     * @return DomainRobotPromise
     */
    public function streamAsync($origin, ZoneStream $body)
    {
        return $this->sendRequest(
            $this->domainRobotConfig->getUrl() . "/zone/$origin/_stream",
            'POST',
            ["json" => $body->toArray(true)]
        );
    }

    /**
     * Imports an existing zone.
     *
     * @param Zone $body
     * @return Zone
     */
    public function importZone(Zone $body)
    {
        $domainRobotPromise = $this->importZoneAsync($body);
        $domainRobotResult = $domainRobotPromise->wait();

        DomainRobot::setLastDomainRobotResult($domainRobotResult);

        return new Zone(ArrayHelper::getValueFromArray($domainRobotResult->getResult(), 'data.0', []));
    }

    /**
     * Imports an existing zone.
     *
     * @param Zone $body
     * @return DomainRobotPromise
     */
    public function importZoneAsync(Zone $body)
    {
        $name = $body->getOrigin();
        $systemNameServer = $body->getVirtualNameServer();

        return new DomainRobotPromise($this->sendRequest(
            $this->domainRobotConfig->getUrl() . "/zone/$name/$systemNameServer/_import",
            'POST',
            ["json" => $body->toArray(true)]
        ));
    }

    /**
     * Sends a zone list request.
     *
     * The following keys can be used for filtering, ordering or fetching additional
     * data via query parameter:
     *
     * * dnssec
     * * created
     * * mainip
     * * secondary1
     * * secondary2
     * * secondary3
     * * secondary4
     * * secondary5
     * * secondary6
     * * secondary7
     * * virtualNameServer
     * * domainsafe
     * * name
     * * comment
     * * updated
     * * action
     * * primary
     * * changed
     *
     * @param Query $body
     * @return Zone[]
     */
    public function list(Query $body = null)
    {
        $domainRobotPromise = $this->listAsync($body);
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
     * The following keys can be used for filtering, ordering or fetching additional
     * data via query parameter:
     *
     * * dnssec
     * * created
     * * mainip
     * * secondary1
     * * secondary2
     * * secondary3
     * * secondary4
     * * secondary5
     * * secondary6
     * * secondary7
     * * virtualNameServer
     * * domainsafe
     * * name
     * * comment
     * * updated
     * * action
     * * primary
     * * changed
     *
     * @param Query $body
     * @return DomainRobotPromise
     */
    public function listAsync(Query $body = null)
    {
        $data = null;
        if ($body != null) {
            $data = $body->toArray(true);
        }
        return new DomainRobotPromise($this->sendRequest(
            $this->domainRobotConfig->getUrl() . "/zone/_search",
            'POST',
            ["json" => $data]
        ));
    }

    /**
     * Sends a zone info request.
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
     * Sends a zone info request.
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
     * Sends a zone delete request.
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
     * Sends a zone delete request.
     *
     * @param [string] $name
     * @param [string] $systemNameServer
     * @return
     */
    public function deleteAsync($name, $systemNameServer)
    {
        $this->sendRequest(
            $this->domainRobotConfig->getUrl() . "/zone/$name/$systemNameServer",
            'DELETE'
        );
    }

    /**
     * Sends a zone update request.
     *
     * @param Zone $body
     * @return Zone
     */
    public function update(Zone $body)
    {
        $domainRobotPromise = $this->updateAsync($body);
        $domainRobotResult = $domainRobotPromise->wait();

        DomainRobot::setLastDomainRobotResult($domainRobotResult);

        return new Zone(ArrayHelper::getValueFromArray($domainRobotResult->getResult(), 'data.0', []));
    }

    /**
     * Sends a zone update request.
     *
     * @param Zone $body
     * @return GuzzleHttp\Promise\PromiseInterface $promise
     */
    public function updateAsync(Zone $body)
    {
        if ($body->getOrigin() === null) {
            throw InvalidArgumentException("Field Zone.origin is missing.");
        }
        if ($body->getVirtualNameServer() === null) {
            throw InvalidArgumentException("Field Zone.virtualNameServer is missing.");
        }
        return $this->sendRequest(
            $this->domainRobotConfig->getUrl() . "/zone/$name/$systemNameServer",
            'PUT',
            ["json" => $body->toArray(true)]
        );
    }
}
