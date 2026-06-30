<?php

namespace Domainrobot\Lib;

class DomainrobotPromise
{
    private $promise;

    /**
     * @param mixed $promise
     */
    public function __construct($promise)
    {
        $this->promise = $promise;
    }

    /**
     * Undocumented function
     *
     * @return DomainrobotResult
     */
    public function wait(): DomainrobotResult
    {
        return $this->promise->wait();
    }
}
