<?php

namespace Example;

use Domainrobot\Domainrobot;
use Domainrobot\Lib\DomainrobotAuth;
use Domainrobot\Lib\DomainrobotException;
use Domainrobot\Model\Redirect;

class SDKController
{
    /**
     * Create an email redirect
     *
     * @return Redirect
     */
    public function redirectCreateEmail()
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

            // Set the source email
            $redirect->setSource("webmaster@example-1.com");

            // Set the target email
            $redirect->setTarget("webmaster@example-2.com");

            // Set type EMAIL
            $redirect->setType("EMAIL");

            // Set mode SINGLE
            $redirect->setMode("SINGLE");

            // Domainrobot\Model\Redirect
            $object = $domainrobot->redirect->create($redirect);

        } catch (DomainrobotException $exception) {
            return $exception;
        }
        
        return $object;
    }
}
