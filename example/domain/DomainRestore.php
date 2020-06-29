<?php

namespace Example;

use Domainrobot\Domainrobot;
use Domainrobot\Lib\DomainrobotAuth;
use Domainrobot\Lib\DomainrobotException;
use Domainrobot\Model\Domain;
use Domainrobot\Model\DomainRestore;
use Domainrobot\Model\NameServer;
use Domainrobot\Model\ObjectJob;

class SDKController
{
    /**
     * Create a Domain
     *
     * @return ObjectJob
     */
    public function domainRestore()
    {
        $domainrobot = new Domainrobot([
            "url" => "https://api.autodns.com/v1",
            "auth" => new DomainrobotAuth([
                "user" => "username",
                "password" => "password",
                "context" => 4
            ])
        ]);

        try {
            $domain = new DomainRestore();
            $domain->setName("php-sdk-test".uniqid().".de");
            $domain->setNameServers([
                new NameServer([
                    "name" => "ns1.example.com"
                ]),
                new NameServer([
                    "name" => "ns2.example.com"
                ])
            ]);
            $contact = $domainrobot->contact->info(23194139);
            $domain->setAdminc($contact);
            $domain->setOwnerc($contact);
            $domain->setTechc($contact);
            $domain->setZonec($contact);
            
            $objectJob = $domainrobot->domain->restore($domain);

        } catch (DomainrobotException $exception) {
            return $exception;
        }
        
        return $objectJob;
    }
}
