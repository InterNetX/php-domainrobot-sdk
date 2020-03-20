<?php

namespace Domainrobot\Service;

use Domainrobot\DomainRobot;
use Domainrobot\Lib\ArrayHelper;
use Domainrobot\Lib\DomainRobotConfig;
use Domainrobot\Lib\DomainRobotPromise;
use Domainrobot\Model\Domain;
use Domainrobot\Model\DomainRestore;
use Domainrobot\Model\ObjectJob;
use Domainrobot\Model\Query;
use Domainrobot\Service\DomainRobotService;

class DomainService extends DomainRobotService
{

    /**
     *
     * @param DomainRobotConfig $domainRobotConfig
     */
    public function __construct(DomainRobotConfig $domainRobotConfig)
    {
        parent::__construct($domainRobotConfig);
    }

    /**
     * Sends a Domain create request.
     *
     * @param Domain $body
     * @return ObjectJob
     */
    public function create(Domain $body)
    {
        $domainRobotPromise = $this->createAsync($body);
        $domainRobotResult = $domainRobotPromise->wait();

        DomainRobot::setLastDomainRobotResult($domainRobotResult);

        return new ObjectJob([
            "job" => ArrayHelper::getValueFromArray($domainRobotResult->getResult(), 'data.0.id', '')
        ]);
    }

    /**
     * Sends a Domain create request.
     *
     * @param Domain $body
     * @return DomainRobotPromise
     */
    public function createAsync(Domain $body)
    {
        return $this->sendRequest(
            $this->domainRobotConfig->getUrl() . "/domain",
            'POST',
            ["json" => $body->toArray(true)]
        );
    }

    /**
     * Sends a authinfo1 create request.
     *
     * @param [string] $name
     * @return
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
            'POST'
        );
    }

    /**
     * Sends a authinfo2 create request.
     *
     * @param [string] $name
     * @return
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
            'POST'
        );
    }

    /**
     * Sends a Domain renew request.
     *
     * @param Domain $body
     * @return ObjectJob
     */
    public function renew(Domain $body)
    {
        $domainRobotPromise = $this->renewAsync($body);
        $domainRobotResult = $domainRobotPromise->wait();

        DomainRobot::setLastDomainRobotResult($domainRobotResult);

        return new ObjectJob([
            "job" => ArrayHelper::getValueFromArray($domainRobotResult->getResult(), 'data.0.id', '')
        ]);
    }

    /**
     * Sends a Domain renew request.
     *
     * @param Domain $body
     * @return DomainRobotPromise
     */
    public function renewAsync(Domain $body)
    {
        if ($body->getName() === null) {
            throw InvalidArgumentException("Field Domain.name is missing.");
        }
        return $this->sendRequest(
            $this->domainRobotConfig->getUrl() . "/domain/".$body->getName()."/_renew",
            'PUT',
            ["json" => $body->toArray(true)]
        );
    }

    /**
     * Sends a Domain transfer request.
     *
     * @param Domain $body
     * @return ObjectJob
     */
    public function transfer(Domain $body)
    {
        $domainRobotPromise = $this->transferAsync($body);
        $domainRobotResult = $domainRobotPromise->wait();

        DomainRobot::setLastDomainRobotResult($domainRobotResult);

        return new ObjectJob([
            "job" => ArrayHelper::getValueFromArray($domainRobotResult->getResult(), 'data.0.id', '')
        ]);
    }

    /**
     * Sends a Domain transfer request.
     *
     * @param Domain $body
     * @return DomainRobotPromise
     */
    public function transferAsync(Domain $body)
    {
        return $this->sendRequest(
            $this->domainRobotConfig->getUrl() . "/domain/_transfer",
            'POST',
            ["json" => $body->toArray(true)]
        );
    }


    /**
     * Update the registry status for an existing domain.
     *
     * @param Domain $body
     * @return
     */
    public function updateStatus(Domain $body)
    {
        $domainRobotPromise = $this->updateStatusAsync($name);
        $domainRobotPromise->wait();
    }

