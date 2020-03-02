<?php

namespace IXDomainRobot\Service;

use IXDomainRobot\DomainRobot;
use IXDomainRobot\Lib\ArrayHelper;
use IXDomainRobot\Lib\DomainRobotConfig;
use IXDomainRobot\Lib\DomainRobotPromise;
use IXDomainRobot\Model\Query;
use IXDomainRobot\Model\Contact;
use IXDomainRobot\Service\DomainRobotService;

class ContactService extends DomainRobotService
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
     * Sends a contact create request.
     *
     * @param Contact $body
     * @return Contact
     */
    public function create(Contact $body)
    {
        $domainRobotPromise = $this->createAsync($body);
        $domainRobotResult = $domainRobotPromise->wait();

        DomainRobot::setLastDomainRobotResult($domainRobotResult);

        return new Contact(ArrayHelper::getValueFromArray($domainRobotResult->getResult(), 'data.0', []));
    }

    /**
     * Sends a contact create request.
     *
     * @param Contact $body
     * @return DomainRobotPromise
     */
    public function createAsync(Contact $body)
    {
        return $this->sendRequest(
            $this->domainRobotConfig->getUrl() . "/contact",
            'POST',
            ["json" => $body->toArray(true)]
        );
    }

    /**
     * Sends a contact list request.
     *
     * @param Query $body
     * @return Contact[]
     */
    public function list(Query $body = null)
    {
        $domainRobotPromise = $this->listAsync($body);
        $domainRobotResult = $domainRobotPromise->wait();

        DomainRobot::setLastDomainRobotResult($domainRobotResult);
        $data = $domainRobotResult->getResult()['data'];
        $contacts = array();
        foreach ($data as $d) {
            $c = new Contact($d);
            array_push($contacts, $c);
        }
        return $contacts;
    }

    /**
     * Sends a contact list request.
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
            $this->domainRobotConfig->getUrl() . "/contact/_search",
            'POST',
            ["json" => $data]
        ));
    }

    /**
     * Sends a contact info request.
     *
     * @param [int] $id
     * @return Contact
     */
    public function info($id)
    {
        $domainRobotPromise = $this->infoAsync($id);
        $domainRobotResult = $domainRobotPromise->wait();


        return new Contact(ArrayHelper::getValueFromArray($domainRobotResult->getResult(), 'data.0', []));
    }

    /**
     * Sends a contact info request.
     *
     * @param [int] $id
     * @return DomainRobotPromise
     */
    public function infoAsync($id)
    {
        return $this->sendRequest(
            $this->domainRobotConfig->getUrl() . "/contact/$id",
            'GET'
        );
    }

    /**
     * Sends a contact delete request.
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
     * Sends a contact delete request.
     *
     * @param [int] $id
     * @return
     */
    public function deleteAsync($id)
    {
        $this->sendRequest(
            $this->domainRobotConfig->getUrl() . "/contact/$id",
            'DELETE'
        );
    }

    /**
     * Sends a contact update request.
     *
     * @param Contact $body
     * @return Contact
     */
    public function update(Contact $body)
    {
        $domainRobotPromise = $this->updateAsync($body);
        $domainRobotResult = $domainRobotPromise->wait();

        DomainRobot::setLastDomainRobotResult($domainRobotResult);

        return new Contact(ArrayHelper::getValueFromArray($domainRobotResult->getResult(), 'data.0', []));
    }

    /**
     * Sends a contact update request.
     *
     * @param Contact $body
     * @return DomainRobotPromise
     */
    public function updateAsync(Contact $body)
    {
        if ($body->getId() === null) {
            throw InvalidArgumentException("Field Contact.id is missing.");
        }
        return $this->sendRequest(
            $this->domainRobotConfig->getUrl() . "/contact/".$body->getId(),
            'PUT',
            ["json" => $body->toArray(true)]
        );
    }
}
