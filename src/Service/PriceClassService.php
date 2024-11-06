<?php

namespace Domainrobot\Service;

use Domainrobot\Lib\DomainrobotConfig;
use Domainrobot\Lib\DomainrobotPromise;
use Domainrobot\Service\DomainrobotService;

class PriceClassService extends DomainrobotService
{
    /**
     *
     * @param DomainrobotConfig $domainrobotConfig
     */
    public function __construct(DomainrobotConfig $domainrobotConfig)
    {
        parent::__construct($domainrobotConfig);
    }

    public function list(Query $body = null)
    {
        $domainrobotPromise = $this->listAsync($body);
        $domainrobotResult = $domainrobotPromise->wait();

        Domainrobot::setLastDomainrobotResult($domainrobotResult);

        $data = $domainrobotResult->getResult()['data'];

        return $data;

        // $priceClassArticles = array();
        // foreach ($data as $d) {
        //     $p = new PriceClassArticle($d);
        //     array_push($priceClassArticles, $p);
        // }

        // return $priceClassArticles;
    }

    public function listAsync(Query $body = null)
    {
        $data = null;
        if ($body != null) {
            $data = $body->toArray();
        }

        return new DomainrobotPromise($this->sendRequest(
            $this->domainrobotConfig->getUrl() . "/priceClass/article/_search",
            'POST',
            ["json" => $data]
        ));
    }
}
