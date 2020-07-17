<?php

namespace Domainrobot\Service;

use Domainrobot\Domainrobot;
use Domainrobot\Lib\ArrayHelper;
use Domainrobot\Lib\DomainrobotConfig;
use Domainrobot\Lib\DomainrobotPromise;
use Domainrobot\Model\Certificate;
use Domainrobot\Model\CertificateData;
use Domainrobot\Model\ObjectJob;
use Domainrobot\Model\Query;
use Domainrobot\Service\DomainrobotService;

class PriceService extends DomainrobotService
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
     *
     * 
     * @return DomainrobotPromise
     */
    public function article_search($query)
    {
        return new DomainrobotPromise($this->sendRequest(
            $this->domainrobotConfig->getUrl() . "/price/article/_search",
            'POST',
            ["json" => $query]
        ));
    }
    
}
