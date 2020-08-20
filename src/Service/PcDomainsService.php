<?php

namespace Domainrobot\Service;

use Domainrobot\Domainrobot;
use Domainrobot\Lib\ArrayHelper;
use Domainrobot\Lib\DomainrobotConfig;
use Domainrobot\Lib\DomainrobotPromise;
use Domainrobot\Model\ApiAlexaSiteInfoResponse;
use Domainrobot\Model\ApiDomainStudioResponse;
use Domainrobot\Model\ApiEstimationResponse;
use Domainrobot\Model\ApiKeywordResponse;
use Domainrobot\Model\ApiMajesticResponse;
use Domainrobot\Model\ApiMetaResponse;
use Domainrobot\Model\ApiSistrixResponse;
use Domainrobot\Model\ApiSocialMediaResponse;
use Domainrobot\Model\ApiWaybackResponse;
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
     * @return ApiEstimationResponse
     */
    public function estimation(Estimation $estimation)
    {
        $domainrobotPromise = $this->estimationAsync($estimation);
        $domainrobotResult = $domainrobotPromise->wait();

        Domainrobot::setLastDomainrobotResult($domainrobotResult);

        return new ApiEstimationResponse($domainrobotResult->getResult());
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
     * @return ApiAlexaSiteInfoResponse
     */
    public function alexa($domain)
    {
        $domainrobotPromise = $this->alexaAsync($domain);
        $domainrobotResult = $domainrobotPromise->wait();

        Domainrobot::setLastDomainrobotResult($domainrobotResult);

        return new ApiAlexaSiteInfoResponse($domainrobotResult->getResult());
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
     * @return ApiExchangeRateResponse
     */
    public function exchangerate($sourceCurrency, $targetCurrency)
    {
        $domainrobotPromise = $this->exchangerateAsync($sourceCurrency, $targetCurrency);
        $domainrobotResult = $domainrobotPromise->wait();

        Domainrobot::setLastDomainrobotResult($domainrobotResult);

        return new ApiExchangeRateResponse($domainrobotResult->getResult());
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
     * @return ApiDomainStudioResponse
     */
    public function domainstudio($keyword)
    {
        $domainrobotPromise = $this->domainstudioAsync($keyword);
        $domainrobotResult = $domainrobotPromise->wait();

        Domainrobot::setLastDomainrobotResult($domainrobotResult);

        return new ApiDomainStudioResponse($domainrobotResult->getResult());
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
     * @param Keywords $keywords
     * @return ApiKeywordResponse
     */
    public function keyword(Keywords $keywords)
    {
        $domainrobotPromise = $this->keywordAsync($keywords);
        $domainrobotResult = $domainrobotPromise->wait();

        Domainrobot::setLastDomainrobotResult($domainrobotResult);

        return new ApiKeywordResponse($domainrobotResult->getResult());
    }

    /**
     * Sends an Keyword Request
     * Get Google Ad Words Data
     *
     * @param Keywords $keywords
     * @return DomainrobotPromise
     */
    public function keywordAsync(Keywords $keywords)
    {
        return $this->sendRequest(
            $this->domainrobotConfig->getUrl() . "/kwe",
            'POST',
            ["json" => $keywords->toArray()]
        );
    }

    /**
     * Sends an Meta Request
     * Get Meta Information like Online Status, Site Title, Site Description 
     *
     * @param string $domain
     * @return ApiMetaResponse
     */
    public function meta($domain)
    {
        $domainrobotPromise = $this->metaAsync($domain);
        $domainrobotResult = $domainrobotPromise->wait();

        Domainrobot::setLastDomainrobotResult($domainrobotResult);

        return new ApiMetaResponse($domainrobotResult->getResult());
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
     * @return ApiSistrixResponse
     */
    public function sistrix($domain, $country)
    {
        $domainrobotPromise = $this->sistrixAsync($domain, $country);
        $domainrobotResult = $domainrobotPromise->wait();

        Domainrobot::setLastDomainrobotResult($domainrobotResult);

        return new ApiSistrixResponse($domainrobotResult->getResult());
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
     * @param Domains $domains
     * @return ApiMajesticResponse
     */
    public function majestic(Domains $domains)
    {
        $domainrobotPromise = $this->majesticAsync($domains);
        $domainrobotResult = $domainrobotPromise->wait();

        Domainrobot::setLastDomainrobotResult($domainrobotResult);

        return new ApiMajesticResponse($domainrobotResult->getResult());
    }

    /**
     * Sends an Majestic Request
     *
     * @param Domains $domains
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
     * @return ApiSocialMediaResponse
     */
    public function smuCheck($username)
    {
        $domainrobotPromise = $this->smuCheckAsync($username);
        $domainrobotResult = $domainrobotPromise->wait();

        Domainrobot::setLastDomainrobotResult($domainrobotResult);

        return new ApiSocialMediaResponse($domainrobotResult->getResult());
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
     * Retrieve Info from Wayback Snapshot Archive
     *
     * @param string $domain
     * @return ApiWaybackResponse
     */
    public function wayback($domain)
    {
        $domainrobotPromise = $this->waybackAsync($domain);
        $domainrobotResult = $domainrobotPromise->wait();

        Domainrobot::setLastDomainrobotResult($domainrobotResult);

        return new ApiWaybackResponse($domainrobotResult->getResult());
    }

    /**
     * Sends an Wayback Request
     * Retrieve Info from Wayback Snapshot Archive
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
