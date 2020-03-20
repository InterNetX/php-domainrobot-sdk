<?php

namespace Domainrobot\Lib;

use ReflectionClass;

class DomainRobotResult {

    private $result;
    private $statusCode;
    private $returnObject;


    public function __construct($result, $statusCode)
    {
        $this->setResult($result);
        $this->setStatusCode($statusCode);
    }

    public function getStatusCode()
    {
        return $this->statusCode;
    }

    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;
    }

    public function getResult()
    {
        return $this->result;
    }

    public function setResult($result)
    {
        return $this->result = $result;
    }
}