<?php

namespace Example;

use Domainrobot\Domainrobot;
use Domainrobot\Lib\DomainrobotAuth;
use Domainrobot\Lib\DomainrobotException;

class SDKController
{
    /**
     * Search the Whois Information
     * of some domains
     *
     * @return string
     */
    public function whoisMulti()
    {
        $domainrobot = new Domainrobot([
            'url' => 'https://api.autodns.com/v1',
            'auth' => new DomainrobotAuth([
                'user' => 'username',
                'password' => 'password',
                'context' => 4
            ])
        ]);

        // Set an array of Domains to search 
        // after the Whois Information
        $domains = [ 'example.com', 'example.xyz' ];

        try {
            $whoisStatus = $domainrobot->whois->multi($domains);
        } catch (DomainrobotException $exception) {
            return $exception->getError();
        }
        
        return $whoisStatus;
    }
}
