<?php

namespace Example;

use Domainrobot\Domainrobot;
use Domainrobot\Lib\DomainrobotAuth;
use Domainrobot\Lib\DomainrobotException;
use Domainrobot\Model\DomainEnvelopeSearchRequest;
use Domainrobot\Model\DomainStudioSources;
use Domainrobot\Model\DomainStudioSourceSuggestion;

class SDKController
{
    /**
     * Inquire domain name suggestions derived from a searchtoken;
     * returns an array of DomainEnvelope(s) containing domain suggestions
     *
     * @return DomainEnvelope[]
     */
    public function domainStudioSearch()
    {
        $domainrobot = new Domainrobot([
            'url' => 'https://api.autodns.com/v1',
            'auth' => new DomainrobotAuth([
                'user' => 'username',
                'password' => 'password',
                'context' => 4
            ])
        ]);

        $domainEnvelopeSearchRequest = new DomainEnvelopeSearchRequest();

        $domainStudioSources = new DomainStudioSources();
        $domainStudioSources->setSuggestion(new DomainStudioSourceSuggestion([
            'max' => 5,
            'useIdn' => true
        ]));

        // you can also set more than one source
        // $domainStudioSources->setPremium(new DomainStudioSourcePremium([
        //     'max' => 5
        // ]));

        // more available sources are
        // $domainStudioSources->setInitial(\Domainrobot\Model\DomainStudioSourceInitial)
        // $domainStudioSources->setGeo(\Domainrobot\Model\DomainStudioSourceGeo)
        // $domainStudioSources->setSimilar(' => ')\Domainrobot\Model\DomainStudioSourceSimilar)
        // $domainStudioSources->setRecommended(\Domainrobot\Model\DomainStudioSourceSimilar)


        $domainEnvelopeSearchRequest->setSources($domainStudioSources);
        $domainEnvelopeSearchRequest->setCurrency('USD');
        $domainEnvelopeSearchRequest->setSearchToken('example');

        try {
            $domainSuggestions = $domainrobot->domainStudio->search($domainEnvelopeSearchRequest);
        } catch (DomainrobotException $exception) {
            return $exception->getError();
        }
        
        return $domainSuggestions;
    }
}

// Example response

// {
//   "stid": "20200629-app3-dev-6089",
//   "data": [
//     {
//       "domain": "homeexample.net",
//       "idn": "homeexample.net",
//       "source": "SUGGESTION",
//       "forceDnsCheck": false,
//       "onlyAvailable": false,
//       "isPrereg": false
//     },
//     {
//       "domain": "examplelist.com",
//       "idn": "examplelist.com",
//       "source": "SUGGESTION",
//       "forceDnsCheck": false,
//       "onlyAvailable": false,
//       "isPrereg": false
//     },
//     {
//       "domain": "examplelaw.com",
//       "idn": "examplelaw.com",
//       "source": "SUGGESTION",
//       "forceDnsCheck": false,
//       "onlyAvailable": false,
//       "isPrereg": false
//     },
//     {
//       "domain": "examplehouse.net",
//       "idn": "examplehouse.net",
//       "source": "SUGGESTION",
//       "forceDnsCheck": false,
//       "onlyAvailable": false,
//       "isPrereg": false
//     },
//     {
//       "domain": "officeexample.com",
//       "idn": "officeexample.com",
//       "source": "SUGGESTION",
//       "forceDnsCheck": false,
//       "onlyAvailable": false,
//       "isPrereg": false
//     }
//   ]
// }
