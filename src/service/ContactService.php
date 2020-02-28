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
    private $contactModel;

    /**
     *
     * @param Contact $contactModel
     * @param DomainRobotConfig $domainRobotConfig
     */
    public function __construct(Contact $contactModel, DomainRobotConfig $domainRobotConfig)
    {
        parent::__construct($domainRobotConfig);
        $this->contactModel = $contactModel;
    }

    /**
     * Sends a contact create request.
     *
     * @return Contact
     */
    public function create()
    {
        $domainRobotPromise = $this->createAsync();
        $domainRobotResult = $domainRobotPromise->wait();

        DomainRobot::setLastDomainRobotResult($domainRobotResult);

        return new Contact(ArrayHelper::getValueFromArray($domainRobotResult->getResult(), 'data.0', []));
    }

    /**
     * Sends a contact create request.
     *
     * @return DomainRobotPromise
     */
    public function createAsync()
    {
        return $this->sendRequest(
            $this->domainRobotConfig->getUrl() . "/contact",
            'POST',
            ["json" => $this->contactModel->toArray(true)]
        );
    }

    /**
     * Sends a contact list request.
     *
     * @return Contact[]
     */
    public function list(Query $query = null)
    {
        $domainRobotPromise = $this->listAsync($query);
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
     * @return DomainRobotPromise
     */

    public function listAsync(Query $query = null)
    {

        if ($query === null) {
            return new DomainRobotPromise($this->sendRequest(
                $this->domainRobotConfig->getUrl() . "/contact/_search",
                'POST',
                ["json" => null]
            ));
        } else {
            return new DomainRobotPromise($this->sendRequest(
                $this->domainRobotConfig->getUrl() . "/contact/_search",
                'POST',
                ["json" => $query->toArray(true)]
            ));
        }
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
     * @return GuzzleHttp\Promise\PromiseInterface $promise
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
            'DELETE',
        );
    }

    /**
     * Sends a contact update request.
     *
     * @param [int] $id
     * @return Contact
     */
    public function update($id)
    {
        $domainRobotPromise = $this->updateAsync($id);
        $domainRobotResult = $domainRobotPromise->wait();

        DomainRobot::setLastDomainRobotResult($domainRobotResult);

        return new Contact(ArrayHelper::getValueFromArray($domainRobotResult->getResult(), 'data.0', []));
    }

    /**
     * Sends a contact update request.
     *
     * @param [int] $id
     * @return GuzzleHttp\Promise\PromiseInterface $promise
     */
    public function updateAsync($id)
    {

        return $this->sendRequest(
            $this->domainRobotConfig->getUrl() . "/contact/$id",
            'PUT',
            ["json" => $this->contactModel->toArray(true)]
        );
    }
}
