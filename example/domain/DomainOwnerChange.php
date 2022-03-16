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
     * Change the OwnerC of an existing domain.
     * 
     * With the /domain/{name}/_ownerChange task it is possible to switch from 
     * one domain contact to another domain contact of the same user.
     *
     * @return ObjectJob
     */
    public function domainOwnerChange()
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

            // Set the name of the domain
            $domain->setName("example.com");

            // Confirm the consent of the owner
            $domain->setConfirmOwnerConsent(true);

            // Domainrobot\Model\Contact
            $contact = $domainrobot->contact->info(23372784);

            // Set the new OwnerC
            $domain->setOwnerc($contact);

            // Domainrobot\Model\ObjectJob
            $objectJob = $domainrobot->domain->ownerChange($domain);

        } catch (DomainrobotException $exception) {
            return $exception;
        }
        
        return $objectJob;
    }
}
