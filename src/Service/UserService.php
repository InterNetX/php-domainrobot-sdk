<?php

namespace Domainrobot\Service;

use Domainrobot\Domainrobot;
use Domainrobot\Lib\ArrayHelper;
use Domainrobot\Lib\DomainrobotConfig;
use Domainrobot\Lib\DomainrobotPromise;
use Domainrobot\Model\Domain;
use Domainrobot\Model\DomainRestore;
use Domainrobot\Model\ObjectJob;
use Domainrobot\Model\Query;
use Domainrobot\Model\User;
use Domainrobot\Service\DomainrobotService;

class UserService extends DomainrobotService
{

    /**
     *
     * @param DomainrobotConfig $domainrobotConfig
     */
    public function __construct(DomainrobotConfig $domainrobotConfig)
    {
        parent::__construct($domainrobotConfig);
    }

    /**
     * Sends a User info request.
     *
     * @param [string] $user
     * @param [integer] $context
     * @return User
     */
    public function info($user, $context)
    {
        $domainrobotPromise = $this->infoAsync($user, $context);
        $domainrobotResult = $domainrobotPromise->wait();

        return new User(ArrayHelper::getValueFromArray($domainrobotResult->getResult(), 'data.0', []));
    }

    /**
     * Sends a User info request.
     *
    * @param [string] $user
     * @param [integer] $context
     * @return DomainrobotPromise
     */
    public function infoAsync($user, $context)
    {
        return $this->sendRequest(
            $this->domainRobotConfig->getUrl() . "/user/$user/$context",
            'GET'
        );
    }

    /**
     * Sends a User list request.
     *
     *
     * The following keys can be used for filtering, ordering or fetching additional
     * data via query parameter:
     *
     * * user
     * * context
     *
     * @param Query|null $body
     * @return Domain[]
     */
    public function list(Query $body = null)
    {
        $domainrobotPromise = $this->listAsync($body);
        $domainrobotResult = $domainrobotPromise->wait();

        Domainrobot::setLastDomainrobotResult($domainrobotResult);
        $data = $domainrobotResult->getResult()['data'];
        $domains = array();
        foreach ($data as $d) {
            $do = new User($d);
            array_push($domains, $do);
        }
        return $domains;
    }

    /**
     * Sends a User list request.
     *
     *
     * The following keys can be used for filtering, ordering or fetching additional
     * data via query parameter:
     *
     * * user
     * * context
     *
     * @param Query|null $body
     * @return DomainrobotPromise
     */
    public function listAsync(Query $body = null)
    {
        $data = null;
        if ($body != null) {
            $data = $body->toArray();
        }
        return new DomainrobotPromise($this->sendRequest(
            $this->domainrobotConfig->getUrl() . "/user/_search",
            'POST',
            ["json" => $data]
        ));
    }
}
