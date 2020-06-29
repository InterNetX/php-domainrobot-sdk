---
title: Models
---

# Models

This SDK heavily relies on Models which are generated from our official [Swagger documentation](https://help.internetx.com/display/APIJSONEN/Technical+Documentation).

If you are in doubt about which properties are accepted by a specific model you can always refer to this documentation or take a look at the [examples](https://github.com/InterNetX/php-domainrobot-sdk/tree/master/example) we provide in the source code of the SDK.

To build a certain request, for example to create a domain, you will first have to create the general Domainrobot instance and then provide it with a Domain Model which itself is containing other Models as well.

Take a look at this [example](https://github.com/InterNetX/php-domainrobot-sdk/blob/master/example/domain/DomainCreate.php):

```php
// create and configure the Domainrobot instance
$domainrobot = new Domainrobot([
    "url" => "https://api.autodns.com/v1",
    "auth" => new DomainrobotAuth([
        "user" => "user",
        "password" => "password",
        "context" => 4
    ])
]);

// next we have to define and configure the Domain Model
$domain = new Domain();
$domain->setName("php-sdk-test".uniqid().".de");

// the setNameServers method only accepts an array of NameServer Models
$domain->setNameServers([
    new NameServer([
        "name" => "ns1.example.com"
    ]),
    new NameServer([
        "name" => "ns2.example.com"
    ])
]);

// we need to set contacts for this we inquire a contact we already know
// and pass it into the DomainModel
$contact = $domainrobot->contact->info(23194139);
// $contact is an intance of a Contact model
$domain->setAdminc($contact);
$domain->setOwnerc($contact);
$domain->setTechc($contact);
$domain->setZonec($contact);
$domain->setIgnoreWhois(true);

// finally create the domain
$domainrobot->domain->create($domain);

// and read the response and resulting statuscode
return response()->json(
    Domainrobot::getLastDomainrobotResult()->getResult(),
    Domainrobot::getLastDomainrobotResult()->getStatusCode()
);
```

Specific examples for certain models can be found in the section **Supported API calls** which you can find in the left hand side menu.