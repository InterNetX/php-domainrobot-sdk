<?php

namespace Example;

use Domainrobot\Domainrobot;
use Domainrobot\Lib\DomainrobotAuth;
use Domainrobot\Lib\DomainrobotException;
use Domainrobot\Model\ObjectJob;
use Domainrobot\Model\RegistryStatusConstants;

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
    public function updateStatus()
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
            $domain = $domainrobot->domain->info("example.com");

            // update the domain model with the new data
            $domain->setRegistryStatus(RegistryStatusConstants::HOLD_LOCK);

            // to update the domain for the subuser set the following headers
            $job = $domainrobot->domain->updateStatus($domain);

        } catch (DomainrobotException $exception) {
            return$exception;
        }
        
        return $job;
    }
}
