<?php

namespace IXDomainRobot\Service;

use IXDomainRobot\DomainRobot;
use IXDomainRobot\Lib\ArrayHelper;
use IXDomainRobot\Lib\DomainRobotConfig;
use IXDomainRobot\Lib\DomainRobotPromise;
use IXDomainRobot\Model\Domain;
use IXDomainRobot\Model\DomainRestore;
use IXDomainRobot\Model\ObjectJob;
use IXDomainRobot\Model\Query;
use IXDomainRobot\Service\DomainRobotService;

class DomainService extends DomainRobotService
{
    private $domainModel;

    /**
     *
     * @param Domain $domainModel
     * @param DomainRobotConfig $domainRobotConfig
     */
    public function __construct(Domain $domainModel, DomainRobotConfig $domainRobotConfig)
    {
        parent::__construct($domainRobotConfig);
        $this->domainModel = $domainModel;
    }

    /**
     * Sends a Domain create request.
     *
     * @return ObjectJob
     */
    public function create()
    {
        $domainRobotPromise = $this->createAsync();
        $domainRobotResult = $domainRobotPromise->wait();

        DomainRobot::setLastDomainRobotResult($domainRobotResult);

        return new ObjectJob([
            "job" => ArrayHelper::getValueFromArray($domainRobotResult->getResult(), 'data.0.id', ''),
            "object" => $this->domainModel->getName()
        ]);
    }

    /**
     * Sends a Domain create request.
     *
     * @return DomainRobotPromise
     */
    public function createAsync()
    {
        return $this->sendRequest(
            $this->domainRobotConfig->getUrl() . "/domain",
            'POST',
            ["json" => $this->domainModel->toArray(true)]
        );
    }

    /**
     * Sends a authinfo1 create request.
     * 
     * @param [string] $name
     * @return Domain
     */
    public function createAuthinfo1($name)
    {
        $domainRobotPromise = $this->createAuthinfo1Async($name);
        $domainRobotResult = $domainRobotPromise->wait();

        DomainRobot::setLastDomainRobotResult($domainRobotResult);

        return new Domain(ArrayHelper::getValueFromArray($domainRobotResult->getResult(), 'data.0', []));
    }

    /**
     * Sends a authinfo1 create request.
     * 
     * @param [string] $name
     * @return DomainRobotPromise
     */
    public function createAuthinfo1Async($name)
    {
        return $this->sendRequest(
            $this->domainRobotConfig->getUrl() . "/domain/$name/_authinfo1",
            'POST',
            ["json" => $this->domainModel->toArray(true)]
        );
    }

    /**
     * Sends a authinfo2 create request.
     * 
     * @param [string] $name
     * @return Domain
     */
    public function createAuthinfo2($name)
    {
        $domainRobotPromise = $this->createAuthinfo2Async($name);
        $domainRobotPromise->wait();
    }

    /**
     * Sends a authinfo2 create request.
     * 
     * @param [string] $name
     * @return 
     */
    public function createAuthinfo2Async($name)
    {
        $this->sendRequest(
            $this->domainRobotConfig->getUrl() . "/domain/$name/_authinfo2",
            'POST',
            ["json" => $this->domainModel->toArray(true)]
        );
    }

    /**
     * Sends a Domain renew request.
     *
     * @param [string] $name
     * @return ObjectJob
     */
    public function renew($name)
    {
        $domainRobotPromise = $this->renewAsync($name);
        $domainRobotResult = $domainRobotPromise->wait();

        DomainRobot::setLastDomainRobotResult($domainRobotResult);

        return new ObjectJob([
            "job" => ArrayHelper::getValueFromArray($domainRobotResult->getResult(), 'data.0.id', ''),
            "object" => $this->domainModel->getName()
        ]);
    }

    /**
     * Sends a Domain renew request.
     *
     * @param [string] $name
     * @return GuzzleHttp\Promise\PromiseInterface $promise
     */
    public function renewAsync($name)
    {
        return $this->sendRequest(
            $this->domainRobotConfig->getUrl() . "/domain/$name/_renew",
            'PUT',
            ["json" => $this->domainModel->toArray(true)]
        );
    }

