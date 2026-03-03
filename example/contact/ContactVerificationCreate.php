<?php

namespace Example;

use Domainrobot\Domainrobot;
use Domainrobot\Lib\DomainrobotAuth;
use Domainrobot\Lib\DomainrobotException;
use Domainrobot\Model\ContactVerification;

class SDKController
{
    /**
     * Create a contact verification job
     *
     * Creates a verification job for the given contact ID.
     * If a job already exists for that contact it will be updated and restarted.
     *
     * Route: POST /contact/{id}/verification
     *
     * @return ContactVerification
     */
    public function contactVerificationCreate()
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
            $contactVerification = $domainrobot->contact->verificationCreate(234234234);
        } catch (DomainrobotException $exception) {
            return $exception;
        }

        return $contactVerification;
    }
}
