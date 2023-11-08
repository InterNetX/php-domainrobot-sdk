<?php

namespace Domainrobot\Service;

use Domainrobot\Domainrobot;
use Domainrobot\Lib\ArrayHelper;
use Domainrobot\Lib\DomainrobotConfig;
use Domainrobot\Lib\DomainrobotPromise;
use Domainrobot\Model\AutoDeleteDomain;
use Domainrobot\Model\Domain;
use Domainrobot\Model\Job;
use Domainrobot\Model\DomainRestore;
use Domainrobot\Model\DomainCancelation;
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
     * Ordering a new domain. The operation is asynchronous and creates a job.
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
            "job" => ArrayHelper::getValueFromArray($domainrobotResult->getResult(), 'data.0', '')
        ]);
    }

    /**
     * Ordering a new domain. The operation is asynchronous and creates a job.
     *
     * @param Domain $body
     * @return DomainrobotPromise
     */
    public function createAsync(Domain $body)
    {
        return $this->sendRequest(
            $this->domainrobotConfig->getUrl() . "/domain",
            "POST",
            ["json" => $body->toArray()]
        );
    }

    /**
     * Buying a domain from the premium market. The operation is asynchronous and creates a job.
     *
     * @param Domain $body
     * @return ObjectJob
     */
    public function buy(Domain $body)
    {
        $domainrobotPromise = $this->buyAsync($body);
        $domainrobotResult = $domainrobotPromise->wait();

        Domainrobot::setLastDomainrobotResult($domainrobotResult);

        return new ObjectJob([
            "job" => ArrayHelper::getValueFromArray($domainrobotResult->getResult(), 'data.0', '')
        ]);
    }

    /**
     * Buying a domain from the premium market. The operation is asynchronous and creates a job.
     *
     * @param Domain $body
     * @return DomainrobotPromise
     */
    public function buyAsync(Domain $body)
    {
        return $this->sendRequest(
            $this->domainrobotConfig->getUrl() . "/domain/_buy",
            "POST",
            ["json" => $body->toArray()]
        );
    }

    /**
     * Importing a domain. The operation is asynchronous and creates a job.
     *
     * @param Domain $body
     * @return ObjectJob
     */
    public function import(Domain $body)
    {
        $domainrobotPromise = $this->buyAsync($body);
        $domainrobotResult = $domainrobotPromise->wait();

        Domainrobot::setLastDomainrobotResult($domainrobotResult);

        return new ObjectJob([
            "job" => ArrayHelper::getValueFromArray($domainrobotResult->getResult(), 'data.0', '')
        ]);
    }

    /**
     * Importing a domain. The operation is asynchronous and creates a job.
     *
     * @param Domain $body
     * @return DomainrobotPromise
     */
    public function importAsync(Domain $body)
    {
        return $this->sendRequest(
            $this->domainrobotConfig->getUrl() . "/domain/_import",
            "POST",
            ["json" => $body->toArray()]
        );
    }

    /**
     * Inquiring a list of domains with certain details.
     *
     * The following keys can be used for filtering, ordering and fetching additional data via query parameter:
     * sld, subtld, tld, status, authinfo, expire, comment, ownerc, updated, zonec, nserver, techc, adminc, certificate, created, autorenew
     *
     * @param Query|null $body
     * @return Domain[]
     */
    public function list(Query $body = null, $keys = [])
    {
        $domainrobotPromise = $this->listAsync($body, $keys);
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
     * Inquiring a list of domains with certain details.
     *
     * The following keys can be used for filtering, ordering and fetching additional data via query parameter:
     * sld, subtld, tld, status, authinfo, expire, comment, ownerc, updated, zonec, nserver, techc, adminc, certificate, created, autorenew
     *
     * @param Query|null $body
     * @return DomainrobotPromise
     */
    public function listAsync(Query $body = null, $keys = [])
    {
        $data = null;
        if ($body != null) {
            $data = $body->toArray();
        }

        $keyString = '';
        if (count($keys) > 0) {
            $keyString = "?keys[]=" . implode("&keys[]=", $keys);
        }

        return new DomainrobotPromise($this->sendRequest(
            $this->domainrobotConfig->getUrl() . "/domain/_search". $keyString,
            "POST",
            ["json" => $data]
        ));
    }

    /**
     * Updating the services of a domain.
     *
     * @param Domain $body
     * @return void
     */
    public function updateServices(Domain $body)
    {
        $domainrobotPromise = $this->updateServicesAsync($body);
        $domainrobotResult = $domainrobotPromise->wait();

        Domainrobot::setLastDomainrobotResult($domainrobotResult);
    }

    /**
     * Updating the services of a domain.
     *
     * @param Domain $body
     * @return DomainrobotPromise
     */
    public function updateServicesAsync(Domain $body)
    {
        if ($body->getName() === null) {
            throw new \InvalidArgumentException("Field Domain.name is missing.");
        }

        return $this->sendRequest(
            $this->domainrobotConfig->getUrl() . "/domain/_services",
            "PUT",
            ["json" => $body->toArray()]
        );
    }

    /**
     * Changing the ownerc of an existing domain.
     * Registry must support the trade task.
     *
     * @param Domain $body
     * @return ObjectJob
     */
    public function trade(Domain $body)
    {
        $domainrobotPromise = $this->tradeAsync($body);
        $domainrobotResult = $domainrobotPromise->wait();

        Domainrobot::setLastDomainrobotResult($domainrobotResult);

        return new ObjectJob([
            "job" => ArrayHelper::getValueFromArray($domainrobotResult->getResult(), 'data.0', '')
        ]);
    }

    /**
     * Changing the ownerc of an existing domain.
     * Registry must support the trade task.
     *
     * @param Domain $body
     * @return DomainrobotPromise
     */
    public function tradeAsync(Domain $body)
    {
        return $this->sendRequest(
            $this->domainrobotConfig->getUrl() . "/domain/_trade",
            "POST",
            ["json" => $body->toArray()]
        );
    }

    /**
     * Transfering a domain. The operation is asynchronous and creates a job.
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
            "job" => ArrayHelper::getValueFromArray($domainrobotResult->getResult(), 'data.0', '')
        ]);
    }

    /**
     * Transfering a domain. The operation is asynchronous and creates a job.
     *
     * @param Domain $body
     * @return DomainrobotPromise
     */
    public function transferAsync(Domain $body)
    {
        return $this->sendRequest(
            $this->domainrobotConfig->getUrl() . "/domain/_transfer",
            "POST",
            ["json" => $body->toArray()]
        );
    }
    
    /**
     * Inquiring a autodelete list.
     *
     * @param Query|null $body
     * @return AutoDeleteDomain[]
     */
    public function autodeleteList(Query $body = null)
    {
        $domainrobotPromise = $this->autodeleteListAsync($body);
        $domainrobotResult = $domainrobotPromise->wait();

        Domainrobot::setLastDomainrobotResult($domainrobotResult);

        $data = $domainrobotResult->getResult()['data'];

        $autoDeleteDomains = array();
        foreach ($data as $d) {
            $a = new AutoDeleteDomain($d);
            array_push($autoDeleteDomains, $a);
        }

        return $autoDeleteDomains;
    }

    /**
     * Inquiring a autodelete list.
     *
     * @param Query|null $body
     * @return DomainrobotPromise
     */
    public function autodeleteListAsync(Query $body = null)
    {
        $data = null;
        if ($body != null) {
            $data = $body->toArray();
        }

        return new DomainrobotPromise($this->sendRequest(
            $this->domainrobotConfig->getUrl() . "/domain/autodelete/_search",
            "POST",
            ["json" => $data]
        ));
    }

    /**
     * Inquiring a list of cancelations with certain details.
     * The following keys can be used for filtering, ordering and fetching additional data via query parameter:
     * disconnect, execdate, ctid, created, registryStatus, sld, type, tld, subtld, gainingRegistrar, updated
     *
     * @param Query|null $body
     * @return DomainCancelation[]
     */
    public function cancelationList(Query $body = null)
    {
        $domainrobotPromise = $this->cancelationListAsync($body);
        $domainrobotResult = $domainrobotPromise->wait();

        Domainrobot::setLastDomainrobotResult($domainrobotResult);

        $data = $domainrobotResult->getResult()['data'];

        $domainCancelations = array();
        foreach ($data as $d) {
            $dc = new DomainCancelation($d);
            array_push($domainCancelations, $dc);
        }

        return $domainCancelations;
    }

    /**
     * Inquiring a list of cancelations with certain details.
     * The following keys can be used for filtering, ordering and fetching additional data via query parameter:
     * disconnect, execdate, ctid, created, registryStatus, sld, type, tld, subtld, gainingRegistrar, updated
     *
     * @param Query|null $body
     * @return DomainrobotPromise
     */
    public function cancelationListAsync(Query $body = null)
    {
        $data = null;
        if ($body != null) {
            $data = $body->toArray();
        }

        return new DomainrobotPromise($this->sendRequest(
            $this->domainrobotConfig->getUrl() . "/domain/cancelation/_search",
            "POST",
            ["json" => $data]
        ));
    }

    /**
     * Inquiring a list of restorable domains with certain details.
     * The following keys can be used for filtering, ordering and fetching additional data via query parameter:
     * parking, certificate, adminc, cancelation, action, zonec, nserver, techc, nsentry, dnssec, period, created, sld,
     * tld, subtld, deleted, autorenew, expire, domainsafe, comment, ownerc, updated, remarks, authinfo, status
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
     * Inquiring a list of restorable domains with certain details.
     * The following keys can be used for filtering, ordering and fetching additional data via query parameter:
     * parking, certificate, adminc, cancelation, action, zonec, nserver, techc, nsentry, dnssec, period, created, sld,
     * tld, subtld, deleted, autorenew, expire, domainsafe, comment, ownerc, updated, remarks, authinfo, status
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
            "POST",
            ["json" => $data]
        ));
    }

    /**
     * Inquiring the data for the specified domain.
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
     * Inquiring the data for the specified domain.
     *
     * @param string $name
     * @return DomainrobotPromise
     */
    public function infoAsync($name)
    {
        return $this->sendRequest(
            $this->domainrobotConfig->getUrl() . "/domain/" . $name,
            "GET"
        );
    }

    /**
     * Updating an existing domain. The operation is asynchronous and creates a job.
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
            "job" => ArrayHelper::getValueFromArray($domainrobotResult->getResult(), 'data.0', '')
        ]);
    }

    /**
     * Updating an existing domain. The operation is asynchronous and creates a job.
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
            $this->domainrobotConfig->getUrl() . "/domain/" . $body->getName(),
            "PUT",
            ["json" => $body->toArray()]
        );
    }

    /**
     * Creating an AuthInfo1 for the specified domain.
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
     * Creating an AuthInfo1 for the specified domain.
     *
     * @param string $name
     * @return DomainrobotPromise
     */
    public function createAuthinfo1Async($name)
    {
        return $this->sendRequest(
            $this->domainrobotConfig->getUrl() . "/domain/" . $name . "/_authinfo1",
            "POST"
        );
    }

    /**
     * Deleting an existing AuthInfo1 for the specified domain.
     *
     * @param string $name
     * @return void
     */
    public function deleteAuthinfo1($name)
    {
        $domainrobotPromise = $this->deleteAuthinfo1Async($name);
        $domainrobotResult = $domainrobotPromise->wait();

        Domainrobot::setLastDomainrobotResult($domainrobotResult);
    }

    /**
     * Deleting an existing AuthInfo1 for the specified domain.
     *
     * @param string $name
     * @return DomainrobotPromise
     */
    public function deleteAuthinfo1Async($name)
    {
        return $this->sendRequest(
            $this->domainrobotConfig->getUrl() . "/domain/" . $name . "/_authinfo1",
            "DELETE"
        );
    }

    /**
     * Creating an AuthInfo2 for the specified domain.
     *
     * @param string $name
     * @return Domain
     */
    public function createAuthinfo2($name)
    {
        $domainrobotPromise = $this->createAuthinfo2Async($name);
        $domainrobotResult = $domainrobotPromise->wait();

        Domainrobot::setLastDomainrobotResult($domainrobotResult);

        return new Domain(ArrayHelper::getValueFromArray($domainrobotResult->getResult(), 'data.0', []));
    }

    /**
     * Creating an AuthInfo2 for the specified domain.
     *
     * @param string $name
     * @return DomainrobotPromise
     */
    public function createAuthinfo2Async($name)
    {
        return $this->sendRequest(
            $this->domainrobotConfig->getUrl() . "/domain/" . $name . "/_authinfo2",
            "POST"
        );
    }

    /**
     * Invoking an AutoDNSSec key rollover. Note the AutoDNSSec feature must be enabled for the domain.
     *
     * @param string $name
     * @return void
     */
    public function autodnsSecKeyRollover($name)
    {
        $domainrobotPromise = $this->autodnsSecKeyRolloverAsync($name);
        $domainrobotResult = $domainrobotPromise->wait();

        Domainrobot::setLastDomainrobotResult($domainrobotResult);
    }

    /**
     * Invoking an AutoDNSSec key rollover. Note the AutoDNSSec feature must be enabled for the domain.
     *
     * @param string $name
     * @return DomainrobotPromise
     */
    public function autodnsSecKeyRolloverAsync($name)
    {
        return $this->sendRequest(
            $this->domainrobotConfig->getUrl() . "/domain/" . $name . "/_autoDnssecKeyRollover",
            "PUT"
        );
    }

    /**
     * Updating a comment for an existing domain.
     *
     * @param Domain $body
     * @return void
     */
    public function updateComment(Domain $body)
    {
        $domainrobotPromise = $this->updateCommentAsync($body);
        $domainrobotResult = $domainrobotPromise->wait();

        Domainrobot::setLastDomainrobotResult($domainrobotResult);
    }

    /**
     * Updating a comment for an existing domain.
     *
     * @param Domain $body
     * @return DomainrobotPromise
     */
    public function updateCommentAsync(Domain $body)
    {
        if ($body->getName() === null) {
            throw new \InvalidArgumentException("Field Domain.name is missing.");
        }

        return $this->sendRequest(
            $this->domainrobotConfig->getUrl() . "/domain/" . $body->getName() . "/_comment",
            "PUT",
            ["json" => $body->toArray()]
        );
    }

    /**
     * Adding the domain to the domain safe.
     *
     * @param string $name
     * @return void
     */
    public function createDomainSafe($name)
    {
        $domainrobotPromise = $this->createDomainSafeAsync($name);
        $domainrobotResult = $domainrobotPromise->wait();

        Domainrobot::setLastDomainrobotResult($domainrobotResult);
    }

    /**
     * Adding the domain to the domain safe.
     *
     * @param string $name
     * @return DomainrobotPromise
     */
    public function createDomainSafeAsync($name)
    {
        return $this->sendRequest(
            $this->domainrobotConfig->getUrl() . "/domain/" . $name . "/_domainSafe",
            "PUT"
        );
    }

    /**
     * Deleting the domain from the domain safe.
     *
     * @param string $name
     * @return void
     */
    public function deleteDomainSafe($name)
    {
        $domainrobotPromise = $this->deleteDomainSafeAsync($name);
        $domainrobotResult = $domainrobotPromise->wait();

        Domainrobot::setLastDomainrobotResult($domainrobotResult);
    }

    /**
     * Deleting the domain from the domain safe.
     *
     * @param string $name
     * @return DomainrobotPromise
     */
    public function deleteDomainSafeAsync($name)
    {
        return $this->sendRequest(
            $this->domainrobotConfig->getUrl() . "/domain/" . $name . "/_domainSafe",
            "DELETE"
        );
    }

    /**
     * Changing the ownerc of an existing domain.
     *
     * @param Domain $body
     * @return ObjectJob
     */
    public function ownerChange(Domain $body)
    {
        $domainrobotPromise = $this->ownerChangeAsync($body);
        $domainrobotResult = $domainrobotPromise->wait();

        Domainrobot::setLastDomainrobotResult($domainrobotResult);

        return new ObjectJob([
            "job" => ArrayHelper::getValueFromArray($domainrobotResult->getResult(), 'data.0', '')
        ]);
    }

    /**
     * Changing the ownerc of an existing domain.
     *
     * @param Domain $body
     * @return DomainrobotPromise
     */
    public function ownerChangeAsync(Domain $body)
    {
        if ($body->getName() === null) {
            throw new \InvalidArgumentException("Field Domain.name is missing.");
        }

        return $this->sendRequest(
            $this->domainrobotConfig->getUrl() . "/domain/" . $body->getName() . "/_ownerChange",
            "PUT",
            ["json" => $body->toArray()]
        );
    }

    /**
     * Renewing an existing domain. The operation is asynchronous and creates a job.
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
            "job" => ArrayHelper::getValueFromArray($domainrobotResult->getResult(), 'data.0', '')
        ]);
    }

    /**
     * Renewing an existing domain. The operation is asynchronous and creates a job.
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
            $this->domainrobotConfig->getUrl() . "/domain/" . $body->getName() . "/_renew",
            "PUT",
            ["json" => $body->toArray()]
        );
    }

    /**
     * Restoring an existing domain.
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
            "job" => ArrayHelper::getValueFromArray($domainrobotResult->getResult(), 'data.0', '')
        ]);
    }

    /**
     * Restoring an existing domain.
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
            $this->domainrobotConfig->getUrl() . "/domain/" . $body->getName() . "/_restore",
            "PUT",
            ["json" => $body->toArray()]
        );
    }

    /**
     * Sending the AuthInfo for the specified domain to the domain owner.
     *
     * @param string $name
     * @return void
     */
    public function sendAuthinfoToOwnerc($name)
    {
        $domainrobotPromise = $this->sendAuthinfoToOwnercAsync($name);
        $domainrobotResult = $domainrobotPromise->wait();

        Domainrobot::setLastDomainrobotResult($domainrobotResult);
    }

    /**
     * Sending the AuthInfo for the specified domain to the domain owner.
     *
     * @param string $name
     * @return DomainrobotPromise
     */
    public function sendAuthinfoToOwnercAsync($name)
    {
        return $this->sendRequest(
            $this->domainrobotConfig->getUrl() . "/domain/" . $name . "/_sendAuthinfoToOwnerc",
            "PUT"
        );
    }

    /**
     * Update the registry status for an existing domain.
     *
     * @param Domain $body
     * @return Job
     */
    public function updateStatus(Domain $body)
    {
        $domainrobotPromise = $this->updateStatusAsync($body);
        $domainrobotResult = $domainrobotPromise->wait();

        return new Job(ArrayHelper::getValueFromArray($domainrobotResult->getResult(), 'data.0', []));
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
            $this->domainrobotConfig->getUrl() . "/domain/" . $body->getName() . "/_statusUpdate",
            "PUT",
            ["json" => $body->toArray()]
        );
    }
    
    /**
     * Inquiring the cancelation data for the specified domain.
     *
     * @param string $name
     * @return DomainCancelation
     */
    public function cancelationInfo($name)
    {
        $domainrobotPromise = $this->cancelationInfoAsync($name);
        $domainrobotResult = $domainrobotPromise->wait();

        Domainrobot::setLastDomainrobotResult($domainrobotResult);

        return new DomainCancelation(ArrayHelper::getValueFromArray($domainrobotResult->getResult(), 'data.0', []));
    }

    /**
     * Inquiring the cancelation data for the specified domain.
     *
     * @param string $name
     * @return DomainrobotPromise
     */
    public function cancelationInfoAsync($name)
    {
        return $this->sendRequest(
            $this->domainrobotConfig->getUrl() . "/domain/" . $name . "/cancelation",
            "GET"
        );
    }

    /**
     * Inquiring the cancelation data for the specified domain.
     *
     * @param Domain $body
     * @return DomainCancelation
     */
    public function cancelationCreate(Domain $body)
    {
        $domainrobotPromise = $this->cancelationCreateAsync($body);
        $domainrobotResult = $domainrobotPromise->wait();

        Domainrobot::setLastDomainrobotResult($domainrobotResult);

        return new DomainCancelation(ArrayHelper::getValueFromArray($domainrobotResult->getResult(), 'data.0', []));
    }

    /**
     * Inquiring the cancelation data for the specified domain.
     *
     * @param Domain $body
     * @return DomainrobotPromise
     */
    public function cancelationCreateAsync(Domain $body)
    {
        if ($body->getName() === null) {
            throw new \InvalidArgumentException("Field Domain.name is missing.");
        }

        return $this->sendRequest(
            $this->domainrobotConfig->getUrl() . "/domain" . $body->getName() . "/cancelation",
            "POST",
            ["json" => $body->toArray()]
        );
    }

    /**
     * Updating an existing cancelation for the specified domain.
     *
     * @param Domain $body
     * @return DomainCancelation
     */
    public function cancelationUpdate(Domain $body)
    {
        $domainrobotPromise = $this->cancelationUpdateAsync($body);
        $domainrobotResult = $domainrobotPromise->wait();

        Domainrobot::setLastDomainrobotResult($domainrobotResult);

        return new DomainCancelation(ArrayHelper::getValueFromArray($domainrobotResult->getResult(), 'data.0', []));
    }

    /**
     * Updating an existing cancelation for the specified domain.
     *
     * @param Domain $body
     * @return DomainrobotPromise
     */
    public function cancelationUpdateAsync(Domain $body)
    {
        if ($body->getName() === null) {
            throw new \InvalidArgumentException("Field Domain.name is missing.");
        }

        return $this->sendRequest(
            $this->domainrobotConfig->getUrl() . "/domain" . $body->getName() . "/cancelation",
            "PUT",
            ["json" => $body->toArray()]
        );
    }

    /**
     * Deleting an existing cancelation for the specified domain.
     *
     * @param string $name
     * @return void
     */
    public function cancelationDelete($name)
    {
        $domainrobotPromise = $this->cancelationDeleteAsync($name);
        $domainrobotResult = $domainrobotPromise->wait();

        Domainrobot::setLastDomainrobotResult($domainrobotResult);
    }

    /**
     * Deleting an existing cancelation for the specified domain.
     *
     * @param string $name
     * @return DomainrobotPromise
     */
    public function cancelationDeleteAsync($name)
    {
        return $this->sendRequest(
            $this->domainrobotConfig->getUrl() . "/domain/" . $name . "/cancelation",
            "DELETE"
        );
    }

    /**
     * Perform an Whois Request of an Domain
     *
     * @param string $name
     * @return Domain
     */
    public function whois($name)
    {
        $domainrobotPromise = $this->whoisAsync($name);
        $domainrobotResult = $domainrobotPromise->wait();

        Domainrobot::setLastDomainrobotResult($domainrobotResult);

        return new Domain(ArrayHelper::getValueFromArray($domainrobotResult->getResult(), 'data.0', []));
    }

    /**
     * Perform an Whois Request of an Domain
     *
     * @param string $name
     * @return DomainrobotPromise
     */
    public function whoisAsync($name)
    {
        return $this->sendRequest(
            $this->domainrobotConfig->getUrl() . "/domain/" . $name . "/_whois",
            "GET"
        );
    }
}
