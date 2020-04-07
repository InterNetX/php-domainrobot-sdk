<?php

namespace Domainrobot\Lib;

class DomainrobotPromise {

    private $promise;

    public function __construct($promise){
        $this->promise = $promise;
    }

    /**
     * Undocumented function
     *
     * @return DomainrobotResult
     */
    public function wait(){
        return $this->promise->wait();
    }
}