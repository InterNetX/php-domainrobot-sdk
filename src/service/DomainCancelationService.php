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

    /**
     *
     * @param DomainRobotConfig $domainRobotConfig
     */
    public function __construct(DomainRobotConfig $domainRobotConfig)
    {
        parent::__construct($domainRobotConfig);
    }

    /**
     * Sends a DomainCancelation create request.
     *
     * @param DomainCancelation $body
     * @return DomainCancelation
     */
    public function create(DomainCancelation $body)
    {
        $domainRobotPromise = $this->createAsync($body);
        $domainRobotResult = $domainRobotPromise->wait();

        DomainRobot::setLastDomainRobotResult($domainRobotResult);

        return new DomainCancelation(ArrayHelper::getValueFromArray($domainRobotResult->getResult(), 'data.0', []));
    }

    /**
     * Sends a DomainCancelation create request.
     *
     * @param DomainCancelation $body
     * @return DomainRobotPromise
     */
    public function createAsync(DomainCancelation $body)
    {
        if ($body->getDomain() === null) {
            throw InvalidArgumentException("Field DomainCancelation.domain is missing.");
        }
        return $this->sendRequest(
            $this->domainRobotConfig->getUrl() . "/domain/".$body->getDomain()."/cancelation",
            'POST',
            ["json" => $body->toArray(true)]
        );
    }

    /**
     * Sends a DomainCancelation update request.
     *
     * @param DomainCancelation $body
     * @return DomainCancelation
     */
    public function update(DomainCancelation $body)
    {
        $domainRobotPromise = $this->updateAsync($name);
        $domainRobotResult = $domainRobotPromise->wait();

        DomainRobot::setLastDomainRobotResult($domainRobotResult);

        return new DomainCancelation(ArrayHelper::getValueFromArray($domainRobotResult->getResult(), 'data.0', []));
    }

    /**
     * Sends a DomainCancelation update request.
     *
     * @param DomainCancelation $body
     * @return DomainRobotPromise
     */
    public function updateAsync(DomainCancelation $body)
    {
        if ($body->getDomain() === null) {
            throw InvalidArgumentException("Field DomainCancelation.domain is missing.");
        }
        return $this->sendRequest(
            $this->domainRobotConfig->getUrl() . "/domain/".$body->getDomain()."/cancelation",
            'PUT',
            ["json" => $body->toArray(true)]
        );
    }

    /**
     * Deletes an existing cancelation for the given domain.
     *
     * @param [string] $domain
     * @return
     */
    public function delete($domain)
    {
        $domainRobotPromise = $this->deleteAsync($domain);
        $domainRobotPromise->wait();
    }


    /**
     * Deletes an existing cancelation for the given domain.
     *
     * @param [string] $domain
     * @return
     */
    public function deleteAsync($domain)
    {
        $this->sendRequest(
            $this->domainRobotConfig->getUrl() . "/domain/$domain/cancelation",
            'DELETE'
        );
    }


    /**
     * Fetches the cancelation for the given domain.
     *
     * @param [string] $domain
     * @return DomainCancelation
     */
    public function info($domain)
    {
        $domainRobotPromise = $this->infoAsync($domain);
        $domainRobotResult = $domainRobotPromise->wait();


        return new DomainCancelation(ArrayHelper::getValueFromArray($domainRobotResult->getResult(), 'data.0', []));
    }

    /**
     * Fetches the cancelation for the given domain.
     *
     * @param [string] $domain
     * @return DomainRobotPromise
     */
    public function infoAsync($domain)
    {
        return $this->sendRequest(
            $this->domainRobotConfig->getUrl() . "/domain/$domain/cancelation",
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
     * @param Query $body
     * @return DomainCancelation[]
     */
    public function list(Query $body = null)
    {
        $domainRobotPromise = $this->listAsync($body);
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
            $this->domainRobotConfig->getUrl() . "/domain/cancelation/_search",
            'POST',
            ["json" => $data]
        ));
    }
}
