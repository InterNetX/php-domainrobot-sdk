<?php

namespace Example;

use Domainrobot\Domainrobot;
use Domainrobot\Lib\DomainrobotAuth;
use Domainrobot\Lib\DomainrobotException;
use Domainrobot\Model\JsonNoData;

class SDKController
{
    /**
     * Resend the verification e-mail for a contact
     *
     * Route: PUT /contact/{id}/verification/_resendEmail
     *
     * @return JsonNoData
     */
    public function contactVerificationResendEmail()
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
            $domainrobot->contact->verificationResendEmail(234234234);
        } catch (DomainrobotException $exception) {
            return $exception;
        }

        return new JsonNoData();
    }
}