    /**
     * Sends a Domain transfer request.
     *
     * @return ObjectJob
     */
    public function transfer()
    {
        $domainRobotPromise = $this->transferAsync();
        $domainRobotResult = $domainRobotPromise->wait();

        DomainRobot::setLastDomainRobotResult($domainRobotResult);

        return new ObjectJob([
            "job" => ArrayHelper::getValueFromArray($domainRobotResult->getResult(), 'data.0.id', ''),
            "object" => $this->domainModel->getName()
        ]);
    }

    /**
     * Sends a Domain transfer request.
     *
     * @return DomainRobotPromise
     */
    public function transferAsync()
    {
        return $this->sendRequest(
            $this->domainRobotConfig->getUrl() . "/domain/_transfer",
            'POST',
            ["json" => $this->domainModel->toArray(true)]
        );
    }


    /**
     * Update the registry status for an existing domain.
     *
     * @param [string] $name
     * @return
     */
    public function updateStatus($name)
    {
        $domainRobotPromise = $this->updateStatusAsync($name);
        $domainRobotPromise->wait();
    }

    /**
     * Update the registry status for an existing domain.
     *
     * @param [string] $name
     * @return 
     */
    public function updateStatusAsync($name)
    {
        $this->sendRequest(
            $this->domainRobotConfig->getUrl() . "/domain/$name/_statusUpdate",
            'PUT',
            ["json" => $this->domainModel->toArray(true)]
        );
    }

    /**
     * Sends a Domain list request.
     * 
     * 
     * The following keys can be used for filtering, ordering or fetching additional
     * data via query parameter:
     * 
     * * sld
     * * subtld
     * * tld
     * * status
     * * authinfo
     * * expire
     * * comment
     * * ownerc
     * * updated
     * * zonec
     * * nserver
     * * techc
     * * adminc
     * * certificate
     * * created
     * * autorenew
     *
     * @return Domain[]
     */
    public function list(Query $query = null)
    {
        $domainRobotPromise = $this->listAsync($query);
        $domainRobotResult = $domainRobotPromise->wait();

        DomainRobot::setLastDomainRobotResult($domainRobotResult);
        $data = $domainRobotResult->getResult()['data'];
        $domains = array();
        foreach ($data as $d) {
            $do = new Domain($d);
            array_push($domains, $do);
        }
        return $domains;
    }

    /**
     * Sends a Domain list request.
     * 
     * 
     * The following keys can be used for filtering, ordering or fetching additional
     * data via query parameter:
     * 
     * * sld
     * * subtld
     * * tld
     * * status
     * * authinfo
     * * expire
     * * comment
     * * ownerc
     * * updated
     * * zonec
     * * nserver
     * * techc
     * * adminc
     * * certificate
     * * created
     * * autorenew
     *
     * @return DomainRobotPromise
     */
    public function listAsync(Query $query = null)
    {
        if ($query === null) {
            return new DomainRobotPromise($this->sendRequest(
                $this->domainRobotConfig->getUrl() . "/domain/_search",
                'POST',
                ["json" => null]
            ));
        } else {
            return new DomainRobotPromise($this->sendRequest(
                $this->domainRobotConfig->getUrl() . "/domain/_search",
                'POST',
                ["json" => $query->toArray(true)]
            ));
        }
    }

    /**
     * Sends a Domain restore list request.
     * 
     * 
     * The following keys can be used for filtering, ordering or fetching additional
     * data via query parameter:<br>
     * 
     * * parking
     * * certificate
     * * adminc
     * * cancelation
     * * action
     * * zonec
     * * nserver
     * * techc
     * * nsentry
     * * dnssec
     * * period
     * * created
     * * sld
     * * tld
     * * subtld
     * * deleted
     * * autorenew
     * * expire
     * * domainsafe
     * * comment
     * * ownerc
     * * updated
     * * remarks
     * * authinfo
     * * status
     *
     * @return DomainRestore[]
     */
    public function restoreList(Query $query = null)
    {
        $domainRobotPromise = $this->restoreListAsync($query);
        $domainRobotResult = $domainRobotPromise->wait();

        DomainRobot::setLastDomainRobotResult($domainRobotResult);

        $data = $domainRobotResult->getResult()['data'];
        $domainRestores = array();
        foreach ($data as $d) {
            $dr = new DomainRestore($d);
            array_push($domains, $dr);
        }
        return $domainRestores;
    }

