<?php

namespace Domainrobot\Lib;

class DomainrobotResult {

    private $result;
    private $statusCode;
    private $headers;

    public function __construct($result, $statusCode, $headers)
    {
        $this->setResult($result);
        $this->setStatusCode($statusCode);
        $this->setHeaders($headers);
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

    public function getHeaders()
    {
        return $this->headers;
    }

    public function setHeaders($headers)
    {
        return $this->headers = $headers;
    }

    public function isSuccess(){
        return ArrayHelper::getValueFromArray($this->result, 'status.type', 'ERROR') === 'SUCCESS';
    }
}