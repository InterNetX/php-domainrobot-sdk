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
use Domainrobot\Model\Certificate;
use Illuminate\Support\Facades\Log;
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
        $handle = fopen(__DIR__."/../../composer.json", "r");
        $contents = fread($handle, filesize(__DIR__."/../../composer.json"));
        fclose($handle);
        preg_match("/version.+(\d+\.\d+\.\d+)/", $contents, $matches);

        $this->guzzleClientConfig = [
            'headers' => [
                DomainrobotHeaders::DOMAINROBOT_CONTENT_TYPE => "application/json",
                DomainrobotHeaders::DOMAINROBOT_USER_AGENT => "PHPDomainrobotSdk/$matches[1]",
                DomainrobotHeaders::DOMAINROBOT_HEADER_CONTEXT => $this->domainrobotConfig->getAuth()->getContext()
            ],
            'auth' => [
                $this->domainrobotConfig->getAuth()->getUser(),
                $this->domainrobotConfig->getAuth()->getPassword()
            ]
        ];

        $this->addHeaders($this->domainrobotConfig->getHeaders());
    }

    public function logRequest($callback)
    {
        $this->logRequestCallback = $callback;
        return $this;
    }

    public function logResponse($callback)
    {
        $this->logResponseCallback = $callback;
        return $this;
    }

    public function addHeaders($headers = [])
    {
        $this->guzzleClientConfig['headers'] = array_unique(array_merge($this->guzzleClientConfig['headers'], $headers));
        return $this;
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

        $this->logRequestIfCallbackSet($method, $url, $options, $this->guzzleClientConfig['headers']);
        $startTime = microtime(true);

        $promise = $guzzleClient->requestAsync(
            $method,
            $url,
            $options
        )->then(
            /**
             *
             * @return DomainrobotException
             */
            function (ResponseInterface $response) use ($url, $startTime) {
                $rawResponse = $response->getBody()->getContents();
                $decodedResponse = json_decode($rawResponse, true);

               $this->logResponseIfCallbackSet(    
                    $url,
                    $rawResponse,
                    $response->getStatusCode(),
                    microtime(true) - $startTime
                );

                return new DomainrobotResult($decodedResponse, $response->getStatusCode());
            },
            /**
             *
             * @throws DomainrobotException
             */
            function (\Exception $exception) {
                if ($exception instanceof ClientException || $exception instanceof ServerException) {
                    $contents = json_decode($exception->getResponse()->getBody()->getContents(), true);

                    throw new DomainrobotException($contents, $exception->getResponse()->getStatusCode(), "Domainrobot Error");
                }
                // RequestException | ClientException
                $msg = $exception->getMessage();

                throw new DomainrobotException($msg, $exception->getCode(), "Domainrobot Error");
            }
        );
        return new DomainrobotPromise($promise);
    }

    private function logRequestIfCallbackSet($method, $url, $requestOptions, $headers)
    {
        if ($this->logRequestCallback!==null) {
            $this->logRequestCallback->call(
                $this,
                $method,
                $url,
                $requestOptions,
                $headers
            );
        }

        if ($this->domainrobotConfig->hasLogRequestCallback()) {
            $this->domainrobotConfig->logRequest()->call(
                $this,
                $method,
                $url,
                $requestOptions,
                $headers
            );
        }
    }

    private function logResponseIfCallbackSet($url, $rawResponse, $statusCode, $execTime){
        if ($this->logResponseCallback!==null) {
            $this->logResponseCallback->call(
                $this,
                $url, $rawResponse, $statusCode, $execTime
            );
            return;
        }

        if ($this->domainrobotConfig->hasLogResponseCallback()) {
            $this->domainrobotConfig->logResponse()->call(
                $this,
                $url, $rawResponse, $statusCode, $execTime
            );
            return;
        }

    }
}
