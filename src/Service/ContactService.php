<?php

namespace Domainrobot\Service;

use Domainrobot\Domainrobot;
use Domainrobot\Lib\ArrayHelper;
use Domainrobot\Lib\DomainrobotConfig;
use Domainrobot\Lib\DomainrobotPromise;
use Domainrobot\Model\Query;
use Domainrobot\Model\Contact;
use Domainrobot\Model\JsonNoData;
use Domainrobot\Service\DomainrobotService;

class ContactService extends DomainrobotService
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
     * Sends a contact create request.
     *
     * @param Contact $body
     * @return Contact
     */
    public function create(Contact $body, array $keys = [])
    {
        $keysString = '';
        if ( count($keys) > 0 ) {
            $keysString = '?keys[]=' . implode('&keys[]=', $keys);
        }

        $domainrobotPromise = $this->createAsync($body, $keysString);
        $domainrobotResult = $domainrobotPromise->wait();

        Domainrobot::setLastDomainrobotResult($domainrobotResult);

        return new Contact(ArrayHelper::getValueFromArray($domainrobotResult->getResult(), 'data.0', []));
    }

    /**
     * Sends a contact create request.
     *
     * @param Contact $body
     * @return DomainrobotPromise
     */
    public function createAsync(Contact $body, $keysString)
    {
        return $this->sendRequest(
            $this->domainrobotConfig->getUrl() . "/contact" . $keysString,
            'POST',
            ["json" => $body->toArray()]
        );
    }

    /**
     * Sends a contact list request.
     * 
     * The following keys can be used for filtering, ordering or fetching additional
     * data via query parameter:
     *
     * * country
     * * pcode
     * * city
     * * type
     * * title
     * * lname
     * * alias
     * * state
     * * id
     * * sip
     * * fax
     * * verification
     * * email
     * * fname
     * * address
     * * created
     * * phone
     * * organization
     * * domainsafe
     * * comment
     * * updated
     *
     * @param Query|null $body
     * @return Contact[]
     */
    public function list(Query $body = null)
    {
        $domainrobotPromise = $this->listAsync($body);
        $domainrobotResult = $domainrobotPromise->wait();

        Domainrobot::setLastDomainrobotResult($domainrobotResult);

        $data = $domainrobotResult->getResult()['data'];
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
     * The following keys can be used for filtering, ordering or fetching additional
     * data via query parameter:
     *
     * * country
     * * pcode
     * * city
     * * type
     * * title
     * * lname
     * * alias
     * * state
     * * id
     * * sip
     * * fax
     * * verification
     * * email
     * * fname
     * * address
     * * created
     * * phone
     * * organization
     * * domainsafe
     * * comment
     * * updated
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
            $this->domainrobotConfig->getUrl() . "/contact/_search",
            'POST',
            ["json" => $data]
        ));
    }

    /**
     * Sends a contact info request.
     *
     * @param int $id
     * @return Contact
     */
    public function info($id)
    {
        $domainrobotPromise = $this->infoAsync($id);
        $domainrobotResult = $domainrobotPromise->wait();

        Domainrobot::setLastDomainrobotResult($domainrobotResult);

        return new Contact(ArrayHelper::getValueFromArray($domainrobotResult->getResult(), 'data.0', []));
    }

    /**
     * Sends a contact info request.
     *
     * @param int $id
     * @return DomainrobotPromise
     */
    public function infoAsync($id)
    {
        return $this->sendRequest(
            $this->domainrobotConfig->getUrl() . "/contact/$id",
            'GET'
        );
    }

    /**
     * Sends a contact delete request.
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
     * Sends a contact delete request.
     *
     * @param int $id
     * @return DomainrobotPromise
     */
    public function deleteAsync($id)
    {
        return $this->sendRequest(
            $this->domainrobotConfig->getUrl() . "/contact/$id",
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
        $domainrobotPromise = $this->updateAsync($body);
        $domainrobotResult = $domainrobotPromise->wait();

        Domainrobot::setLastDomainrobotResult($domainrobotResult);

        return new Contact(ArrayHelper::getValueFromArray($domainrobotResult->getResult(), 'data.0', []));
    }

    /**
     * Sends a contact update request.
     *
     * @param Contact $body
     * @return DomainrobotPromise
     */
    public function updateAsync(Contact $body)
    {
        if ($body->getId() === null) {
            throw new \InvalidArgumentException("Field Contact.id is missing.");
        }
        return $this->sendRequest(
            $this->domainrobotConfig->getUrl() . "/contact/".$body->getId(),
            'PUT',
            ["json" => $body->toArray()]
        );
    }
}
