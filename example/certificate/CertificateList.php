<?php

namespace Example;

use Domainrobot\Domainrobot;
use Domainrobot\Lib\DomainrobotAuth;
use Domainrobot\Lib\DomainrobotException;
use Domainrobot\Model\Certificate;
use Domainrobot\Model\Query;
use Domainrobot\Model\QueryFilter;
use Domainrobot\Model\QueryView;

class SDKController
{
    /**
     * Inquire a list of certificates with filters
     * returns an array of Domainrobot\Model\Certificate
     *
     * @return Certificate[]
     */
    public function certificateList()
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
                    'value' => 'Test%',
                    'operator' => 'LIKE'
                ])],
                'view' => new QueryView([
                    'children' => 1,
                    'limit' => 10
                ])
            ]);
            $certificateList = $domainrobot->certificate->list($query);
        } catch (DomainrobotException $exception) {
            return $exception;
        }
        
        // if you want to get the raw result of the request
        Domainrobot::getLastDomainrobotResult()->getResult();
        // if you need the http status code of the last request/response
        Domainrobot::getLastDomainrobotResult()->getStatusCode();

        return $certificateList;
    }
}
