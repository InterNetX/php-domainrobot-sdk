<?php

namespace Example;

use Domainrobot\Domainrobot;
use Domainrobot\Lib\DomainrobotAuth;
use Domainrobot\Lib\DomainrobotException;
use Domainrobot\Model\Redirect;

class SDKController
{
    /**
     * Create an domain redirect
     *
     * @return Redirect
     */
    public function redirectCreateDomain()
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

            // Domainrobot\Model\Redirect
            $redirect = new Redirect();

            // Set the source domain
            $redirect->setSource("example-1.com");

            // Set the target path
            $redirect->setTarget("example-2.com/test");

            // Set type DOMAIN
            $redirect->setType("DOMAIN");

            // Set mode HTTP
            $redirect->setMode("HTTP");

            // Domainrobot\Model\Redirect
            $object = $domainrobot->redirect->create($redirect);

        } catch (DomainrobotException $exception) {
            return $exception;
        }
        
        return $object;
    }
}
