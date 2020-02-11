# PHP Domainrobot API

A php package for easy integration of the **Domainrobot API** powered by [InterNetX GmbH](https://internetx.com).

## Table of Contents

- [PHP Domainrobot API](#php-domainrobot-api)
  - [Table of Contents](#table-of-contents)
  - [Install and Use](#install-and-use)
    - [Installation](#installation)
    - [Basic Use](#basic-use)
  - [Usage](#usage)
  - [Asynchronous vs Synchronous Requests](#asynchronous-vs-synchronous-requests)
    - [Example for a synchronous Request](#example-for-a-synchronous-request)
    - [Example for an asynchronous Request](#example-for-an-asynchronous-request)
    - [Models](#models)
      - [Instantiating](#instantiating)
      - [How to set properties](#how-to-set-properties)
    - [DomainRobotException](#domainrobotexception)
    - [DomainRobotResult (only available for async methods/requests)](#domainrobotresult-only-available-for-async-methodsrequests)
    - [Supported API calls](#supported-api-calls)
      - [Certificate tasks](#certificate-tasks)
        - [Prepare Order](#prepare-order)
        - [Create Realtime](#create-realtime)
    - [DomainStudio tasks](#domainstudio-tasks)
      - [Search](#search)
  - [(Custom) Headers](#custom-headers)
    - [Use](#use)
    - [Available Headers](#available-headers)
    - [Setting Headers](#setting-headers)
  - [Changelog](#changelog)
  - [Copyright and license](#copyright-and-license)

## Install and Use

### Installation

```bash
composer require internetx/php-domainrobot-sdk
```

### Basic Use

```php
use IXDomainRobot\DomainRobot;
```

## Usage

Before you can interact with the API you need to specify your authentication credentials and if you have a "Personal AutoDNS" account your url and context.

```php
use IXDomainRobot\DomainRobot;

$domainRobot = new DomainRobot([
    "url" => "http://dev-proxy-lab.intern.autodns-lab.com:10025",
    "auth" => new DomainRobotAuth([
        "user" => "user",
        "password" => "password",
        "context" => 4
    ])
]);
```

- url
    ** can be left blank! (mandatory for "Personal AutoDNS" accounts)
- auth (mandatory)
    ** user (mandatory)
    ** password (mandatory)
    ** context (mandatory for "Personal AutoDNS" accounts)

## Asynchronous vs Synchronous Requests

This library is mainly meant to be used with synchronous request but also provides the possibility to be used with asynchronous requests.

The basic difference is that the asynchronous requests will provide you with less guidance than the synchronous requests.

A synchronous requests will return an Object as described in the official swagger documentation, whereas an asynchronous request will give you a DomainRobotResult Object which will only return the response as a plain array. You will then have to handle the data on your own.

Both methods provide certain advantages in certain situations.

Be aware that synchronous request will give you access to the return status code and the plain array result through *DomainRobot::getLastDomainRobotResult()*

Please refer to the examples below for more details.

### Example for a synchronous Request

```php
try {
    // this return an instance of new CertificateData() see [Models](#models) for more info
    $certData = $domainRobot->certificate($certificateModel)->prepareOrder();
}catch(DomainRobotException $exception){
    return response()->json($exception->getError(), $exception->getStatusCode());
}

// access response values through the provided CertificateData Object
$certData->getName();

// access plain result and statuscode through DomainRobot::getLastDomainRobotResult
return response()->json(
    DomainRobot::getLastDomainRobotResult()->getResult(),
    DomainRobot::getLastDomainRobotResult()->getStatusCode()
);
```

### Example for an asynchronous Request

```php
try {
    // returns a DomainRobotPromise Object
    $promise = $domainRobot->certificate($certificateModel)->prepareOrderAsync();
    // the promise returns a DomainRobotResult Object
    $result = $promise->wait();
}catch(DomainRobotException $exception){
    return response()->json($exception->getError(), $exception->getStatusCode());
}

// directly access plain result and statuscode through the DomainRobotResult Object
return response()->json($result->getResult(), $result->getStatusCode());
```

### Models

Specific examples for certain models can be found in the section [Supported API calls](#supported-api-calls)

#### Instantiating

Modles are instantiated by using the provided Models in this package.
See an example below:

```php
use IXDomainRobot\Model\Certificate;

$certificateModel = new Certificate();
```

All available Models can be found in src/Models.
Alternatively you can search here:

All available Models and properties can be seen under the Section 'Models' in detail here: [https://help.internetx.com/display/APIJSONEN/Technical+Documentation](https://help.internetx.com/display/APIJSONEN/Technical+Documentation)

#### How to set properties

Properties can be set while creating a new model or a after a model has been created.

The following examples are valid:

```php
use IXDomainRobot\Model\Certificate;

$timePeriod = new TimePeriod([
    "unit" => "MONTH",
    "period" => 12
]);
$certificateModel = new Certificate([
    "lifetime" => $timePeriod,
    "product" => "BASIC_SSL"
]);
```

```php
use IXDomainRobot\Model\Certificate;
use IXDomainRobot\Model\TimePeriod;

$certificateModel = new Certificate();
$timePeriod = new TimePeriod([
    "unit" => "MONTH",
    "period" => 12
]);
$certificateModel->setLifetime($timePeriod);
$certificateModel->setProduct("BASIC_SSL")
```

### DomainRobotException

Errors produced in available services will throw a DomainRobotException.

Example:

```php
 try {
    $promise = $domainRobot->certificate($certificateModel)->createRealtime();
    $domainRobotResult = $promise->wait();
}catch(DomainRobotException $exception){
    return response()->json($exception->getError(), $exception->getStatusCode());
}
```

The specific error message is stored in $exception->error and can be accessed with $exception->getError().
The specific http status code can be accessed with $exception->getStatusCode().
See an example of an error below.

```php
Array
(
    [stid] => 20200210-app3-dev-5050
    [messages] => Array
        (
            [0] => Array
                (
                    [text] => Domain validation failed on the CA side.
                    [code] => EF400139
                    [status] => ERROR
                )
        )
    [status] => Array
        (
            [code] => E4001012
            [text] => E4001012
            [type] => ERROR
        )
    [object] => Array
        (
            [type] => Certificate
            [value] => example.com
        )
)
```

### DomainRobotResult (only available for async methods/requests)

Successful asnychronous requests will return a DomainRobotResult object which contains the result as an array and the http status code of the request.

Example:

```php
try {
    $promise = $domainRobot->certificate($certificateModel)->createRealtime();
    // this returns a DomainRobotResult Object
    $domainRobotResult = $promise->wait();
}catch(DomainRobotException $exception){
    return response()->json($exception->getError(), $exception->getStatusCode());
}

// retrieve result and statuscode from the DomainRobotResult Object
return response()->json($domainRobotResult->getResult(), $domainRobotResult->getStatusCode());
```

The specific result message is stored in $domainRobotResult->result and can be accessed with $domainRobotResult->getResult().
The specific http status code can be accessed with $domainRobotResult->getStatusCode().
See an example of an error below.

```php
(
    [stid] => 20200210-app3-dev-5063
    [status] => Array
        (
            [code] => S400110
            [text] => CSR key was checked successfully.
            [type] => SUCCESS
        )
    [data] => Array
        (
            [0] => Array
                (
                    [plain] => -----BEGIN CERTIFICATE REQUEST-----
...
-----END CERTIFICATE REQUEST-----
                    [name] => example.com
                    [keySize] => 2048
                    [countryCode] => AU
                    [state] => Some-State
                    [organization] => Example Ltd
                    [algorithm] => RSA
                    [signatureHashAlgorithm] => SHA256
                )
        )
)
```

### Supported API calls

All API calls are asynchronous. Asynchronous calls should always be wrapped in a try-catch block to catch
possible exceptions.

All API calls return a [DomainRobotException](#domainrobotexception) if an error occurs.

All asnychronous API calls return a [DomainRobotResult](#domainrobotresult) if the task was successful.

All synchronouse API calls return a call specific Object as defined in our [Technical Documentation](https://help.internetx.com/display/APIJSONEN/Technical+Documentation) (Please also refer to the examples of available tasks below for more details.)

#### Certificate tasks

##### Prepare Order

```php
use IXDomainRobot\DomainRobot;
use IXDomainRobot\Lib\DomainRobotAuth;
use IXDomainRobot\Lib\DomainRobotException;
use IXDomainRobot\Model\Certificate;

$domainRobot = new DomainRobot([
    "auth" => new DomainRobotAuth([
        "user" => "user",
        "password" => "password"
    ])
]);

$certificateModel = new Certificate();
$certificateModel->setCsr(
    "-----BEGIN CERTIFICATE REQUEST-----" .
    ...
    "-----END CERTIFICATE REQUEST-----"
);

// sync version
try {
    // this return an instance of new IXDomainRobot\Model\CertificateData() see [Models](#models) for more info
    $certData = $domainRobot->certificate($certificateModel)->prepareOrder();
}catch(DomainRobotException $exception){
    return response()->json($exception->getError(), $exception->getStatusCode());
}

return response()->json(
    DomainRobot::getLastDomainRobotResult()->getResult(),
    DomainRobot::getLastDomainRobotResult()->getStatusCode()
);

// async version
try {
    $promise = $domainRobot->certificate($certificateModel)->prepareOrderAsync();
    $result = $promise->wait();
}catch(DomainRobotException $exception){
    return response()->json($exception->getError(), $exception->getStatusCode());
}

return response()->json($result->getResult(), $result->getStatusCode());
```

##### Create Realtime

```php
use IXDomainRobot\Lib\DomainRobotException;
use IXDomainRobot\Model\Certificate;
use IXDomainRobot\Model\TimePeriod;
use IXDomainRobot\Model\CertAuthentication;

$certificateModel = new Certificate();
$certificateModel->setCsr(
    "-----BEGIN CERTIFICATE REQUEST-----" .
    ...
    "-----END CERTIFICATE REQUEST-----"
);
$certificateModel->setName("example.com");

$timePeriod = new TimePeriod([
    "unit" => "MONTH",
    "period" => 12
]);
$certificateModel->setLifetime($timePeriod);
$certificateModel->setProduct("BASIC_SSL");
$certAuthentication = new CertAuthentication([
    "method" => "FILE"
]);
$certificateModel->setAuthentication($certAuthentication);

// sync [returns a new IXDomainRobot\Model\Certificate() Object]
$certificate = $domainRobot->certificate($certificateModel)->createRealtime();

// async [returns a IXDomainRobot\Lib\DomainRobotPromise]
$promise = $domainRobot->certificate($certificateModel)->createRealtimeAsync();
```

### DomainStudio tasks

#### Search

```php
use IXDomainRobot\Model\DomainEnvelopeSearchRequest;
use IXDomainRobot\Model\DomainStudioSources;
use IXDomainRobot\Model\DomainStudioSourceSuggestion;

$domainEnvelopeSearchRequest = new DomainEnvelopeSearchRequest();
$sources = new DomainStudioSources();
$sources->setSuggestion(new DomainStudioSourceSuggestion(["max" => 5]));
$domainEnvelopeSearchRequest->setSources($sources);
$domainEnvelopeSearchRequest->setSearchToken("google");
$domainEnvelopeSearchRequest->setCurrency("USD");

// sync [returns a new IXDomainRobot\Model\DomainEnvelope() Object]
$domainEnvelope = $domainRobot->domainStudio($domainEnvelopeSearchRequest)->search();

// async [returns a IXDomainRobot\Lib\DomainRobotPromise]
$promise = $domainRobot->certificate($certificateModel)->searchAsync();
```

## (Custom) Headers

### Use

```php
use IXDomainRobot\Lib\DomainRobotHeaders;
```

### Available Headers

```php
[
    DOMAINROBOT_HEADER_DOMAINROBOT_STID,
    DOMAINROBOT_HEADER_SESSION_ID,
    DOMAINROBOT_HEADER_PRECEDENCE,
    DOMAINROBOT_HEADER_CONTEXT,
    DOMAINROBOT_HEADER_BULK_LIMIT,
    DOMAINROBOT_HEADER_PIN,
    DOMAINROBOT_HEADER_2FA_TOKEN,
    DOMAINROBOT_HEADER_OWNER_NAME,
    DOMAINROBOT_HEADER_OWNER_CONTEXT,
    DOMAINROBOT_HEADER_DEMO_MODE,
    DOMAINROBOT_HEADER_WEBSOCKET,
    DOMAINROBOT_HEADER_WEBSOCKET_TARGET,
    DOMAINROBOT_HEADER_CTID,
    DOMAINROBOT_HEADER_SESSION_USER,
    DOMAINROBOT_HEADER_OWNER,
    DOMAINROBOT_HEADER_CUSTOMER,
    DOMAINROBOT_HEADER_PROFILE
]
```

### Setting Headers

Custom Headers (see available headers in [Available Headers](#available-headers)) can be set by calling the **addHeaders** method before calling a specific API task.
**addHeaders** expects an array. Default headers can also be overwritten like this.
See example below.

```javascript
use IXDomainRobot\Lib\DomainRobotHeaders;

$promise = $domainRobot->certificate($certificateModel)
                       ->addHeaders(
                            [DomainRobotHeaders::DOMAINROBOT_HEADER_2FA_TOKEN => "token"]
                       )->prepareOrder();
$domainRobotResult = $promise->wait();
```

## Changelog

For a detailed changelog, see the [CHANGELOG.md](CHANGELOG.md) file.

## Copyright and license

MIT License

Copyright (c) 2019 InterNetX GmbH

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.
