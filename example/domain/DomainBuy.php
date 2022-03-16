<?php

namespace Example;

use Domainrobot\Domainrobot;
use Domainrobot\Lib\DomainrobotAuth;
use Domainrobot\Lib\DomainrobotException;
use Domainrobot\Model\Domain;
use Domainrobot\Model\DomainExtensions;
use Domainrobot\Model\DomainBuyExtensions;
use Domainrobot\Model\NameServer;
use Domainrobot\Model\ObjectJob;

class SDKController
{
    /**
     * Buy a domain of the Sedo premium market.
     * 
     * IMPORTANT: As of now this task does not work in an sandbox enviroment,
     * because of the necessity to query the price of an domain 
     * from Sedo (which only works live).
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

             // Set the name of domain wanted to buy
            $domain->setName("sedo-example.com");

            // Set the price and currency of the domain wanted to buy
            $domain->setExtensions(new DomainExtensions([
                'domainBuyExtensions' => new DomainBuyExtensions([
                    'amount' => 76,
                    'currency' => "EUR"
                ]),
            ]));

            // Set the name servers of the domain
            $domain->setNameServers([
                new NameServer([
                    "name" => "ns1.example.com"
                ]),
                new NameServer([
                    "name" => "ns2.example.com"
                ]),
                new NameServer([
                    "name" => "ns3.example.com"
                ])
            ]);

            // Load an existing domain contact
            // Domainrobot\Model\Contact
            $contact = $domainrobot->contact->info(23372787);

            // Set the necessary contact info with the loaded contact
            $domain->setAdminc($contact);
            $domain->setOwnerc($contact);
            $domain->setTechc($contact);
            $domain->setZonec($contact);

            // Domainrobot\Model\ObjectJob
            $objectJob = $domainrobot->domain->buy($domain);

        } catch (DomainrobotException $exception) {
            return $exception;
        }
        
        return $objectJob;
    }
}
