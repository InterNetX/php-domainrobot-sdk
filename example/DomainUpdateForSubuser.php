<?php

namespace Example;

use Domainrobot\Domainrobot;
use Domainrobot\Lib\DomainrobotAuth;
use Domainrobot\Lib\DomainrobotException;
use Domainrobot\Lib\DomainrobotHeaders;
use Domainrobot\Model\Contact;

/**
 * This example is focused on a domain update the general principle holds true
 * for ALL tasks you want to execute for a subuser of your auth user
 */
class SDKController
{
    /**
     * Inquire and update a domain for a subuser
     * returns an ObjectJob since the task itself is asynchronous
     *
     * @return ObjectJob
     */
    public function updateDomain()
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
            $domain = $domainrobot->domain->info("example.com");

            // update the domain model with the new data
            // for example set a new admin contact
            $domain->setAdminc(new Contact(["id" => 21365838]));

            // to update the domain for the subuser set the following headers
            $job = $domainrobot->domain->addHeaders([
                DomainrobotHeaders::DOMAINROBOT_HEADER_OWNER => "ownername",
                DomainrobotHeaders::DOMAINROBOT_HEADER_OWNER_CONTEXT => 797095  //owner context

            ])->update($domain);

        } catch (DomainrobotException $exception) {
            return$exception;
        }
        
        return $job;
    }
}
