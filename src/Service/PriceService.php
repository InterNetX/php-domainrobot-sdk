<?php

namespace Domainrobot\Service;

use Domainrobot\Lib\DomainrobotConfig;
use Domainrobot\Lib\DomainrobotPromise;
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
    
    public function list(Query $body = null)
    {
        $domainrobotPromise = $this->listAsync($body);
        $domainrobotResult = $domainrobotPromise->wait();

        Domainrobot::setLastDomainrobotResult($domainrobotResult);

        $data = $domainrobotResult->getResult()['data'];

        return $data;

        // $priceArticles = array();
        // foreach ($data as $d) {
        //     $p = new PriceArticle($d);
        //     array_push($priceArticles, $p);
        // }

        // return $priceArticles;
    }

    public function listAsync(Query $body = null)
    {
        $data = null;
        if ($body != null) {
            $data = $body->toArray();
        }

        return new DomainrobotPromise($this->sendRequest(
            $this->domainrobotConfig->getUrl() . "/price/article/_search",
            'POST',
            ["json" => $data]
        ));
    }
}
