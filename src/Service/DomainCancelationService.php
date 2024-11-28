<?php

namespace Domainrobot\Service;

use Domainrobot\Domainrobot;
use Domainrobot\Lib\ArrayHelper;
use Domainrobot\Lib\DomainrobotConfig;
use Domainrobot\Lib\DomainrobotPromise;
use Domainrobot\Model\Query;
use Domainrobot\Model\DomainCancelation;
use Domainrobot\Model\JsonNoData;
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
     * @param DomainCancelation $domainCancelation
     * @return DomainCancelation
     */
    public function create(DomainCancelation $domainCancelation)
    {
        $domainrobotPromise = $this->createAsync($domainCancelation);
        $domainrobotResult = $domainrobotPromise->wait();

        Domainrobot::setLastDomainrobotResult($domainrobotResult);

        return new DomainCancelation(ArrayHelper::getValueFromArray($domainrobotResult->getResult(), 'data.0', []));
    }

    /**
     * Sends a DomainCancelation create request.
     *
     * @param DomainCancelation $domainCancelation
     * @return DomainrobotPromise
     */
    public function createAsync(DomainCancelation $domainCancelation)
    {
        if ($domainCancelation->getDomain() === null) {
            throw new \InvalidArgumentException("Field DomainCancelation.domain is missing.");
        }
        return $this->sendRequest(
            $this->domainrobotConfig->getUrl() . "/domain/".$domainCancelation->getDomain()."/cancelation",
            'POST',
            ["json" => $domainCancelation->toArray()]
        );
    }

    /**
     * Sends a DomainCancelation update request.
     *
     * @param DomainCancelation $body
     * @return DomainCancelation
     */
    public function update(DomainCancelation $domainCancelation)
    {
        $domainrobotPromise = $this->updateAsync($domainCancelation);
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
    public function updateAsync(DomainCancelation $domainCancelation)
    {
        if ($domainCancelation->getDomain() === null) {
            throw new \InvalidArgumentException("Field DomainCancelation.domain is missing.");
        }
        return $this->sendRequest(
            $this->domainrobotConfig->getUrl() . "/domain/".$domainCancelation->getDomain()."/cancelation",
            'PUT',
            ["json" => $domainCancelation->toArray()]
        );
    }

    /**
     * Deletes an existing cancelation for the given domain.
     *
     * @param string $domain
     * @return JsonNoData
     */
    public function delete($domain)
    {
        $domainrobotPromise = $this->deleteAsync($domain);
        $domainrobotResult = $domainrobotPromise->wait();

        Domainrobot::setLastDomainrobotResult($domainrobotResult);

        return new JsonNoData();
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
     * @param Query|null $query
     * @return DomainCancelation[]
     */
    public function list(?Query $query = null)
    {
        $domainrobotPromise = $this->listAsync($query);
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
     * @param Query|null $query
     * @return DomainrobotPromise
     */

    public function listAsync(?Query $query = null)
    {
        $data = null;
        if ($query != null) {
            $data = $query->toArray();
        }
        
        return new DomainrobotPromise($this->sendRequest(
            $this->domainrobotConfig->getUrl() . "/domain/cancelation/_search",
            'POST',
            ["json" => $data]
        ));
    }
}

