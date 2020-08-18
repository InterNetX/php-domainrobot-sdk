<?php

namespace Domainrobot\Service;

use Domainrobot\Domainrobot;
use Domainrobot\Lib\ArrayHelper;
use Domainrobot\Lib\DomainrobotConfig;
use Domainrobot\Lib\DomainrobotPromise;
use Domainrobot\Model\Currency;
use Domainrobot\Model\Estimation;
use Domainrobot\Model\Keyword;
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
    public function priceEstimation(Estimation $estimation)
    {
        $domainrobotPromise = $this->priceEstimationAsync($estimation);
        $domainrobotResult = $domainrobotPromise->wait();

        Domainrobot::setLastDomainrobotResult($domainrobotResult);
    }

    /**
     * Sends an Estimation Request
     *
     * @param Estimation $estimation
     * @return DomainrobotPromise
     */
    public function priceEstimationAsync(Estimation $estimation)
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
    public function alexaSiteInfo($domain)
    {
        $domainrobotPromise = $this->alexaSiteInfoAsync($domain);
        $domainrobotResult = $domainrobotPromise->wait();

        Domainrobot::setLastDomainrobotResult($domainrobotResult);
    }

    /**
     * Sends an Alexa Site Info Request
     *
     * @param string $domain
     * @return DomainrobotPromise
     */
    public function alexaSiteInfoAsync($domain)
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
    public function currencyExchangerate($sourceCurrency, $targetCurrency)
    {
        $domainrobotPromise = $this->currencyExchangerateAsync($sourceCurrency, $targetCurrency);
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
    public function currencyExchangerateAsync($sourceCurrency, $targetCurrency)
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
    public function domainStudioSuggestion($keyword)
    {
        $domainrobotPromise = $this->domainStudioSuggestionAsync($keyword);
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
    public function domainStudioSuggestionAsync($keyword)
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
     * @param Keyword $keyword
     * @return void
     */
    public function googleAdWordsKeywordInfo(Keyword $keyword)
    {
        $domainrobotPromise = $this->googleAdWordsKeywordInfoAsync($keyword);
        $domainrobotResult = $domainrobotPromise->wait();

        Domainrobot::setLastDomainrobotResult($domainrobotResult);
    }

    /**
     * Sends an Keyword Request
     * Get Google Ad Words Data
     *
     * @param Keyword $keyword
     * @return DomainrobotPromise
     */
    public function googleAdWordsKeywordInfoAsync(Keyword $keyword)
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
    public function metaInfo($domain)
    {
        $domainrobotPromise = $this->metaInfoAsync($domain);
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
    public function metaInfoAsync($domain)
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
    public function sistrixInfo($domain, $country)
    {
        $domainrobotPromise = $this->sistrixInfoAsync($domain, $country);
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
    public function sistrixInfoAsync($domain, $country)
    {
        return $this->sendRequest(
            $this->domainrobotConfig->getUrl() . "/sistrix/$domain/$country",
            'GET'
        );
    }

    /**
     * Sends an Majestic Request
     *
     * @param array|string $domain
     * @return void
     */
    public function majesticInfo($domain)
    {
        $domainrobotPromise = $this->majesticInfoAsync($domain);
        $domainrobotResult = $domainrobotPromise->wait();

        Domainrobot::setLastDomainrobotResult($domainrobotResult);
    }

    /**
     * Sends an Majestic Request
     *
     * @param array|string $domain
     * @return DomainrobotPromise
     */
    public function majesticInfoAsync($domain)
    {
        $data = [];
        if ( is_array($domain) === FALSE ) {
            $data[] = $domain;
        } else {
            $data = $domain;
        }

        return $this->sendRequest(
            $this->domainrobotConfig->getUrl() . "/majestic",
            'POST',
            ["json" => $data]
        );
    }

    /**
     * Sends an Social Media User Check Request
     * Checks if Username is available on different Social Media Platforms
     *
     * @param string $username
     * @return void
     */
    public function socialMediaUserCheck($username)
    {
        $domainrobotPromise = $this->socialMediaUserCheckAsync($username);
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
    public function socialMediaUserCheckAsync($username)
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
    public function waybackInfo($domain)
    {
        $domainrobotPromise = $this->waybackInfoAsync($domain);
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
    public function waybackInfoAsync($domain)
    {
        return $this->sendRequest(
            $this->domainrobotConfig->getUrl() . "/wayback/$domain",
            'GET'
        );
    }
}
