<?php

namespace Example;

use Domainrobot\Domainrobot;
use Domainrobot\Lib\DomainrobotAuth;
use Domainrobot\Lib\DomainrobotException;
use Domainrobot\Model\Certificate;
use Domainrobot\Model\Contact;
use Domainrobot\Model\SslContact;
use Domainrobot\Model\TimePeriod;
use Domainrobot\Model\TimeUnitConstants;

class SDKController
{
    /**
     * Create a certificate in realtime
     *
     * @return Certificate
     */
    public function certificateCreateRealtime()
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
            $certificate = new Certificate();
            $certificate->setName('www.example.com');
        
            $contact = $domainrobot->sslContact->info(234234);
            $certificate->setAdminContact(new SslContact([
            'id' => 234234
        ]));
            $certificate->setTechnicalContact(new SslContact([
            'id' => 234234
        ]));
            $certificate->setProduct('SSL123');
            $certificate->setLifetime(new TimePeriod([
            'unit' => TimeUnitConstants::MONTH,
            'period' => 12
        ]));

            $certificate->setCsr(
                '
            -----BEGIN CERTIFICATE REQUEST-----
            MIIC4zCCAcsCAQAwgZ0xCzAJBgNVO..............+fM+gd6K8HvPkCk6C9dQ=
            -----END CERTIFICATE REQUEST-----'
            );
            
            $certificate = $domainrobot->certificate->realtime($certificate);
        } catch (DomainrobotException $exception) {
            return $exception->getError();
        }
        
        return $certificate;
    }
}
