<?php

namespace Example;

use Domainrobot\Domainrobot;
use Domainrobot\Lib\DomainrobotAuth;
use Domainrobot\Lib\DomainrobotException;
use Domainrobot\Model\AuthMethodConstants;
use Domainrobot\Model\CertAuthentication;
use Domainrobot\Model\Certificate;
use Domainrobot\Model\Contact;
use Domainrobot\Model\ObjectJob;
use Domainrobot\Model\SslContact;
use Domainrobot\Model\TimePeriod;
use Domainrobot\Model\TimeUnitConstants;

class SDKController
{
    /**
     * Create a certificate
     *
     * @return ObjectJob
     */
    public function certificateCreate()
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

            $certificate->setAuthentication(new CertAuthentication([
                'method' => AuthMethodConstants::FILE
            ]));


            $certificate->setCsr(
                '
            -----BEGIN CERTIFICATE REQUEST-----
            MIIC4zCCAcsCAQAwgZ0xCzAJBgNVO..............+fM+gd6K8HvPkCk6C9dQ=
            -----END CERTIFICATE REQUEST-----'
            );
            
            $objectJob = $domainrobot->certificate->create($certificate);
        } catch (DomainrobotException $exception) {
            return $exception->getError();
        }
        
        return $objectJob;
    }
}
