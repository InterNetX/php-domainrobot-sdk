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
     * Inquire user by context and return found user as model
     *
     * @return ObjectJob
     */
    public function domainCreate()
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
            $domain = new Domain();
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
            //$domain->setIgnoreWhois(true);
            
            $objectJob = $domainrobot->domain->create($domain);

        } catch (DomainrobotException $exception) {
            return $exception;
        }
        
        return $objectJob;
    }
}
