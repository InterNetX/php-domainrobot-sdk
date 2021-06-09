# Installation and Usage

::: noheader
internetx/php-domainrobot-sdk is a composer package. 
:::

Official sources:

* [packagist](https://packagist.org/packages/internetx/php-domainrobot-sdk)
* [github repository](https://github.com/InterNetX/php-domainrobot-sdk)

If you have no prior experience with composer or do not know what composer is please refer to their official documentation at: [getcomposer.org](https://getcomposer.org)

## Installation

```bash
composer require internetx/php-domainrobot-sdk
```

If you do not use a php-framework like [Laravel](https://laravel.com), [Lumen](https://lumen.laravel.com),[CodeIgniter](https://codeigniter.com/), [Symfony](https://symfony.com/) you need to require/import the composer generated autoloader manually.

```php
// path to package: vendor/internetx/php-domainrobot-sdk
require_once "vendor/autoload.php";

// now you can import the parts of the SDK you want to use
use Domainrobot\Domainrobot;
```

internetx/php-domainrobot-sdk uses the [PSR-4: Autoloader](https://www.php-fig.org/psr/psr-4/) so once you've installed the package via composer and the required autoload.php file, you can start to implement your first task.

## Usage - Basic Auth

Before you can interact with the API you need to specify your authentication credentials, the baseurl and the context.

```php
use Domainrobot\Domainrobot;
use Domainrobot\Lib\DomainrobotAuth;

$domainrobot = new Domainrobot([
    "url" => "https://api.autodns.com/v1",
    "auth" => new DomainrobotAuth([
        "user" => "user",
        "password" => "password",
        "context" => 4
    ])
]);
```

## Usage - Session ID

Additionally to the authentication through basic auth, the API also offers the possibility
to use a so called session id. This ID has to be created once and should then be stored (in a session or something similar) by your application for further usage.
The underlying idea behind this is comparable to a JWT authentciation approach.

You can find more information on this topic here: [Authentication via SessionID](https://help.internetx.com/display/APIXMLEN/Authentication#Authentication-AuthenticationviaSessionID)

Below you can find a simple example of how to setup a session id authentication process.

```php
use Domainrobot\Domainrobot;
use Domainrobot\Model\LoginData;

// when working with a session id you don't need to declare the auth block here
$domainrobot = new Domainrobot([
  'url' => 'https://api.demo.autodns.com/v1'
]);

// set your authentication data in a separate model
//this will is only needed for the initial call to get our session id
$loginData = new LoginData([
  'user' => 'user',
  'password' => 'password',
  'context' => '9'
]);

// login and create the session id

// there are certain query parameters that you can define
// all those parameters are entirely optional
// the default config looks like this
$queryParams = [
    'acl' => true,
    'profile' => true,
    'customer' => true,
    'timeout' => 10
];

$domainrobot->login->sessionID($loginData, $queryParams);

// session id is located in the headers so we have to get those
// headers['x-domainrobot-sessionid'] should be stored in a session or something similar
$headers = $domainrobot::getLastDomainrobotResult()->getHeaders();

$domainrobot = new Domainrobot([
  'url' => 'https://api.demo.autodns.com/v1',
  'headers' => [
    'X-Domainrobot-SessionId' => $headers['X-Domainrobot-Stid'] 
  ]
]);
```

::: warning Attention
You need an account in at last one of these two systems to be able to use this SDK.
:::

* Production System: <https://api.autodns.com/v1>
* Demo System: <https://api.demo.autodns.com/v1>

## Domainrobot configuration parameters

* url
* auth: Domainrobot\Lib\DomainrobotAuth
  * user
  * password
  * context
* logRequestCallback
* logResponseCallback
