<?php

namespace Example;

use Domainrobot\Domainrobot;
use Domainrobot\Lib\DomainrobotAuth;
use Domainrobot\Lib\DomainrobotException;
use Domainrobot\Model\AuthMethodConstants;
use Domainrobot\Model\CertAuthentication;
use Domainrobot\Model\CertificateData;

class SDKController
{
    /**
     * Create a certificate
     *
     * @return CertificateData
     */
    public function certificatePrepareOrder()
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
            $certificateData = new CertificateData();
            $certificateData->setName('www.example.com');

            $certificateData->setProduct('SSL123');
            $certificateData->setPlain(
                '
            -----BEGIN CERTIFICATE REQUEST-----
            MIIC4zCCAcsCAQAwgZ0xCzAJBgNVO..............+fM+gd6K8HvPkCk6C9dQ=
            -----END CERTIFICATE REQUEST-----'
            );
            

            $certificateData = $domainrobot->certificate->prepareOrder($certificateData);
        } catch (DomainrobotException $exception) {
            return $exception->getError();
        }
        
        return $certificateData;
    }
}