    /**
     * Sends a Domain restore list request.
     * 
     * 
     * The following keys can be used for filtering, ordering or fetching additional
     * data via query parameter:<br>
     * 
     * * parking
     * * certificate
     * * adminc
     * * cancelation
     * * action
     * * zonec
     * * nserver
     * * techc
     * * nsentry
     * * dnssec
     * * period
     * * created
     * * sld
     * * tld
     * * subtld
     * * deleted
     * * autorenew
     * * expire
     * * domainsafe
     * * comment
     * * ownerc
     * * updated
     * * remarks
     * * authinfo
     * * status
     *
     * @return DomainRobotPromise
     */
    public function restoreListAsync(Query $query = null)
    {
        if ($query === null) {
            return new DomainRobotPromise($this->sendRequest(
                $this->domainRobotConfig->getUrl() . "/domain/_search",
                'POST',
                ["json" => null]
            ));
        } else {
            return new DomainRobotPromise($this->sendRequest(
                $this->domainRobotConfig->getUrl() . "/domain/_search",
                'POST',
                ["json" => $query->toArray(true)]
            ));
        }
    }

    /**
     * Sends a Domain info request.
     *
     * @param [string] $name
     * @return Domain
     */
    public function info($name)
    {
        $domainRobotPromise = $this->infoAsync($name);
        $domainRobotResult = $domainRobotPromise->wait();

        return new Domain(ArrayHelper::getValueFromArray($domainRobotResult->getResult(), 'data.0', []));
    }

    /**
     * Sends a Domain info request.
     *
     * @param [string] $name
     * @return DomainRobotPromise
     */
    public function infoAsync($name)
    {
        return $this->sendRequest(
            $this->domainRobotConfig->getUrl() . "/domain/$name",
            'GET'
        );
    }

    /**
     * Sends a authinfo1 delete request.
     *
     * @param [string] $name
     * @return 
     */
    public function deleteAuthinfo1($name)
    {
        $domainRobotPromise = $this->deleteAuthinfo1Async($name);
        $domainRobotPromise->wait();
    }

    /**
     * Sends a authinfo1 delete request.
     *
     * @param [string] $name
     * @param [string] $systemNameServer
     * @return 
     */
    public function deleteAuthinfo1Async($name)
    {
        $this->sendRequest(
            $this->domainRobotConfig->getUrl() . "/domain/$name/_authinfo1",
            'DELETE',
        );
    }

    /**
     * Sends a Domain update request.
     *
     * @param [string] $name
     * @return ObjektJob
     */
    public function update($name)
    {
        $domainRobotPromise = $this->updateAsync($name);
        $domainRobotResult = $domainRobotPromise->wait();

        DomainRobot::setLastDomainRobotResult($domainRobotResult);

        return new ObjectJob([
            "job" => ArrayHelper::getValueFromArray($domainRobotResult->getResult(), 'data.0.id', ''),
            "object" => $this->domainModel->getName()
        ]);
    }

    /**
     * Sends a Domain update request.
     *
     * @param [string] $name
     * @return DomainRobotPromise
     */
    public function updateAsync($name)
    {
        return $this->sendRequest(
            $this->domainRobotConfig->getUrl() . "/domain/$name",
            'PUT',
            ["json" => $this->domainModel->toArray(true)]
        );
    }

    /**
     * Sends a Domain restore request.
     *
     * @param [string] $name
     * @return ObjectJob
     */
    public function restore(DomainRestore $domainRestore, $name)
    {
        $domainRobotPromise = $this->restoreAsync($domainRestore, $name);
        $domainRobotResult = $domainRobotPromise->wait();

        DomainRobot::setLastDomainRobotResult($domainRobotResult);

        return new ObjectJob([
            "job" => ArrayHelper::getValueFromArray($domainRobotResult->getResult(), 'data.0.id', ''),
            "object" => $domainRestore->getName()
        ]);
    }

    /**
     * Sends a Domain restore request.
     *
     * @param [string] $name
     * @return GuzzleHttp\Promise\PromiseInterface $promise
     */
    public function restoreAsync(DomainRestore $domainRestore, $name)
    {
        return $this->sendRequest(
            $this->domainRobotConfig->getUrl() . "/domain/$name/_restore",
            'PUT',
            ["json" => $domainRestore->toArray(true)]
        );
    }
}
