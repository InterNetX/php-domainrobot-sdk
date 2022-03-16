<?php

namespace Example;

use Domainrobot\Domainrobot;
use Domainrobot\Lib\DomainrobotAuth;
use Domainrobot\Lib\DomainrobotException;
use Domainrobot\Model\Domain;
use Domainrobot\Model\NameServer;
use Domainrobot\Model\ObjectJob;

class SDKController
{
    /**
     * Create a premium domain
     * 
     * For this task there are two prerequisites.
     * 
     * First and most important is that the user is allowed to order premium domains (Reseller).
     * 
     * Secondly you must know a premium domain with its price class.
     * You can achieve that for example by searching with the domainstudio task.
     * 
     * 
     * POST /domainstudio
     * {
     *     "searchToken": "example.com",
     *     "currency": "EUR"
     * }
     * 
     * 
     * In the /domainstudio Response look after the attribute "source": "PREMIUM".
     * 
     * With an premium domain you selected you must now inquire its price class.
     * 
     * 
     * GET /domainpremium/examples.shop
     * 
     * 
     * In the /domainpremium Response look after the attribute "priceClass".
     *
     * @return ObjectJob
     */
    public function domainCreatePremium()
    {
        // Create an domainrobot instance
        $domainrobot = new Domainrobot([
            "url" => "https://api.autodns.com/v1",
            "auth" => new DomainrobotAuth([
                "user" => "username",
                "password" => "password",
                "context" => 4
            ])
        ]);

        try {

            // Domainrobot\Model\Domain
            $domain = new Domain();

            // Set the name of the premium domain
            $domain->setName("examples.shop");

            // Set the inquired price class of the premium domain 
            $domain->setPriceClass("SHOP-TIER9");

            // Set the name servers of the premium domain
            $domain->setNameServers([
                new NameServer([
                    "name" => "ns1.example.shop"
                ]),
                new NameServer([
                    "name" => "ns2.example.shop"
                ]),
                new NameServer([
                    "name" => "ns3.example.shop"
                ])
            ]);

            // Load an existing domain contact
            // Domainrobot\Model\Contact
            $contact = $domainrobot->contact->info(23372784);

            // Set the necessary contact info with the loaded contact
            $domain->setAdminc($contact);
            $domain->setOwnerc($contact);
            $domain->setTechc($contact);
            $domain->setZonec($contact);
            
            // Domainrobot\Model\ObjectJob
            $objectJob = $domainrobot->domain->create($domain);

        } catch (DomainrobotException $exception) {
            return $exception;
        }
        
        return $objectJob;
    }
}
