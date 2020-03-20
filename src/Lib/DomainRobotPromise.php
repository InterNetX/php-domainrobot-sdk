<?php

namespace Domainrobot\Lib;

class DomainRobotPromise {

    private $promise;

    public function __construct($promise){
        $this->promise = $promise;
    }

    /**
     * Undocumented function
     *
     * @return DomainRobotResult
     */
    public function wait(){
        return $this->promise->wait();
    }
}