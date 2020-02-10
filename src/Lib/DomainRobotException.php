<?php

namespace IXDomainRobot\Lib;

class DomainRobotException extends \Exception {

    private $error;
    private $statusCode;

     public function __construct($error, $statusCode, $message = "DomainRobot Exception", $code = 0, \Exception $previous = null) {
        $this->error = $error;
        $this->statusCode = $statusCode;
        parent::__construct($message, $code, $previous);
    }

    public function getError()
    {
        return $this->error;
    }

    public function getStatusCode()
    {
        return $this->statusCode;
    }

    public function setError($error)
    {
        $this->error = $error;
    }

    public function setStatusCode($statusCode)
    {
        return $this->statusCode = $statusCode;
    }
}