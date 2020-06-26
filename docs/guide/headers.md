# Setting Headers

Custom Headers (see available headers in [Available Headers](#available-headers)) can be set by calling the **addHeaders** method before calling a specific API task.
**addHeaders** expects an array. Default headers can also be overwritten like this.

See example below.

```php
use Domainrobot\Lib\DomainrobotHeaders;

$certificateData = $domainrobot->certificate
            ->addHeaders(
                [DomainrobotHeaders::DOMAINROBOT_HEADER_2FA_TOKEN => "token"]
            )->prepareOrder($body);
```

## Available Headers

```php
DomainrobotHeaders::DOMAINROBOT_HEADER_DOMAINROBOT_STID;
DomainrobotHeaders::DOMAINROBOT_HEADER_SESSION_ID;
DomainrobotHeaders::DOMAINROBOT_HEADER_PRECEDENCE;
DomainrobotHeaders::DOMAINROBOT_HEADER_CONTEXT;
DomainrobotHeaders::DOMAINROBOT_HEADER_BULK_LIMIT;
// needed for domainsafe tasks
DomainrobotHeaders::DOMAINROBOT_HEADER_PIN;
// for two factor authentication
DomainrobotHeaders::DOMAINROBOT_HEADER_2FA_TOKEN;
// needed for subuser tasks
DomainrobotHeaders::DOMAINROBOT_HEADER_OWNER_NAME;
// needed for subuser tasks
DomainrobotHeaders::DOMAINROBOT_HEADER_OWNER_CONTEXT;
// enable or disable demo mode for certain tasks
DomainrobotHeaders::DOMAINROBOT_HEADER_DEMO_MODE;
DomainrobotHeaders::DOMAINROBOT_HEADER_WEBSOCKET;
DomainrobotHeaders::DOMAINROBOT_HEADER_WEBSOCKET_TARGET;
DomainrobotHeaders::DOMAINROBOT_HEADER_CTID;
DomainrobotHeaders::DOMAINROBOT_HEADER_SESSION_USER;
DomainrobotHeaders::DOMAINROBOT_HEADER_OWNER;
DomainrobotHeaders::OMAINROBOT_HEADER_CUSTOMER;
DomainrobotHeaders::DOMAINROBOT_HEADER_PROFILE;
```

## Logging sent headers

If you want to see which headers the SDK sends to the API you can do so by using the provided logging methods explained in [Logging Requests and Responses](http://localhost:8080/guide/logging.html)

A very simple example:

```php
"logRequestCallback" => function ($method, $url, $requestOptions, $headers){
    Log::debug($headers);
}
```
