<?php

namespace Example;

use Domainrobot\Domainrobot;
use Domainrobot\Lib\DomainrobotAuth;
use Domainrobot\Lib\DomainrobotException;
use Domainrobot\Model\ObjectJob;

/**
 * This example is focused on a domain update the general principle holds true
 * for ALL tasks you want to execute for a subuser of your auth user
 */
class SDKController
{
    /**
     * Inquire and renew a domain
     * returns an ObjectJob since the task itself is asynchronous
     *
     * @return ObjectJob
     */
    public function domainRenew()
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

            $job = $domainrobot->domain->renew($domain);
        } catch (DomainrobotException $exception) {
            return$exception;
        }
        
        return $job;
    }
}
