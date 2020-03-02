<?php

namespace IXDomainRobot\Service;

use IXDomainRobot\DomainRobot;
use IXDomainRobot\Lib\ArrayHelper;
use IXDomainRobot\Lib\DomainRobotConfig;
use IXDomainRobot\Lib\DomainRobotPromise;
use IXDomainRobot\Model\Query;
use IXDomainRobot\Model\SslContact;
use IXDomainRobot\Service\DomainRobotService;

class SSlContactService extends DomainRobotService
{
    private $sslContactModel;

    /**
     *
     * @param SslContact $sslContactModel
     * @param DomainRobotConfig $domainRobotConfig
     */
    public function __construct(SslContact $sslContacteModel, DomainRobotConfig $domainRobotConfig)
    {
        parent::__construct($domainRobotConfig);
        $this->sslContactModel = $sslContacteModel;
    }

    /**
     * Sends a sslcontact create request.
     *
     * @return SslContact
     */
    public function create()
    {
        $domainRobotPromise = $this->createAsync();
        $domainRobotResult = $domainRobotPromise->wait();

        DomainRobot::setLastDomainRobotResult($domainRobotResult);

        return new SslContact(ArrayHelper::getValueFromArray($domainRobotResult->getResult(), 'data.0', []));
    }

    /**
     * Sends a sslcontact create request.
     *
     * @return DomainRobotPromise
     */
    public function createAsync()
    {
        return $this->sendRequest(
            $this->domainRobotConfig->getUrl() . "/sslcontacct",
            'POST',
            ["json" => $this->sslContactModel->toArray(true)]
        );
    }

    /**
     * Sends a sslcontact list request.
     *
     * @return SslContact[]
     */
    public function list(Query $query = null)
    {
        $domainRobotPromise = $this->listAsync($query);
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
     * @return DomainRobotPromise
     */

    public function listAsync(Query $query = null)
    {

        if ($query === null) {
            return new DomainRobotPromise($this->sendRequest(
                $this->domainRobotConfig->getUrl() . "/sslcontact/_search",
                'POST',
                ["json" => null]
            ));
        } else {
            return new DomainRobotPromise($this->sendRequest(
                $this->domainRobotConfig->getUrl() . "/sslcontact/_search",
                'POST',
                ["json" => $query->toArray(true)]
            ));
        }
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
     * @return GuzzleHttp\Promise\PromiseInterface $promise
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
     * @return GuzzleHttp\Promise\PromiseInterface $promise
     */
    public function deleteAsync($id)
    {
        $this->sendRequest(
            $this->domainRobotConfig->getUrl() . "/sslcontact/$id",
            'DELETE',
        );
    }

    /**
     * Sends a sslcontact update request.
     *
     * @param [int] $id
     * @return SslContact
     */
    public function update($id)
    {
        $domainRobotPromise = $this->updateAsync($id);
        $domainRobotResult = $domainRobotPromise->wait();

        DomainRobot::setLastDomainRobotResult($domainRobotResult);

        return new SslContact(ArrayHelper::getValueFromArray($domainRobotResult->getResult(), 'data.0', []));
    }

    /**
     * Sends a sslcontact update request.
     *
     * @param [int] $id
     * @return GuzzleHttp\Promise\PromiseInterface $promise
     */
    public function updateAsync($id)
    {
        return $this->sendRequest(
            $this->domainRobotConfig->getUrl() . "/sslcontact/$id",
            'PUT',
            ["json" => $this->sslContactModel->toArray(true)]
        );
    }
}
