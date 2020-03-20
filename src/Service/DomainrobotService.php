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
use Psr\Http\Message\ResponseInterface;

class DomainrobotService
{
    /**
     *
     * @var DomainrobotConfig
     */
    protected $domainrobotConfig;

    /**
     *
     * @var array
     */
    protected $guzzleClientConfig;

    public function __construct(DomainrobotConfig $domainrobotConfig)
    {
        $this->domainRobotConfig = $domainrobotConfig;

        // get current version of the SDK
        $handle = fopen(__DIR__."/../../composer.json", "r");
        $contents = fread($handle, filesize(__DIR__."/../../composer.json"));
        fclose($handle);
        preg_match("/version.+(\d+\.\d+\.\d+)/",$contents,$matches);

        $this->guzzleClientConfig = [
            'headers' => [
                DomainrobotHeaders::DOMAINROBOT_CONTENT_TYPE => "application/json",
                DomainrobotHeaders::DOMAINROBOT_USER_AGENT => "PHPDomainrobotSdk/$matches[1]",
                DomainrobotHeaders::DOMAINROBOT_HEADER_CONTEXT => $this->domainRobotConfig->getAuth()->getContext()
            ],
            'auth' => [
                $this->domainRobotConfig->getAuth()->getUser(),
                $this->domainRobotConfig->getAuth()->getPassword()
            ]
        ];
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

        $promise = $guzzleClient->requestAsync(
            $method,
            $url,
            $options
        )->then(
            /**
             *
             * @return DomainrobotException
             */
            function (ResponseInterface $response) {
                $rawResponse = $response->getBody()->getContents();
                $decodedResponse = json_decode($rawResponse, true);

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
}
