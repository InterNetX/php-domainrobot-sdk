<?php

namespace Domainrobot\Service;

use Domainrobot\Domainrobot;
use Domainrobot\Lib\ArrayHelper;
use Domainrobot\Lib\DomainrobotConfig;
use Domainrobot\Lib\DomainrobotPromise;
use Domainrobot\Model\Estimation;
use Domainrobot\Model\Keywords;
use Domainrobot\Model\Domains;
use Domainrobot\Service\DomainrobotService;

class PcDomainsService extends DomainrobotService
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
     * Sends an Estimation Request
     * Estimates the value for the given domain
     *
     * @param Estimation $estimation
     * @return void
     */
    public function estimation(Estimation $estimation)
    {
        $domainrobotPromise = $this->estimationAsync($estimation);
        $domainrobotResult = $domainrobotPromise->wait();

        Domainrobot::setLastDomainrobotResult($domainrobotResult);
    }

    /**
     * Sends an Estimation Request
     * Estimates the value for the given domain
     *
     * @param Estimation $estimation
     * @return DomainrobotPromise
     */
    public function estimationAsync(Estimation $estimation)
    {
        return $this->sendRequest(
            $this->domainrobotConfig->getUrl() . "/v1/estimate",
            'POST',
            ["json" => $estimation->toArray()]
        );
    }

    /**
     * Sends an Alexa Site Info Request
     *
     * @param string $domain
     * @return void
     */
    public function alexa($domain)
    {
        $domainrobotPromise = $this->alexaAsync($domain);
        $domainrobotResult = $domainrobotPromise->wait();

        Domainrobot::setLastDomainrobotResult($domainrobotResult);
    }

    /**
     * Sends an Alexa Site Info Request
     *
     * @param string $domain
     * @return DomainrobotPromise
     */
    public function alexaAsync($domain)
    {
        return $this->sendRequest(
            $this->domainrobotConfig->getUrl() . "/alexasiteinfo/$domain",
            'GET'
        );
    }

    /**
     * Sends an Exchangerate Request
     *
     * @param string $sourceCurrency
     * @param string $targetCurrency
     * @return void
     */
    public function exchangerate($sourceCurrency, $targetCurrency)
    {
        $domainrobotPromise = $this->exchangerateAsync($sourceCurrency, $targetCurrency);
        $domainrobotResult = $domainrobotPromise->wait();

        Domainrobot::setLastDomainrobotResult($domainrobotResult);
    }

    /**
     * Sends an Exchangerate Request
     *
     * @param string $sourceCurrency
     * @param string $targetCurrency
     * @return DomainrobotPromise
     */
    public function exchangerateAsync($sourceCurrency, $targetCurrency)
    {
        return $this->sendRequest(
            $this->domainrobotConfig->getUrl() . "/v1/exchangerate/$sourceCurrency/$targetCurrency",
            'GET'
        );
    }

    /**
     * Sends an DomainStudio Request
     * Get a list of domain name suggestions
     *
     * @param string $keyword
     * @return void
     */
    public function domainstudio($keyword)
    {
        $domainrobotPromise = $this->domainstudioAsync($keyword);
        $domainrobotResult = $domainrobotPromise->wait();

        Domainrobot::setLastDomainrobotResult($domainrobotResult);
    }

    /**
     * Sends an DomainStudio Request
     * Get a list of domain name suggestions
     *
     * @param string $keyword
     * @return DomainrobotPromise
     */
    public function domainstudioAsync($keyword)
    {
        return $this->sendRequest(
            $this->domainrobotConfig->getUrl() . "/domainstudio/suggest/$keyword",
            'GET'
        );
    }

    /**
     * Sends an Keyword Request
     * Get Google Ad Words Data
     *
     * @param Keywords $keyword
     * @return void
     */
    public function keyword(Keywords $keyword)
    {
        $domainrobotPromise = $this->keywordAsync($keyword);
        $domainrobotResult = $domainrobotPromise->wait();

        Domainrobot::setLastDomainrobotResult($domainrobotResult);
    }

    /**
     * Sends an Keyword Request
     * Get Google Ad Words Data
     *
     * @param Keywords $keyword
     * @return DomainrobotPromise
     */
    public function keywordAsync(Keywords $keyword)
    {
        return $this->sendRequest(
            $this->domainrobotConfig->getUrl() . "/kwe",
            'POST',
            ["json" => $keyword->toArray()]
        );
    }

    /**
     * Sends an Meta Request
     * Get Meta Information like Online Status, Site Title, Site Description 
     *
     * @param string $domain
     * @return void
     */
    public function meta($domain)
    {
        $domainrobotPromise = $this->metaAsync($domain);
        $domainrobotResult = $domainrobotPromise->wait();

        Domainrobot::setLastDomainrobotResult($domainrobotResult);
    }

    /**
     * Sends an Meta Request
     * Get Meta Information like Online Status, Site Title, Site Description 
     *
     * @param string $domain
     * @return DomainrobotPromise
     */
    public function metaAsync($domain)
    {
        return $this->sendRequest(
            $this->domainrobotConfig->getUrl() . "/meta/$domain",
            'GET'
        );
    }

    /**
     * Sends an Sistrix Request
     *
     * @param string $domain
     * @param string $country
     * @return void
     */
    public function sistrix($domain, $country)
    {
        $domainrobotPromise = $this->sistrixAsync($domain, $country);
        $domainrobotResult = $domainrobotPromise->wait();

        Domainrobot::setLastDomainrobotResult($domainrobotResult);
    }

    /**
     * Sends an Sistrix Request
     *
     * @param string $domain
     * @param string $country
     * @return DomainrobotPromise
     */
    public function sistrixAsync($domain, $country)
    {
        return $this->sendRequest(
            $this->domainrobotConfig->getUrl() . "/sistrix/$domain/$country",
            'GET'
        );
    }

    /**
     * Sends an Majestic Request
     *
     * @param Domains $domain
     * @return void
     */
    public function majestic(Domains $domains)
    {
        $domainrobotPromise = $this->majesticAsync($domains);
        $domainrobotResult = $domainrobotPromise->wait();

        Domainrobot::setLastDomainrobotResult($domainrobotResult);
    }

    /**
     * Sends an Majestic Request
     *
     * @param Domains $domain
     * @return DomainrobotPromise
     */
    public function majesticAsync(Domains $domains)
    {

        return $this->sendRequest(
            $this->domainrobotConfig->getUrl() . "/majestic",
            'POST',
            ["json" => $domains->toArray()]
        );
    }

    /**
     * Sends an Social Media User Check Request
     * Checks if Username is available on different Social Media Platforms
     *
     * @param string $username
     * @return void
     */
    public function smuCheck($username)
    {
        $domainrobotPromise = $this->smuCheckAsync($username);
        $domainrobotResult = $domainrobotPromise->wait();

        Domainrobot::setLastDomainrobotResult($domainrobotResult);
    }

    /**
     * Sends an Social Media User Check Request
     * Checks if Username is available on different Social Media Platforms
     *
     * @param string $username
     * @return DomainrobotPromise
     */
    public function smuCheckAsync($username)
    {
        return $this->sendRequest(
            $this->domainrobotConfig->getUrl() . "/smu_check/$username",
            'GET'
        );
    }

    /**
     * Sends an Wayback Request
     * Retrieve Info rom Wayback Snapshot Archive
     *
     * @param string $domain
     * @return void
     */
    public function wayback($domain)
    {
        $domainrobotPromise = $this->waybackAsync($domain);
        $domainrobotResult = $domainrobotPromise->wait();

        Domainrobot::setLastDomainrobotResult($domainrobotResult);
    }

    /**
     * Sends an Wayback Request
     * Retrieve Info rom Wayback Snapshot Archive
     *
     * @param string $domain
     * @return DomainrobotPromise
     */
    public function waybackAsync($domain)
    {
        return $this->sendRequest(
            $this->domainrobotConfig->getUrl() . "/wayback/$domain",
            'GET'
        );
    }
}
