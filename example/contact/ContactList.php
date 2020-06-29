<?php

namespace Example;

use Domainrobot\Domainrobot;
use Domainrobot\Lib\DomainrobotAuth;
use Domainrobot\Lib\DomainrobotException;
use Domainrobot\Model\Contact;
use Domainrobot\Model\Query;
use Domainrobot\Model\QueryFilter;
use Domainrobot\Model\QueryView;

class SDKController
{
    /**
     * Inquire a list of contacts with filters
     * returns an array of Domainrobot\Model\Contact
     *
     * @return Contact[]
     */
    public function contactList()
    {
      $domainrobot = new Domainrobot([
            "url" => "https://api.demo.autodns.com/v1",
            "auth" => new DomainrobotAuth([
                "user" => "username",
                "password" => "password",
                "context" => 4
            ])
        ]);

        try {
            $query = new Query([
                'filters' => [ new QueryFilter([
                    'key' => 'fname',
                    'value' => 'Test%',
                    'operator' => 'LIKE'
                ]), new QueryFilter([
                    'key' => 'lname',
                    'value' => 'Test%',
                    'operator' => 'LIKE'
                ])],
                'view' => new QueryView([
                    'children' => 1,
                    'limit' => 10
                ])
            ]);
            $contactist = $domainrobot->contact->list($query);
        } catch (DomainrobotException $exception) {
            return $exception;
        }
        
        // if you want to get the raw result of the request
        Domainrobot::getLastDomainrobotResult()->getResult();
        // if you need the http status code of the last request/response
        Domainrobot::getLastDomainrobotResult()->getStatusCode();

        return $contactist;
    }
}
