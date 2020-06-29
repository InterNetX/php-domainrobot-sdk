<?php

namespace Example;

use Domainrobot\Domainrobot;
use Domainrobot\Lib\DomainrobotAuth;
use Domainrobot\Lib\DomainrobotException;
use Domainrobot\Model\Domain;
use Domainrobot\Model\NameServer;
use Domainrobot\Model\ObjectJob;

/**
 * This example is focused on a domain update the general principle holds true
 * for ALL tasks you want to execute for a subuser of your auth user
 */
class SDKController
{
    /**
     * Transfer a domain
     * returns an ObjectJob since the task itself is asynchronous
     *
     * @return ObjectJob
     */
    public function domainTransfer()
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
            // Domainrobot/Model/Domain
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

            // in this example we use an already existing user
            // but you can also create a completely new contact and use that one
            // for an example of contact creation go to example/contact/ContactCreate.php
            $contact = $domainrobot->contact->info(23194139);
            $domain->setAdminc($contact);
            $domain->setOwnerc($contact);
            $domain->setTechc($contact);
            $domain->setZonec($contact);

            // this is just the bare minimum configuration for a transfer
            // please refer https://help.internetx.com/display/APIJSONEN/Technical+Documentation
            // for additional configuration options

            $job = $domainrobot->domain->transfer($domain);
        } catch (DomainrobotException $exception) {
            return$exception;
        }
        
        return $job;
    }
}
