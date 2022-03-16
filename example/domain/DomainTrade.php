<?php

namespace Example;

use Domainrobot\Domainrobot;
use Domainrobot\Lib\DomainrobotAuth;
use Domainrobot\Lib\DomainrobotException;
use Domainrobot\Model\Domain;
use Domainrobot\Model\ObjectJob;

class SDKController
{
    /**
     * Change the OwnerC of an existing domain.
     * 
     * With the /domain/_trade task it is possible to switch from the domain 
     * contact of one user to the domain contact of another user (Transfer).
     * 
     * For this task there are two prerequisites.
     * 
     * First and most important is that the registry must support the trade task. 
     * 
     * Secondly you must have an valid authinfo code.
     * The authinfo must be generated with the /domain/{name}/_authinfo1 task.
     * 
     * 
     * GET /domain/example.be/_authinfo1
     * 
     * 
     * In the /domain/{name}/_authinfo1 Response look after the attribute "authinfo".
     *
     * @return ObjectJob
     */
    public function domainTrade()
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

            // Set the name of the domain which should be transfered to the new OwnerC
            $domain->setName("example.be");

            // Set the authinfo code 
            $domain->setAuthinfo("-qm-WJbL3DqyABCb");

            // Confirm the consent of the owner
            $domain->setConfirmOwnerConsent(true);

            // Domainrobot\Model\Contact
            $contact = $domainrobot->contact->info(23372784);

            // Set the new OwnerC
            $domain->setOwnerc($contact);

            // Domainrobot\Model\ObjectJob
            $objectJob = $domainrobot->domain->trade($domain);

        } catch (DomainrobotException $exception) {
            return $exception;
        }
        
        return $objectJob;
    }
}
