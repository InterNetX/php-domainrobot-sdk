<?php

namespace Domainrobot\Service;

use Domainrobot\Domainrobot;

use Domainrobot\Lib\DomainrobotConfig;
use Domainrobot\Model\DomainEnvelope;
use Domainrobot\Model\DomainEnvelopeSearchRequest;
use Domainrobot\Model\DomainEnvelopeSearchService;
use Domainrobot\Model\DomainStudioSourceCustom;
use Domainrobot\Model\DomainStudioSources;
use Domainrobot\Service\DomainrobotService;

/**
 * Implementation of the Whois API functions derived of the Domainstudio API
 *
 * @author Christian Pleintinger
 */
class WhoisService extends DomainrobotService
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
     * Sends a Whois Single Request
     * 
     * @param string $domain
     * @return string $whoisStatus
     */
    public function single($domain) 
    {
        $domainrobotPromise = $this->requestAsync([ $domain ]);
        $domainrobotResult = $domainrobotPromise->wait();

        Domainrobot::setLastDomainrobotResult($domainrobotResult);

        $domainEnvelope = $domainrobotResult->getResult()['data'][0];

        $whoisStatus = '';
        if (!empty($domainEnvelope['services']['whois']['data']['status'])) {
            $whoisStatus = $domainEnvelope['services']['whois']['data']['status'];
        }

        return $whoisStatus;
    }

    /**
     * Sends a Whois Multi Request
     * 
     * @param string $domain
     * @return array $whoisStatus
     */
    public function multi(array $domains)
    {
        $domainrobotPromise = $this->requestAsync($domains);
        $domainrobotResult = $domainrobotPromise->wait();

        Domainrobot::setLastDomainrobotResult($domainrobotResult);

        $data = $domainrobotResult->getResult()['data'];

        $whoisStatus = [];
        foreach ($data as $domainEnvelope) {
            if (!empty($domainEnvelope['services']['whois']['data']['status'])) {
                $whoisStatus[] = [
                    'name' => $domainEnvelope['domain'],
                    'status' => $domainEnvelope['services']['whois']['data']['status']
                ];
            }
        }

        return $whoisStatus;
    }

    /**
     * Sends a Whois Request
     *
     * @param array $domains
     * @return DomainrobotPromise
     */
    public function requestAsync($domains) {

        $domainStudioSourceCustom = new DomainStudioSourceCustom();
        $domainStudioSourceCustom->setDomains($domains);
        $domainStudioSourceCustom->setServices([ 
                                    DomainEnvelopeSearchService::WHOIS 
                                ]);

        $domainStudioSources = new DomainStudioSources();
        $domainStudioSources->setCustom($domainStudioSourceCustom);

        $domainEnvelopeSearchRequest = new DomainEnvelopeSearchRequest();
        $domainEnvelopeSearchRequest->setSources($domainStudioSources);

        return $this->sendRequest(
            $this->domainrobotConfig->getUrl() . "/domainstudio",
            "POST",
            ["json" => $domainEnvelopeSearchRequest->toArray()]
        );
    }
}
