<?php

namespace TestSuite;

use GuzzleHttp\HandlerStack;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Psr7\Response;
use Domainrobot\Lib\DomainrobotAuth;
use Domainrobot\Lib\DomainrobotConfig;

define('_AS_ARRAY', true);

trait AtoumTestSuite
{
    public function getDomainRobotConfig($asArray = false){
        $config = [
            "url" => "api.autodns.com",
            "auth" => new DomainrobotAuth([
                "user" => "user",
                "password" => "pass",
                "context" => 1
            ])
            ];
        if ($asArray) {
            return $config;
        }
        return new DomainrobotConfig($config);
    }

    public function loadMockDataAsJsonString($fileName)
    {
        return file_get_contents('test/mock-data/'.$fileName);
    }


    public function loadMockDataAsArray($fileName)
    {
        $json = file_get_contents('test/mock-data/'.$fileName);
        return json_decode($json, true);
    }

    /**
     * Undocumented function
     *
     * @param DomainrobotService $service
     * @param array $responses
     *      response in array
     * @return void
     */
    public function registerGuzzleMockHandler($service, $responses = [])
    {
        foreach($responses as &$response){
            $response = new Response(200, [], $response);
        }
        $mock = new MockHandler($responses);
        $handlerStack = HandlerStack::create($mock);

        $service->addGuzzleClientConfig([
            'handler' => $handlerStack
        ]);
    }
}
