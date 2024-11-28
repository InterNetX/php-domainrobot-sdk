<?php

namespace Domainrobot\Service;

use Domainrobot\Domainrobot;
use Domainrobot\Lib\ArrayHelper;
use Domainrobot\Lib\DomainrobotConfig;
use Domainrobot\Lib\DomainrobotPromise;
use Domainrobot\Model\Query;
use Domainrobot\Model\DomainRestore;
use Domainrobot\Service\DomainrobotService;

class RestoreService extends DomainrobotService
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
     * Sends a Restore list request.
     *
     * The following keys can be used for filtering, ordering or fetching additional
     * data via query parameter:
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
     * @return TransferOut[]
     */
    public function list(?Query $body = null)
    {
        $domainrobotPromise = $this->listAsync($body);
        $domainrobotResult = $domainrobotPromise->wait();

        Domainrobot::setLastDomainrobotResult($domainrobotResult);

        $data = $domainrobotResult->getResult()['data'];
        $restores = array();
        
        foreach ($data as $d) {
            $t = new DomainRestore($d);
            array_push($restores, $t);
        }
        return $restores;
    }

    /**
     * Sends a Restore list request.
     *
     * The following keys can be used for filtering, ordering or fetching additional
     * data via query parameter:
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
    public function listAsync(?Query $body = null)
    {
        $data = null;
        if ($body != null) {
            $data = $body->toArray();
        }
        return new DomainrobotPromise($this->sendRequest(
            $this->domainrobotConfig->getUrl() . "/restore/_search",
            'POST',
            ["json" => $data]
        ));
    }
}

