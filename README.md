# PHP Domainrobot API

A php package for easy integration of the **Domainrobot API** powered by [InterNetX GmbH](https://internetx.com).

## Table of Contents

1. [Preamble](#preamble)
2. [Install and Use](#install-and-use)
   * [Installation](#installation)
   * [Basic Use](#basic-use)
3. [Usage](#usage)
   * [Asynchronous vs Synchronous Requests](#asynchronous-vs-synchronous-requests)
   * [Models](#models)
   * [Supported API calls](#supported-api-calls)
   * [Exception handling](#exception-handling)
   * [(Custom) Headers](#custom-headers)
4. [Changelog](#changelog)
5. [Copyright and license](#copyright-and-license)

## Preamble

This composer package can be used within every composer project, including projects based on frameworks like [Laravel](https://laravel.com), [CodeIgniter](https://codeigniter.com/), [Symfony](https://symfony.com/) and many more.

**Note:** Feel free to contribute by creating pull requests or file an issue for bugs, questions and feature requests.

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

Before you can interact with the API you need to specify your authentication credentials, the baseurl and the context.

* Productive System: <https://api.autodns.com/v1>
* Demo System: <https://api.demo.autodns.com/v1>

```php
use IXDomainRobot\DomainRobot;

$domainRobot = new DomainRobot([
    "url" => "https://api.autodns.com/v1",
    "auth" => new DomainRobotAuth([
        "user" => "user",
        "password" => "password",
        "context" => 4
    ])
]);
```

### Asynchronous vs Synchronous Requests

This library is mainly meant to be used with synchronous request but also provides the possibility to be used with asynchronous requests.

The basic difference is that the asynchronous requests will provide you with less guidance than the synchronous requests.

A synchronous requests will return an Object as described in the official swagger documentation, whereas an asynchronous request will give you a DomainRobotResult Object which will only return the response as a plain array. You will then have to handle the data on your own.

Both methods provide certain advantages in certain situations.

Be aware that synchronous request will give you access to the return status code and the plain array result through *DomainRobot::getLastDomainRobotResult()*

Please refer to the examples below for more details.

#### Example for a synchronous Request

```php
// Sends a synchronous request
try {
    $certData = $domainRobot->certificate->prepareOrder($body);
}catch(DomainRobotException $exception){
    return response()->json($exception->getError(), $exception->getStatusCode());
}

// Access response values through the provided CertificateData object
$certData->getName();

// Access plain result and statuscode through DomainRobot::getLastDomainRobotResult
return response()->json(
    DomainRobot::getLastDomainRobotResult()->getResult(),
    DomainRobot::getLastDomainRobotResult()->getStatusCode()
);
```

#### Example for an asynchronous Request

```php
// Sends an asynchronous request
try {
    $promise = $domainRobot->certificate->prepareOrderAsync($body);
    // Wait for the promise. This will return a DomainRobotResult object
    $result = $promise->wait();
}catch(DomainRobotException $exception){
    return response()->json($exception->getError(), $exception->getStatusCode());
}

// Access response values through the provided DomainRobotResult object
$statusCode = $result->getStatusCode();
$data = $result->getData()
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

### Supported API calls

#### Domain tasks

```php
function create(Domain $body);
function update(Domain $body);
function info($name);
function list(Query $body = null)
function updateStatus(Domain $body);
function renew(Domain $body);
function transfer(Domain $body);
function createAuthinfo1($name);
function deleteAuthinfo1($name);
function createAuthinfo2($name);
function restoreList(Query $body = null);
function restore(DomainRestore $body);
```

#### Domain cancelation tasks

```php
function create(DomainCancelation $body);
function update(DomainCancelation $body);
function delete($domain);
function info($domain);
function list(Query $body = null);
```

#### Contact tasks

```php
function create(Contact $body);
function update(Contact $body);
function delete($id);
function info($id);
function list(Query $body = null);
```

#### Zone tasks

```php
function create(Zone $body);
function update(Zone $body);
function delete($name, $systemNameServer);
function info($name, $systemNameServer);
function list(Query $body = null);
function stream($origin, ZoneStream $body);
function importZone(Zone $body);
```

#### Certificate tasks

```php
function create(Certificate $body);
function realtime(Certificate $body);
function prepareOrder(CertificateData $body);
function list(Query $body = null);
function info($id);
function delete($id);
function reissue(Certificate $body);
function renew(Certificate $body);
function commentUpdate($id, $comment);
```

#### SslContact tasks

```php
function create(SslContact $body);
function update(SslContact $body);
function delete($id);
function info($id);
function list(Query $body = null);
```

#### TrustedApplication tasks

```php
function create(TrustedApplication $body);
function update(TrustedApplication $body);
function delete($id);
function info($id);
function list(Query $body = null);
```

#### Domainstudio tasks

```php
function search(DomainEnvelopeSearchRequest $body);
```

#### Poll tasks

```php
function info();
function confirm($id);
```

#### Transferout tasks

```php
function answer($domain, $answer);
function list(Query $body = null);
```

### Exception handling

If there is any error response from the API, the services will throw a DomainRobotException, which contains information about the error.

Example:

```php
 try {
    $promise = $domainRobot->certificate->createRealtime($certificate);
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

```php
use IXDomainRobot\Lib\DomainRobotHeaders;

$certificateData = $domainRobot->certificate
                       ->addHeaders(
                            [DomainRobotHeaders::DOMAINROBOT_HEADER_2FA_TOKEN => "token"]
                       )->prepareOrder($body);
```

## Changelog

For a detailed changelog, see the [CHANGELOG.md](CHANGELOG.md) file.

## Copyright and license

MIT License

Copyright (c) 2020 InterNetX GmbH

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
