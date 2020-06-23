<?php

namespace Example;

use Domainrobot\Domainrobot;
use Domainrobot\Lib\DomainrobotAuth;
use Domainrobot\Lib\DomainrobotException;
use Domainrobot\Model\Query;
use Domainrobot\Model\QueryFilter;
use Domainrobot\Model\QueryView;
use Domainrobot\Model\User;

class SDKController
{
    /**
     * Inquire a list of users
     * returns an array of Domainrobot\Model\User
     *
     * @return [ User ]
     */
    public function userList()
    {
        $domainrobot = new Domainrobot([
            "url" => "https://api.autodns.com/v1",
            "auth" => new DomainrobotAuth([
                "user" => "username",
                "password" => "password",
                "context" => 4
            ])
        ]);

        try {
            $query = new Query([
                'filters' => [ new QueryFilter([
                    'key' => 'user',
                    'value' => 'username',
                    'operator' => 'EQUAL'
                ])],
                'view' => new QueryView([
                    'children' => 1,
                    'limit' => 10
                ])
            ]);
            $userList = $domainrobot->user->list($query);

        } catch (DomainrobotException $exception) {
            return $exception;
        }
        
        return $userList;
    }
}
