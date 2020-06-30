<?php

namespace Example;

use Domainrobot\Domainrobot;
use Domainrobot\Lib\DomainrobotAuth;
use Domainrobot\Lib\DomainrobotException;

class SDKController
{
    /**
     * Delete a certificate
     *
     * @return array
     */
    public function certificateDelete()
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
            
            $objectJob = $domainrobot->certificate->delete(234234234);

        } catch (DomainrobotException $exception) {
            return $exception;
        }
        
        return Domainrobot::getLastDomainrobotResult()->getResult();
    }
}
