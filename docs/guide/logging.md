# Logging Requests and Responses

There may be certain circumstances where you may want to log your requests and responses.
For these cases we provide you with two integrated callback methods you can use for this purpose.

## Implementation and Usage

There are two possible ways to use these methods.

1. Define them globally through the domainrobotConfig

    ```php
    new Domainrobot([
        "url" => "https://api.autodns.com/v1",
        "auth" => new DomainrobotAuth([
            "user" => "username",
            "password" => "password",
            "context" => 4
        ]),
        "logRequestCallback" => function ($method, $url, $requestOptions, $headers){
            LogCallback::dailyRequest($method, $url, $options, $user);
        },
        "logResponseCallback" => function ($url, $response, $statusCode, $exectime){
            LogCallback::dailyResponse($url, $response, $statusCode, $exectime, $user);
        }
    ]);

    ```

2. Define them locally for a single request

    ```php
    $user = User::find(1);

    $domainrobot->domain->logRequest(function($method, $url, $requestOptions, $headers) use ($user){
        // execute your code here
        print_r($method);
    })->logResponse(function($url, $response, $statusCode, $exectime) use ($user){
        // execute your code here
        print_r($user);
    })->info("example.com");
    ```

&nbsp;  
&nbsp;  

::: warning ATTENTION:
Local defintions for log callbacks will always overwrite global definitions.
:::

## Request parameters

* **$method**: the HTTP Method used for the call
* **$url**: the URL the call is sent to
* **$requestOptions**: the request options that are sent with the call; contains query parameters and other settings
* **$headers**: the headers sent with the call

## Response parameters

* **$url**: the url the call was sent to
* **$response**: the raw response we received from the backend
* **$statusCode**: the HTTP status code
* **$exectime**: the execution time of the full request from start to finish
