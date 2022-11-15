<?php

namespace Domainrobot\Service;

use Domainrobot\Domainrobot;
use Domainrobot\Lib\ArrayHelper;
use Domainrobot\Lib\DomainrobotConfig;
use Domainrobot\Lib\DomainrobotPromise;
use Domainrobot\Model\Query;
use Domainrobot\Model\Redirect;
use Domainrobot\Model\JsonNoData;
use Domainrobot\Service\DomainrobotService;

/**
 * https://help.internetx.com/display/APIXMLDE/Redirect+Create
 */
class RedirectService extends DomainrobotService
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
     * Creating a new redirect.
     *
     * @param Redirect $body
     * @return Redirect
     */
    public function create(Redirect $body, array $keys = [])
    {
        $keysString = '';
        if ( count($keys) > 0 ) {
            $keysString = '?keys[]=' . implode('&keys[]=', $keys);
        }

        $domainrobotPromise = $this->createAsync($body, $keysString);
        $domainrobotResult = $domainrobotPromise->wait();

        Domainrobot::setLastDomainrobotResult($domainrobotResult);

        return new Redirect(ArrayHelper::getValueFromArray($domainrobotResult->getResult(), 'data.0', []));
    }

    /**
     * Creating a new redirect.
     *
     * @param Redirect $body
     * @return DomainrobotPromise
     */
    public function createAsync(Redirect $body, $keysString)
    {
        return $this->sendRequest(
            $this->domainrobotConfig->getUrl() . "/redirect" . $keysString,
            'POST',
            ["json" => $body->toArray()]
        );
    }

    /**
     * Inquiring a list of redirects with certain details. 
     * The following keys can be used for filtering, ordering and inquiring additional data via query parameter: 
     * mode, created, domain, source, type, title, updated, target.
     * 
     * @param Query|null $body
     * @return Redirect[]
     */
    public function list(Query $body = null)
    {
        $domainrobotPromise = $this->listAsync($body);
        $domainrobotResult = $domainrobotPromise->wait();

        Domainrobot::setLastDomainrobotResult($domainrobotResult);

        $data = $domainrobotResult->getResult()['data'];

        $redirects = array();
        foreach ($data as $d) {
            $r = new Redirect($d);
            array_push($redirects, $r);
        }

        return $redirects;
    }

    /**
     * Inquiring a list of redirects with certain details. 
     * The following keys can be used for filtering, ordering and inquiring additional data via query parameter: 
     * mode, created, domain, source, type, title, updated, target.
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
            $this->domainrobotConfig->getUrl() . "/redirect/_search",
            'POST',
            ["json" => $data]
        ));
    }

    /**
     * Inquiring the data for a specified redirect.
     * 
     * @param string $source
     * @return Redirect
     */
    public function info($source)
    {
        $domainrobotPromise = $this->infoAsync($source);
        $domainrobotResult = $domainrobotPromise->wait();

        Domainrobot::setLastDomainrobotResult($domainrobotResult);

        return new Redirect(ArrayHelper::getValueFromArray($domainrobotResult->getResult(), 'data.0', []));
    }

    /**
     * Inquiring the data for a specified redirect.
     *
     * @param string $source
     * @return DomainrobotPromise
     */
    public function infoAsync($source)
    {
        return $this->sendRequest(
            $this->domainrobotConfig->getUrl() . "/redirect/" . $source,
            'GET'
        );
    }

    /**
     * Updating an existing redirect.
     *
     * @param Redirect $body
     * @return Redirect
     */
    public function update(Redirect $body)
    {
        $domainrobotPromise = $this->updateAsync($body);
        $domainrobotResult = $domainrobotPromise->wait();

        Domainrobot::setLastDomainrobotResult($domainrobotResult);

        return new Redirect(ArrayHelper::getValueFromArray($domainrobotResult->getResult(), 'data.0', []));
    }

    /**
     * Updating an existing redirect.
     *
     * @param Redirect $body
     * @return DomainrobotPromise
     */
    public function updateAsync(Redirect $body)
    {
        if ($body->getSource() === null) {
            throw new \InvalidArgumentException("Field Redirect.source is missing.");
        }

        return $this->sendRequest(
            $this->domainrobotConfig->getUrl() . "/redirect/" . $body->getSource(),
            'PUT',
            ["json" => $body->toArray()]
        );
    }

    /**
     * Deleting an existing redirect.
     *
     * @param string $source
     * @param array $keys
     * @return JsonNoData
     */
    public function delete($source, array $keys = [])
    {
        $keysString = '';
        if ( count($keys) > 0 ) {
            $keysString = '?keys[]=' . implode('&keys[]=', $keys);
        }

        $domainrobotPromise = $this->deleteAsync($source, $keysString);
        $domainrobotResult = $domainrobotPromise->wait();

        Domainrobot::setLastDomainrobotResult($domainrobotResult);

        return new JsonNoData();
    }

    /**
     * Deleting an existing redirect.
     *
     * @param string $source
     * @param string $keysString
     * @return DomainrobotPromise
     */
    public function deleteAsync($source, $keysString)
    {
        return $this->sendRequest(
            $this->domainrobotConfig->getUrl() . "/redirect/" . $source . $keysString,
            'DELETE'
        );
    }
}
