<?php

namespace Example;

use Domainrobot\Domainrobot;
use Domainrobot\Lib\DomainrobotAuth;
use Domainrobot\Lib\DomainrobotException;
use Domainrobot\Model\Certificate;

class SDKController
{
    /**
     * Inquire a certificate
     *
     * @return Certificate
     */
    public function certificateInfo()
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
            $certificate = $domainrobot->certificate->info(234234234);
        } catch (DomainrobotException $exception) {
            return $exception->getError();
        }
        
        return $certificate;
    }
}
