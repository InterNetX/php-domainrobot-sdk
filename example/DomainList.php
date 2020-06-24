<?php

namespace Example;

use Domainrobot\Domainrobot;
use Domainrobot\Lib\DomainrobotAuth;
use Domainrobot\Lib\DomainrobotException;
use Domainrobot\Lib\DomainrobotHeaders;
use Domainrobot\Model\Query;
use Domainrobot\Model\QueryFilter;
use Domainrobot\Model\QueryView;
use Domainrobot\Model\User;

class SDKController
{
    /**
     * Inquire a list of domains of a subuser
     * returns an array of Domainrobot\Model\Domain
     *
     * @return [ Domain ]
     */
    public function domainListOfSubuser()
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
                    'key' => 'name',
                    'value' => 'flutter%',
                    'operator' => 'LIKE'
                ])],
                'view' => new QueryView([
                    'children' => 1,
                    'limit' => 10
                ])
            ]);
            $domainList = $domainrobot->domain->addHeaders([
                DomainrobotHeaders::DOMAINROBOT_HEADER_OWNER => "fluttershy",
                DomainrobotHeaders::DOMAINROBOT_HEADER_OWNER_CONTEXT => 797095
            ])->list($query);
        } catch (DomainrobotException $exception) {
            return $exception;
        }
        
        // if you want to get the raw result of the request
        Domainrobot::getLastDomainrobotResult()->getResult();
        // if you need the http status code of the last request/response
        Domainrobot::getLastDomainrobotResult()->getStatusCode();

        return $domainList;
    }
}
