<?php

namespace Domainrobot\Service;

use Domainrobot\Domainrobot;
use Domainrobot\Lib\ArrayHelper;
use Domainrobot\Lib\DomainrobotConfig;
use Domainrobot\Lib\DomainrobotPromise;
use Domainrobot\Model\Query;
use Domainrobot\Model\Job;
use Domainrobot\Service\DomainrobotService;

class JobService extends DomainrobotService
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
     * Sends a job list request.
     * 
     * The following keys can be used for filtering, ordering or fetching additional
     * data via query parameter:
     *
     * * parent
     * * execution
     * * subStatus
     * * type
     * * created
     * * updated
     * * status
     * * object
     * * action
     *
     * @param Query|null $body
     * @return Job[]
     */
    public function list(?Query $body = null)
    {
        $domainrobotPromise = $this->listAsync($body);
        $domainrobotResult = $domainrobotPromise->wait();

        Domainrobot::setLastDomainrobotResult($domainrobotResult);

        $data = $domainrobotResult->getResult()['data'];
        $jobs = array();

        foreach ($data as $d) {
            $c = new Job($d);
            array_push($jobs, $c);
        }

        return $jobs;
    }

    /**
     * Sends a job list request.
     * 
     * The following keys can be used for filtering, ordering or fetching additional
     * data via query parameter:
     *
     * * parent
     * * execution
     * * subStatus
     * * type
     * * created
     * * updated
     * * status
     * * object
     * * action
     *
     * @param Query|null $body
     * @return DomainrobotPromise
     */
    public function listAsync(?Query $body = null)
    {
        $data = null;
        if ($body != null) {
            $data = $body->toArray();
        }

        return new DomainrobotPromise($this->sendRequest(
            $this->domainrobotConfig->getUrl() . "/job/_search",
            'POST',
            ["json" => $data]
        ));
    }

    /**
     * Sends a job history list request.
     * 
     * The following keys can be used for filtering, ordering or fetching additional
     * data via query parameter:
     *
     * * parent
     * * execution
     * * subStatus
     * * type
     * * created
     * * updated
     * * status
     * * object
     * * action
     *
     * @param Query|null $body
     * @return Job[]
     */
    public function historyList(?Query $body = null)
    {
        $domainrobotPromise = $this->listAsync($body);
        $domainrobotResult = $domainrobotPromise->wait();

        Domainrobot::setLastDomainrobotResult($domainrobotResult);

        $data = $domainrobotResult->getResult()['data'];
        $jobs = array();

        foreach ($data as $d) {
            $c = new Job($d);
            array_push($jobs, $c);
        }

        return $jobs;
    }

    /**
     * Sends a job history list request.
     * 
     * The following keys can be used for filtering, ordering or fetching additional
     * data via query parameter:
     *
     * * parent
     * * execution
     * * subStatus
     * * type
     * * created
     * * updated
     * * status
     * * object
     * * action
     *
     * @param Query|null $body
     * @return DomainrobotPromise
     */
    public function historyListAsync(?Query $body = null)
    {
        $data = null;
        if ($body != null) {
            $data = $body->toArray();
        }

        return new DomainrobotPromise($this->sendRequest(
            $this->domainrobotConfig->getUrl() . "/job/history/_search",
            'POST',
            ["json" => $data]
        ));
    }

    /**
     * Sends a job info request.
     *
     * @param int $id
     * @return Job
     */
    public function info($id)
    {
        $domainrobotPromise = $this->infoAsync($id);
        $domainrobotResult = $domainrobotPromise->wait();

        Domainrobot::setLastDomainrobotResult($domainrobotResult);

        return new Job(ArrayHelper::getValueFromArray($domainrobotResult->getResult(), 'data.0', []));
    }

    /**
     * Sends a job info request.
     *
     * @param int $id
     * @return DomainrobotPromise
     */
    public function infoAsync($id)
    {
        return $this->sendRequest(
            $this->domainrobotConfig->getUrl() . "/job/$id",
            'GET'
        );
    }

    /**
     * Sends a job history info request.
     *
     * @param int $id
     * @return Job
     */
    public function historyInfo($id)
    {
        $domainrobotPromise = $this->infoAsync($id);
        $domainrobotResult = $domainrobotPromise->wait();

        Domainrobot::setLastDomainrobotResult($domainrobotResult);

        return new Job(ArrayHelper::getValueFromArray($domainrobotResult->getResult(), 'data.0', []));
    }

    /**
     * Sends a job history info request.
     *
     * @param int $id
     * @return DomainrobotPromise
     */
    public function historyInfoAsync($id)
    {
        return $this->sendRequest(
            $this->domainrobotConfig->getUrl() . "/job/history/$id",
            'GET'
        );
    }


    
}

