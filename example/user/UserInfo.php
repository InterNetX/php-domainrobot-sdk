<?php

namespace Example;

use Domainrobot\Domainrobot;
use Domainrobot\Lib\DomainrobotAuth;
use Domainrobot\Lib\DomainrobotException;
use Domainrobot\Model\User;

class SDKController
{
    /**
     * Inquire user by context and return found user as model
     *
     * @return User
     */
    public function userInfo()
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
            // pass username and context to info command
            // returns Domainrobot\Model\User
            $user = $domainrobot->user->info("username", 4);
        } catch (DomainrobotException $exception) {
            return $exception;
        }
        
        return $user;
    }
}
