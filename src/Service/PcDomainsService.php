<?php

namespace Domainrobot\Service;

use Domainrobot\Domainrobot;
use Domainrobot\Lib\ArrayHelper;
use Domainrobot\Lib\DomainrobotConfig;
use Domainrobot\Lib\DomainrobotPromise;
use Domainrobot\Service\DomainrobotService;
use Domainrobot\Model\Estimation;
use Domainrobot\Model\EstimationV1;
use Domainrobot\Model\AlexaSiteInfo;
use Domainrobot\Model\Keywords;
use Domainrobot\Model\Keyword;
use Domainrobot\Model\Domains;
use Domainrobot\Model\Meta;
use Domainrobot\Model\Sistrix;
use Domainrobot\Model\Majestic;
use Domainrobot\Model\SocialMedia;
use Domainrobot\Model\Wayback;

/**
 * Implementation of the PcDomains API functions.
 *
 * @author Christian Pleintinger
 */
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
     * @return EstimationV1[]
     */
    public function estimation(Estimation $estimation)
    {
        $domainrobotPromise = $this->estimationAsync($estimation);
        $domainrobotResult = $domainrobotPromise->wait();

        Domainrobot::setLastDomainrobotResult($domainrobotResult);

        $estimations = ArrayHelper::getValueFromArray($domainrobotResult->getResult(), 'data', []);

        $estimationObjects = [];
        foreach ( $estimations as $estimation ) {
            $estimationObjects[] = new EstimationV1($estimation);
        }

        return $estimationObjects;
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
     * @return AlexaSiteInfo
     */
    public function alexa($domain)
    {
        $domainrobotPromise = $this->alexaAsync($domain);
        $domainrobotResult = $domainrobotPromise->wait();

        Domainrobot::setLastDomainrobotResult($domainrobotResult);

        return new AlexaSiteInfo(ArrayHelper::getValueFromArray($domainrobotResult->getResult(), 'data.0', NULL));
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
     * Sends an Keyword Request
     * Get Google Ad Words Data
     *
     * @param Keywords $keywords
     * @return Keyword[]
     */
    public function keyword(Keywords $keywords)
    {
        $domainrobotPromise = $this->keywordAsync($keywords);
        $domainrobotResult = $domainrobotPromise->wait();

        Domainrobot::setLastDomainrobotResult($domainrobotResult);

        $keywords = ArrayHelper::getValueFromArray($domainrobotResult->getResult(), 'data', []);

        $keywordObjects = [];
        foreach ( $keywords as $keyword ) {
            $keywordObjects[] = new Keyword($keyword);
        }

        return $keywordObjects;
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
     * @return Meta
     */
    public function meta($domain)
    {
        $domainrobotPromise = $this->metaAsync($domain);
        $domainrobotResult = $domainrobotPromise->wait();

        Domainrobot::setLastDomainrobotResult($domainrobotResult);

        return new Meta(ArrayHelper::getValueFromArray($domainrobotResult->getResult(), 'data.0', NULL));
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
     * @return Sistrix
     */
    public function sistrix($domain, $country)
    {
        $domainrobotPromise = $this->sistrixAsync($domain, $country);
        $domainrobotResult = $domainrobotPromise->wait();

        Domainrobot::setLastDomainrobotResult($domainrobotResult);

        return new Sistrix(ArrayHelper::getValueFromArray($domainrobotResult->getResult(), 'data.0', NULL));
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
     * @return Majestic[]
     */
    public function majestic(Domains $domains)
    {
        $domainrobotPromise = $this->majesticAsync($domains);
        $domainrobotResult = $domainrobotPromise->wait();

        Domainrobot::setLastDomainrobotResult($domainrobotResult);

        $majesticResults = ArrayHelper::getValueFromArray($domainrobotResult->getResult(), 'data', []);

        $majesticObjects = [];
        foreach ( $majesticResults as $majesticItem ) {
            $majesticObjects[] = new Majestic($majesticItem);
        }

        return $majesticObjects;
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
     * @return SocialMedia
     */
    public function smuCheck($username)
    {
        $domainrobotPromise = $this->smuCheckAsync($username);
        $domainrobotResult = $domainrobotPromise->wait();

        Domainrobot::setLastDomainrobotResult($domainrobotResult);

        return new SocialMedia(ArrayHelper::getValueFromArray($domainrobotResult->getResult(), 'data.0', NULL));
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
            $this->domainrobotConfig->getUrl() . "/v1/smu_check/$username",
            'GET'
        );
    }

    /**
     * Sends an Wayback Request
     * Retrieve Info from Wayback Snapshot Archive
     *
     * @param string $domain
     * @return Wayback
     */
    public function wayback($domain)
    {
        $domainrobotPromise = $this->waybackAsync($domain);
        $domainrobotResult = $domainrobotPromise->wait();

        Domainrobot::setLastDomainrobotResult($domainrobotResult);

        return new Wayback(ArrayHelper::getValueFromArray($domainrobotResult->getResult(), 'data.0', NULL));
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
