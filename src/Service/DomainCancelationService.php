<?php

namespace Domainrobot\Service;

use Domainrobot\Domainrobot;
use Domainrobot\Lib\ArrayHelper;
use Domainrobot\Lib\DomainrobotConfig;
use Domainrobot\Lib\DomainrobotPromise;
use Domainrobot\Model\Query;
use Domainrobot\Model\DomainCancelation;
use Domainrobot\Service\DomainrobotService;

class DomainCancelationService extends DomainrobotService
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
     * Sends a DomainCancelation create request.
     *
     * @param DomainCancelation $body
     * @return DomainCancelation
     */
    public function create(DomainCancelation $body)
    {
        $domainrobotPromise = $this->createAsync($body);
        $domainrobotResult = $domainrobotPromise->wait();

        Domainrobot::setLastDomainrobotResult($domainrobotResult);

        return new DomainCancelation(ArrayHelper::getValueFromArray($domainrobotResult->getResult(), 'data.0', []));
    }

    /**
     * Sends a DomainCancelation create request.
     *
     * @param DomainCancelation $body
     * @return DomainrobotPromise
     */
    public function createAsync(DomainCancelation $body)
    {
        if ($body->getDomain() === null) {
            throw new \InvalidArgumentException("Field DomainCancelation.domain is missing.");
        }
        return $this->sendRequest(
            $this->domainrobotConfig->getUrl() . "/domain/".$body->getDomain()."/cancelation",
            'POST',
            ["json" => $body->toArray()]
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
        $domainrobotPromise = $this->updateAsync($body);
        $domainrobotResult = $domainrobotPromise->wait();

        Domainrobot::setLastDomainrobotResult($domainrobotResult);

        return new DomainCancelation(ArrayHelper::getValueFromArray($domainrobotResult->getResult(), 'data.0', []));
    }

    /**
     * Sends a DomainCancelation update request.
     *
     * @param DomainCancelation $body
     * @return DomainrobotPromise
     */
    public function updateAsync(DomainCancelation $body)
    {
        if ($body->getDomain() === null) {
            throw new \InvalidArgumentException("Field DomainCancelation.domain is missing.");
        }
        return $this->sendRequest(
            $this->domainrobotConfig->getUrl() . "/domain/".$body->getDomain()."/cancelation",
            'PUT',
            ["json" => $body->toArray()]
        );
    }

    /**
     * Deletes an existing cancelation for the given domain.
     *
     * @param string $domain
     * @return void
     */
    public function delete($domain)
    {
        $domainrobotPromise = $this->deleteAsync($domain);
        $domainrobotResult = $domainrobotPromise->wait();

        Domainrobot::setLastDomainrobotResult($domainrobotResult);
    }


    /**
     * Deletes an existing cancelation for the given domain.
     *
     * @param string $domain
     * @return DomainrobotPromise
     */
    public function deleteAsync($domain)
    {
        return $this->sendRequest(
            $this->domainrobotConfig->getUrl() . "/domain/$domain/cancelation",
            'DELETE'
        );
    }


    /**
     * Fetches the cancelation for the given domain.
     *
     * @param string $domain
     * @return DomainCancelation
     */
    public function info($domain)
    {
        $domainrobotPromise = $this->infoAsync($domain);
        $domainrobotResult = $domainrobotPromise->wait();

        Domainrobot::setLastDomainrobotResult($domainrobotResult);

        return new DomainCancelation(ArrayHelper::getValueFromArray($domainrobotResult->getResult(), 'data.0', []));
    }

    /**
     * Fetches the cancelation for the given domain.
     *
     * @param string $domain
     * @return DomainrobotPromise
     */
    public function infoAsync($domain)
    {
        return $this->sendRequest(
            $this->domainrobotConfig->getUrl() . "/domain/$domain/cancelation",
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
     * @param Query|null $body
     * @return DomainCancelation[]
     */
    public function list(Query $body = null)
    {
        $domainrobotPromise = $this->listAsync($body);
        $domainrobotResult = $domainrobotPromise->wait();

        Domainrobot::setLastDomainrobotResult($domainrobotResult);

        $data = $domainrobotResult->getResult()['data'];
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
            $this->domainrobotConfig->getUrl() . "/domain/cancelation/_search",
            'POST',
            ["json" => $data]
        ));
    }
}
