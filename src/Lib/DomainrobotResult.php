<?php

namespace Domainrobot\Lib;

use ReflectionClass;

class DomainrobotResult {

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

    public function isSuccess(){
        return ArrayHelper::getValueFromArray($this->result, 'status.type', 'ERROR') === 'SUCCESS';
    }
}