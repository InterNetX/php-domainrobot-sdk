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
use Domainrobot\Service\DomainrobotService;

class DomainService extends DomainrobotService
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
     * Sends a Domain create request.
     *
     * @param Domain $body
     * @return ObjectJob
     */
    public function create(Domain $body)
    {
        $domainrobotPromise = $this->createAsync($body);
        $domainrobotResult = $domainrobotPromise->wait();

        Domainrobot::setLastDomainrobotResult($domainrobotResult);

        return new ObjectJob([
            "job" => ArrayHelper::getValueFromArray($domainrobotResult->getResult(), 'data.0.id', '')
        ]);
    }

    /**
     * Sends a Domain create request.
     *
     * @param Domain $body
     * @return DomainrobotPromise
     */
    public function createAsync(Domain $body)
    {
        return $this->sendRequest(
            $this->domainrobotConfig->getUrl() . "/domain",
            'POST',
            ["json" => $body->toArray()]
        );
    }

    /**
     * Sends a authinfo1 create request.
     *
     * @param string $name
     * @return Domain
     */
    public function createAuthinfo1($name)
    {
        $domainrobotPromise = $this->createAuthinfo1Async($name);
        $domainrobotResult = $domainrobotPromise->wait();

        Domainrobot::setLastDomainrobotResult($domainrobotResult);

        return new Domain(ArrayHelper::getValueFromArray($domainrobotResult->getResult(), 'data.0', []));
    }

    /**
     * Sends a authinfo1 create request.
     *
     * @param string $name
     * @return DomainrobotPromise
     */
    public function createAuthinfo1Async($name)
    {
        return $this->sendRequest(
            $this->domainrobotConfig->getUrl() . "/domain/$name/_authinfo1",
            'POST'
        );
    }

    /**
     * Sends a authinfo2 create request.
     *
     * @param string $name
     * @return void
     */
    public function createAuthinfo2($name)
    {
        $domainrobotPromise = $this->createAuthinfo2Async($name);
        $domainrobotPromise->wait();
    }

    /**
     * Sends a authinfo2 create request.
     *
     * @param string $name
     * @return DomainrobotPromise
     */
    public function createAuthinfo2Async($name)
    {
        return $this->sendRequest(
            $this->domainrobotConfig->getUrl() . "/domain/$name/_authinfo2",
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
        $domainrobotPromise = $this->renewAsync($body);
        $domainrobotResult = $domainrobotPromise->wait();

        Domainrobot::setLastDomainrobotResult($domainrobotResult);

        return new ObjectJob([
            "job" => ArrayHelper::getValueFromArray($domainrobotResult->getResult(), 'data.0.id', '')
        ]);
    }

    /**
     * Sends a Domain renew request.
     *
     * @param Domain $body
     * @return DomainrobotPromise
     */
    public function renewAsync(Domain $body)
    {
        if ($body->getName() === null) {
            throw new \InvalidArgumentException("Field Domain.name is missing.");
        }
        return $this->sendRequest(
            $this->domainrobotConfig->getUrl() . "/domain/".$body->getName()."/_renew",
            'PUT',
            ["json" => $body->toArray()]
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
        $domainrobotPromise = $this->transferAsync($body);
        $domainrobotResult = $domainrobotPromise->wait();

        Domainrobot::setLastDomainrobotResult($domainrobotResult);

        return new ObjectJob([
            "job" => ArrayHelper::getValueFromArray($domainrobotResult->getResult(), 'data.0.id', '')
        ]);
    }

    /**
     * Sends a Domain transfer request.
     *
     * @param Domain $body
     * @return DomainrobotPromise
     */
    public function transferAsync(Domain $body)
    {
        return $this->sendRequest(
            $this->domainrobotConfig->getUrl() . "/domain/_transfer",
            'POST',
            ["json" => $body->toArray()]
        );
    }


    /**
     * Update the registry status for an existing domain.
     *
     * @param Domain $body
     * @return void
     */
    public function updateStatus(Domain $body)
    {
        $domainrobotPromise = $this->updateStatusAsync($body);
        $domainrobotPromise->wait();
    }

    /**
     * Update the registry status for an existing domain.
     *
     * @param Domain $body
     * @return DomainrobotPromise
     */
    public function updateStatusAsync(Domain $body)
    {
        if ($body->getName() === null) {
            throw new \InvalidArgumentException("Field Domain.name is missing.");
        }

        return $this->sendRequest(
            $this->domainrobotConfig->getUrl() . "/domain/".$body->getName()."/_statusUpdate",
            'PUT',
            ["json" => $body->toArray()]
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
            $this->domainrobotConfig->getUrl() . "/domain/_search",
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
     * @param Query|null $body
     * @return DomainRestore[]
     */
    public function restoreList(Query $body = null)
    {
        $domainrobotPromise = $this->restoreListAsync($body);
        $domainrobotResult = $domainrobotPromise->wait();

        Domainrobot::setLastDomainrobotResult($domainrobotResult);

        $data = $domainrobotResult->getResult()['data'];
        $domainRestores = array();
        foreach ($data as $d) {
            $dr = new DomainRestore($d);
            array_push($domainRestores, $dr);
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
     * @param Query|null $body
     * @return DomainrobotPromise
     */
    public function restoreListAsync(Query $body = null)
    {
        $data = null;
        if ($body != null) {
            $data = $body->toArray();
        }
        return new DomainrobotPromise($this->sendRequest(
            $this->domainrobotConfig->getUrl() . "/domain/restore/_search",
            'POST',
            ["json" => $data]
        ));
    }

    /**
     * Sends a Domain info request.
     *
     * @param string $name
     * @return Domain
     */
    public function info($name)
    {
        $domainrobotPromise = $this->infoAsync($name);
        $domainrobotResult = $domainrobotPromise->wait();

        Domainrobot::setLastDomainrobotResult($domainrobotResult);

        return new Domain(ArrayHelper::getValueFromArray($domainrobotResult->getResult(), 'data.0', []));
    }

    /**
     * Sends a Domain info request.
     *
     * @param string $name
     * @return DomainrobotPromise
     */
    public function infoAsync($name)
    {
        return $this->sendRequest(
            $this->domainrobotConfig->getUrl() . "/domain/$name",
            'GET'
        );
    }

    /**
     * Sends a authinfo1 delete request.
     *
     * @param string $name
     * @return void
     */
    public function deleteAuthinfo1($name)
    {
        $domainrobotPromise = $this->deleteAuthinfo1Async($name);
        $domainrobotPromise->wait();
    }

    /**
     * Sends a authinfo1 delete request.
     *
     * @param string $name
     * @return DomainrobotPromise
     */
    public function deleteAuthinfo1Async($name)
    {
        return $this->sendRequest(
            $this->domainrobotConfig->getUrl() . "/domain/$name/_authinfo1",
            'DELETE'
        );
    }

    /**
     * Sends a Domain update request.
     *
     * @param Domain $body
     * @return ObjectJob
     */
    public function update(Domain $body)
    {
        $domainrobotPromise = $this->updateAsync($body);
        $domainrobotResult = $domainrobotPromise->wait();

        Domainrobot::setLastDomainrobotResult($domainrobotResult);

        return new ObjectJob([
            "job" => ArrayHelper::getValueFromArray($domainrobotResult->getResult(), 'data.0.id', '')
        ]);
    }

    /**
     * Sends a Domain update request.
     *
     * @param Domain $body
     * @return DomainrobotPromise
     */
    public function updateAsync(Domain $body)
    {
        if ($body->getName() === null) {
            throw new \InvalidArgumentException("Field Domain.name is missing.");
        }
        return $this->sendRequest(
            $this->domainrobotConfig->getUrl() . "/domain/".$body->getName(),
            'PUT',
            ["json" => $body->toArray()]
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
        $domainrobotPromise = $this->restoreAsync($body);
        $domainrobotResult = $domainrobotPromise->wait();

        Domainrobot::setLastDomainrobotResult($domainrobotResult);

        return new ObjectJob([
            "job" => ArrayHelper::getValueFromArray($domainrobotResult->getResult(), 'data.0.id', '')
        ]);
    }

    /**
     * Sends a Domain restore request.
     *
     * @param DomainRestore $body
     * @return DomainrobotPromise
     */
    public function restoreAsync(DomainRestore $body)
    {
        if ($body->getName() === null) {
            throw new \InvalidArgumentException("Field DomainRestore.name is missing.");
        }
        return $this->sendRequest(
            $this->domainrobotConfig->getUrl() . "/domain/".$body->getName()."/_restore",
            'PUT',
            ["json" => $body->toArray()]
        );
    }
}
