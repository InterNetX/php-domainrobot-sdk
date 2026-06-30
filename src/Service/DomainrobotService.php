<?php

namespace Domainrobot\Service;

use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ServerException;

use GuzzleHttp\Client;
use Domainrobot\Lib\DomainrobotConfig;
use Domainrobot\Lib\DomainrobotHeaders;
use Domainrobot\Lib\DomainrobotException;
use Domainrobot\Lib\DomainrobotResult;
use Domainrobot\Lib\DomainrobotPromise;
use Psr\Http\Message\ResponseInterface;

class DomainrobotService
{
    /**
     *
     * @var DomainrobotConfig
     */
    public $domainrobotConfig;

    /**
     *
     * @var array
     */
    protected $guzzleClientConfig;

    private $logRequestCallback = null;
    private $logResponseCallback = null;

    public function __construct(DomainrobotConfig $domainrobotConfig)
    {
        $this->domainrobotConfig = $domainrobotConfig;

        // get current version of the SDK
        $handle = fopen(__DIR__ . "/../../composer.json", "r");
        $contents = fread($handle, filesize(__DIR__ . "/../../composer.json"));
        fclose($handle);
        preg_match("/version.+(\d+\.\d+\.\d+)/", $contents, $matches);

        $this->guzzleClientConfig = [
            "headers" => [
                DomainrobotHeaders::DOMAINROBOT_CONTENT_TYPE =>
                    "application/json",
                DomainrobotHeaders::DOMAINROBOT_USER_AGENT => "PHPDomainrobotSdk/$matches[1]",
                DomainrobotHeaders::DOMAINROBOT_HEADER_CONTEXT => $this->domainrobotConfig
                    ->getAuth()
                    ->getContext(),
            ],
            "auth" => [
                $this->domainrobotConfig->getAuth()->getUser(),
                $this->domainrobotConfig->getAuth()->getPassword(),
            ],
        ];

        $this->addHeaders($this->domainrobotConfig->getHeaders());
    }

    /**
     * @param \Closure $callback
     * @return DomainrobotService
     */
    public function logRequest(\Closure $callback): DomainrobotService
    {
        $this->logRequestCallback = $callback;
        return $this;
    }

    /**
     * @param \Closure $callback
     * @return DomainrobotService
     */
    public function logResponse(\Closure $callback): DomainrobotService
    {
        $this->logResponseCallback = $callback;
        return $this;
    }

    /**
     * @param array $headers
     * @return DomainrobotService
     */
    public function addHeaders(array $headers = []): DomainrobotService
    {
        $this->guzzleClientConfig["headers"] = array_merge(
            $this->guzzleClientConfig["headers"],
            $headers,
        );
        return $this;
    }

    /**
     * @param array $additionalConfig
     * @return void
     */
    public function addGuzzleClientConfig(array $additionalConfig): void
    {
        $this->guzzleClientConfig = array_merge(
            $this->guzzleClientConfig,
            $additionalConfig,
        );
    }

    /**
     * General guzzle interface
     *
     * @param string $url
     * @param string $method
     * @param array $options
     *
     * @return DomainrobotPromise
     */
    public function sendRequest($url, $method, $options = [])
    {
        $guzzleClient = new Client($this->guzzleClientConfig);

        $this->logRequestIfCallbackSet(
            $method,
            $url,
            $options,
            $this->guzzleClientConfig["headers"],
        );
        $startTime = microtime(true);

        $promise = $guzzleClient->requestAsync($method, $url, $options)->then(
            /**
             *
             * @return DomainrobotResult
             */
            function (ResponseInterface $response) use ($url, $startTime) {
                $rawResponse = $response->getBody()->getContents();
                $decodedResponse = json_decode($rawResponse, true);

                $this->logResponseIfCallbackSet(
                    $url,
                    $rawResponse,
                    $response->getStatusCode(),
                    microtime(true) - $startTime,
                );

                return new DomainrobotResult(
                    $decodedResponse,
                    $response->getStatusCode(),
                    $response->getHeaders(),
                );
            },
            /**
             *
             * @throws DomainrobotException
             */
            function (\Exception $exception) {
                if (
                    $exception instanceof ClientException ||
                    $exception instanceof ServerException
                ) {
                    $contents = json_decode(
                        $exception->getResponse()->getBody()->getContents(),
                        true,
                    );

                    throw new DomainrobotException(
                        $contents,
                        $exception->getResponse()->getStatusCode(),
                        $exception->getMessage(),
                    );
                }
                // RequestException | ClientException
                $msg = $exception->getMessage();

                throw new DomainrobotException(
                    $msg,
                    $exception->getCode(),
                    $exception->getMessage(),
                );
            },
        );
        return new DomainrobotPromise($promise);
    }

    /**
     * @param string $method
     * @param string $url
     * @param array $requestOptions
     * @param array $headers
     * @return void
     */
    private function logRequestIfCallbackSet(
        string $method,
        string $url,
        array $requestOptions,
        array $headers,
    ): void {
        if ($this->logRequestCallback !== null) {
            $this->logRequestCallback->call(
                $this,
                $method,
                $url,
                $requestOptions,
                $headers,
            );
        }

        if ($this->domainrobotConfig->hasLogRequestCallback()) {
            $this->domainrobotConfig
                ->logRequest()
                ->call($this, $method, $url, $requestOptions, $headers);
        }
    }

    /**
     * @param string $url
     * @param string $rawResponse
     * @param int $statusCode
     * @param float $execTime
     * @return void
     */
    private function logResponseIfCallbackSet(
        string $url,
        string $rawResponse,
        int $statusCode,
        float $execTime,
    ): void {
        if ($this->logResponseCallback !== null) {
            $this->logResponseCallback->call(
                $this,
                $url,
                $rawResponse,
                $statusCode,
                $execTime,
            );
            return;
        }

        if ($this->domainrobotConfig->hasLogResponseCallback()) {
            $this->domainrobotConfig
                ->logResponse()
                ->call($this, $url, $rawResponse, $statusCode, $execTime);
            return;
        }
    }
}
