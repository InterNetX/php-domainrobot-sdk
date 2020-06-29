<?php

namespace Example;

use Domainrobot\Domainrobot;
use Domainrobot\Lib\DomainrobotAuth;
use Domainrobot\Lib\DomainrobotException;
use Domainrobot\Model\Contact;

class SDKController
{
    /**
     * Create a contact
     *
     * @return Contact
     */
    public function contactInfo()
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
            $contact = $domainrobot->contact->info(234234234);
        } catch (DomainrobotException $exception) {
            return $exception;
        }
        
        return $contact;
    }
}