    /**
     * Update the registry status for an existing domain.
     *
     * @param Domain $body
     * @return
     */
    public function updateStatusAsync(Domain $body)
    {
        if ($body->getName() === null) {
            throw InvalidArgumentException("Field Domain.name is missing.");
        }
        $this->sendRequest(
            $this->domainRobotConfig->getUrl() . "/domain/".$body->getName()."/_statusUpdate",
            'PUT',
            ["json" => $body->toArray(true)]
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
     * @param Query $body
     * @return Domain[]
     */
    public function list(Query $body = null)
    {
        $domainRobotPromise = $this->listAsync($body);
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
     * @param Query $body
     * @return DomainRobotPromise
     */
    public function listAsync(Query $body = null)
    {
        $data = null;
        if ($body != null) {
            $data = $body->toArray(true);
        }
        return new DomainRobotPromise($this->sendRequest(
            $this->domainRobotConfig->getUrl() . "/domain/_search",
            'POST',
            ["json" => $data]
        ));
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
     * @param Query $body
     * @return DomainRestore[]
     */
    public function restoreList(Query $body = null)
    {
        $domainRobotPromise = $this->restoreListAsync($body);
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
     * @param Query $body
     * @return DomainRobotPromise
     */
    public function restoreListAsync(Query $body = null)
    {
        $data = null;
        if ($body != null) {
            $data = $body->toArray(true);
        }
        return new DomainRobotPromise($this->sendRequest(
            $this->domainRobotConfig->getUrl() . "/domain/restore/_search",
            'POST',
            ["json" => $data]
        ));
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
     * @return
     */
    public function deleteAuthinfo1Async($name)
    {
        $this->sendRequest(
            $this->domainRobotConfig->getUrl() . "/domain/$name/_authinfo1",
            'DELETE'
        );
    }

    /**
     * Sends a Domain update request.
     *
     * @param Domain $body
     * @return ObjektJob
     */
    public function update(Domain $body)
    {
        $domainRobotPromise = $this->updateAsync($body);
        $domainRobotResult = $domainRobotPromise->wait();

        DomainRobot::setLastDomainRobotResult($domainRobotResult);

        return new ObjectJob([
            "job" => ArrayHelper::getValueFromArray($domainRobotResult->getResult(), 'data.0.id', '')
        ]);
    }

    /**
     * Sends a Domain update request.
     *
     * @param Domain $body
     * @return DomainRobotPromise
     */
    public function updateAsync(Domain $body)
    {
        if ($body->getName() === null) {
            throw InvalidArgumentException("Field Domain.name is missing.");
        }
        return $this->sendRequest(
            $this->domainRobotConfig->getUrl() . "/domain/".$body->getName(),
            'PUT',
            ["json" => $body->toArray(true)]
        );
    }

    /**
     * Sends a Domain restore request.
     *
     * @param DomainRestore $body
     * @return ObjectJob
     */
    public function restore(DomainRestore $body)
    {
        $domainRobotPromise = $this->restoreAsync($body);
        $domainRobotResult = $domainRobotPromise->wait();

        DomainRobot::setLastDomainRobotResult($domainRobotResult);

        return new ObjectJob([
            "job" => ArrayHelper::getValueFromArray($domainRobotResult->getResult(), 'data.0.id', '')
        ]);
    }

    /**
     * Sends a Domain restore request.
     *
     * @param DomainRestore $body
     * @return DomainRobotPromise
     */
    public function restoreAsync(DomainRestore $body)
    {
        if ($body->getName() === null) {
            throw InvalidArgumentException("Field DomainRestore.name is missing.");
        }
        return $this->sendRequest(
            $this->domainRobotConfig->getUrl() . "/domain/".$body->getName()."/_restore",
            'PUT',
            ["json" => $body->toArray(true)]
        );
    }
}
