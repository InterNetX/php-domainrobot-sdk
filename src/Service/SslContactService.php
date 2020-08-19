<?php

namespace Domainrobot\Service;

use Domainrobot\Domainrobot;
use Domainrobot\Lib\ArrayHelper;
use Domainrobot\Lib\DomainrobotConfig;
use Domainrobot\Lib\DomainrobotPromise;
use Domainrobot\Model\JsonNoData;
use Domainrobot\Model\Query;
use Domainrobot\Model\SslContact;
use Domainrobot\Service\DomainrobotService;

class SslContactService extends DomainrobotService
{

    /**
     *
     * @param DomainrobotConfig $domainrobotConfig
     */
    public function __construct(DomainrobotConfig $domainrobotConfig)
    {
        parent::__construct($domainrobotConfig);
    }

    /**
     * Sends a sslcontact create request.
     *
     * @param SslContact $body
     * @return SslContact
     */
    public function create(SslContact $body)
    {
        $domainrobotPromise = $this->createAsync($body);
        $domainrobotResult = $domainrobotPromise->wait();

        Domainrobot::setLastDomainrobotResult($domainrobotResult);

        return new SslContact(ArrayHelper::getValueFromArray($domainrobotResult->getResult(), 'data.0', []));
    }

    /**
     * Sends a sslcontact create request.
     *
     * @param SslContact $body
     * @return DomainrobotPromise
     */
    public function createAsync(SslContact $body)
    {
        return $this->sendRequest(
            $this->domainrobotConfig->getUrl() . "/sslcontact",
            'POST',
            ["json" => $body->toArray()]
        );
    }

    /**
     * Sends a sslcontact list request.
     * 
     * The following keys can be used for filtering, ordering or fetching additional
     * data via query parameter:
     *
     * * country
     * * fname
     * * address
     * * city
     * * created
     * * title
     * * lname
     * * phone
     * * organization
     * * state
     * * id
     * * fax
     * * pcode
     * * updated
     * * email
     *
     * @param Query|null $body
     * @return SslContact[]
     */
    public function list(Query $body = null)
    {
        $domainrobotPromise = $this->listAsync($body);
        $domainrobotResult = $domainrobotPromise->wait();

        Domainrobot::setLastDomainrobotResult($domainrobotResult);
        
        $data = $domainrobotResult->getResult()['data'];
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
     * The following keys can be used for filtering, ordering or fetching additional
     * data via query parameter:
     *
     * * country
     * * fname
     * * address
     * * city
     * * created
     * * title
     * * lname
     * * phone
     * * organization
     * * state
     * * id
     * * fax
     * * pcode
     * * updated
     * * email
     *
     * @param Query|null $body
     * @return DomainrobotPromise
     */
    public function listAsync(Query $body = null)
    {
        $data = null;
        if ($body != null) {
            $data = $body->toArray();
        }
        return new DomainrobotPromise($this->sendRequest(
            $this->domainrobotConfig->getUrl() . "/sslcontact/_search",
            'POST',
            ["json" => $data]
        ));
    }

    /**
     * Sends a sslcontact info request.
     *
     * @param int $id
     * @return SslContact
     */
    public function info($id)
    {
        $domainrobotPromise = $this->infoAsync($id);
        $domainrobotResult = $domainrobotPromise->wait();

        Domainrobot::setLastDomainrobotResult($domainrobotResult);

        return new SslContact(ArrayHelper::getValueFromArray($domainrobotResult->getResult(), 'data.0', []));
    }

    /**
     * Sends a sslcontact info request.
     *
     * @param int $id
     * @return DomainrobotPromise
     */
    public function infoAsync($id)
    {
        return $this->sendRequest(
            $this->domainrobotConfig->getUrl() . "/sslcontact/$id",
            'GET'
        );
    }

    /**
     * Sends a sslcontact delete request.
     *
     * @param int $id
     * @return JsonNoData
     */
    public function delete($id)
    {
        $domainrobotPromise = $this->deleteAsync($id);
        $domainrobotResult = $domainrobotPromise->wait();

        Domainrobot::setLastDomainrobotResult($domainrobotResult);

        return new JsonNoData();
    }

    /**
     * Sends a sslcontact delete request.
     *
     * @param int $id
     * @return DomainrobotPromise
     */
    public function deleteAsync($id)
    {
        return $this->sendRequest(
            $this->domainrobotConfig->getUrl() . "/sslcontact/$id",
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
        $domainrobotPromise = $this->updateAsync($body);
        $domainrobotResult = $domainrobotPromise->wait();

        Domainrobot::setLastDomainrobotResult($domainrobotResult);

        return new SslContact(ArrayHelper::getValueFromArray($domainrobotResult->getResult(), 'data.0', []));
    }

    /**
     * Sends a sslcontact update request.
     *
     * @param SslContact $body
     * @return DomainrobotPromise
     */
    public function updateAsync(SslContact $body)
    {
        if ($body->getId() === null) {
            throw new \InvalidArgumentException("Field SslContact.id is missing.");
        }
        return $this->sendRequest(
            $this->domainrobotConfig->getUrl()."/sslcontact/".$body->getId(),
            'PUT',
            ["json" => $body->toArray()]
        );
    }
}
