# Installation and Usage

## Installation

```bash
composer require internetx/php-domainrobot-sdk
```

## Usage

Before you can interact with the API you need to specify your authentication credentials, the baseurl and the context.

You need an account in at last one of these two systems to be able to use this SDK.

* Productive System: <https://api.autodns.com/v1>
* Demo System: <https://api.demo.autodns.com/v1>

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