<?php

namespace Example;

use Domainrobot\Domainrobot;
use Domainrobot\Lib\DomainrobotAuth;
use Domainrobot\Lib\DomainrobotException;

class SDKController
{
    /**
     * Create a contact
     *
     * @return array
     */
    public function contactDelete()
    {
        $domainrobot = new Domainrobot([
            'url' => 'https://api.autodns.com/v1',
            'auth' => new DomainrobotAuth([
                'user' => 'username',
                'password' => 'password',
                'context' => 4
            ])
        ]);

        try {
            
            $domainrobot->contact->delete(234234234);

        } catch (DomainrobotException $exception) {
            return $exception;
        }
        
        return Domainrobot::getLastDomainrobotResult()->getResult();
    }
}
