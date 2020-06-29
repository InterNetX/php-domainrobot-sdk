# Domain

::: unobtrusive-info
Create, delete and manage certificates.

Find additional help here: [https://help.internetx.com/display/DOMAINEN](https://help.internetx.com/display/DOMAINEN)
:::

General call of tasks:

```php
 $objectJob = $domainrobot->domain->create($domain);
```

List of all available tasks with linked examples:

* [create](https://github.com/InterNetX/php-domainrobot-sdk/blob/master/example/domain/DomainCreate.php)(Domain $domain)
* [update](https://github.com/InterNetX/php-domainrobot-sdk/blob/master/example/domain/DomainUpdateForSubuser.php)(Domain $domain) 
* [info](https://github.com/InterNetX/php-domainrobot-sdk/blob/master/example/domain/DomainInfo.php)(string $name)
* [list](https://github.com/InterNetX/php-domainrobot-sdk/blob/master/example/domain/DomainList.php)(Query $query = null)
* [updateStatus](https://github.com/InterNetX/php-domainrobot-sdk/blob/master/example/domain/DomainUpdateStatus.php)(Domain $domain)
* [renew](https://github.com/InterNetX/php-domainrobot-sdk/blob/master/example/domain/DomainRenew.php)(Domain $domain)
* [transfer](https://github.com/InterNetX/php-domainrobot-sdk/blob/master/example/domain/DomainTransfer.php)(Domain $domain)
* [createAuthinfo1](https://github.com/InterNetX/php-domainrobot-sdk/blob/master/example/domain/DomainCreateAuthinfo1.php)(string $name)
* [deleteAuthinfo1](https://github.com/InterNetX/php-domainrobot-sdk/blob/master/example/domain/DomainDeleteAuthinfo1.php)(string $name)
* [createAuthinfo2](https://github.com/InterNetX/php-domainrobot-sdk/blob/master/example/domain/DomainCreateAuthinfo2.php)(string $name)
* [restoreList](https://github.com/InterNetX/php-domainrobot-sdk/blob/master/example/domain/DomainRestoreList.php)(Query $query = null);
* [restore](https://github.com/InterNetX/php-domainrobot-sdk/blob/master/example/domain/DomainRestore.php)(DomainRestore $domainRestore)
