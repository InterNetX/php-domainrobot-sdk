<?php

namespace Domainrobot\Lib;

class DomainrobotException extends \Exception
{
    private $error;
    private $statusCode;

    public function __construct(
        $error,
        $statusCode,
        $message = "Domainrobot Exception",
        $code = 0,
        ?\Exception $previous = null,
    ) {
        $this->error = $error;
        $this->statusCode = $statusCode;
        parent::__construct($message, $code, $previous);
    }

    public function getError(): mixed
    {
        return $this->error;
    }

    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    /**
     * @param mixed $error
     * @return void
     */
    public function setError($error): void
    {
        $this->error = $error;
    }

    /**
     * @param int $statusCode
     * @return int
     */
    public function setStatusCode(int $statusCode): int
    {
        return $this->statusCode = $statusCode;
    }
}
