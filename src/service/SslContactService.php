<?php

namespace IXDomainRobot\Service;

use IXDomainRobot\DomainRobot;
use IXDomainRobot\Lib\ArrayHelper;
use IXDomainRobot\Lib\DomainRobotConfig;
use IXDomainRobot\Lib\DomainRobotPromise;
use IXDomainRobot\Model\Query;
use IXDomainRobot\Model\SslContact;
use IXDomainRobot\Service\DomainRobotService;

class SslContactService extends DomainRobotService
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
     * Sends a sslcontact create request.
     *
     * @param SslContact $body
     * @return SslContact
     */
    public function create(SslContact $body)
    {
        $domainRobotPromise = $this->createAsync($body);
        $domainRobotResult = $domainRobotPromise->wait();

        DomainRobot::setLastDomainRobotResult($domainRobotResult);

        return new SslContact(ArrayHelper::getValueFromArray($domainRobotResult->getResult(), 'data.0', []));
    }

    /**
     * Sends a sslcontact create request.
     *
     * @param SslContact $body
     * @return DomainRobotPromise
     */
    public function createAsync(SslContact $body)
    {
        return $this->sendRequest(
            $this->domainRobotConfig->getUrl() . "/sslcontacct",
            'POST',
            ["json" => $body->toArray(true)]
        );
    }

    /**
     * Sends a sslcontact list request.
     *
     * @param Query $body
     * @return SslContact[]
     */
    public function list(Query $body = null)
    {
        $domainRobotPromise = $this->listAsync($body);
        $domainRobotResult = $domainRobotPromise->wait();

        DomainRobot::setLastDomainRobotResult($domainRobotResult);
        $data = $domainRobotResult->getResult()['data'];
        $contacts = array();
        foreach ($data as $d) {
            $c = new SslContact($d);
            array_push($contacts, $c);
        }
        return $contacts;
    }

    /**
     * Sends a sslcontact list request.
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
            $this->domainRobotConfig->getUrl() . "/sslcontact/_search",
            'POST',
            ["json" => $data]
        ));
    }

    /**
     * Sends a sslcontact info request.
     *
     * @param [int] $id
     * @return SslContact
     */
    public function info($id)
    {
        $domainRobotPromise = $this->infoAsync($id);
        $domainRobotResult = $domainRobotPromise->wait();


        return new SslContact(ArrayHelper::getValueFromArray($domainRobotResult->getResult(), 'data.0', []));
    }

    /**
     * Sends a sslcontact info request.
     *
     * @param [int] $id
     * @return DomainRobotPromise
     */
    public function infoAsync($id)
    {
        return $this->sendRequest(
            $this->domainRobotConfig->getUrl() . "/sslcontact/$id",
            'GET'
        );
    }

    /**
     * Sends a sslcontact delete request.
     *
     * @param [int] $id
     * @return SslContact
     */
    public function delete($id)
    {
        $domainRobotPromise = $this->deleteAsync($id);
        $domainRobotPromise->wait();
    }

    /**
     * Sends a sslcontact delete request.
     *
     * @param [int] $id
     * @return DomainRobotPromise
     */
    public function deleteAsync($id)
    {
        $this->sendRequest(
            $this->domainRobotConfig->getUrl() . "/sslcontact/$id",
            'DELETE'
        );
    }

    /**
     * Sends a sslcontact update request.
     *
     * @param SslContact $body
     * @return SslContact
     */
    public function update(SslContact $body)
    {
        $domainRobotPromise = $this->updateAsync($body);
        $domainRobotResult = $domainRobotPromise->wait();

        DomainRobot::setLastDomainRobotResult($domainRobotResult);

        return new SslContact(ArrayHelper::getValueFromArray($domainRobotResult->getResult(), 'data.0', []));
    }

    /**
     * Sends a sslcontact update request.
     *
     * @param SslContact $body
     * @return DomainRobotPromise
     */
    public function updateAsync(SslContact $body)
    {
        if ($body->getId() === null) {
            throw InvalidArgumentException("Field SslContact.id is missing.");
        }
        return $this->sendRequest(
            $this->domainRobotConfig->getUrl()."/sslcontact/".$body->getId(),
            'PUT',
            ["json" => $body->toArray(true)]
        );
    }
}
