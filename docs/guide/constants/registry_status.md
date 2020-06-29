# Registry Status

```php
use Domainrobot\Model\RegistryStatusConstants;

RegistryStatusConstants::ACTIVE;
RegistryStatusConstants::HOLD;
RegistryStatusConstants::LOCK;
RegistryStatusConstants::HOLD_LOCK;
RegistryStatusConstants::AUTO;
RegistryStatusConstants::LOCK_OWNER;
RegistryStatusConstants::LOCK_UPDATE;
RegistryStatusConstants::PENDING;
RegistryStatusConstants::NONE;
```

----

Used in :

* [domain](http://localhost:8080/guide/api_tasks/domain.html)->[updateStatus](https://github.com/InterNetX/php-domainrobot-sdk/blob/master/example/domain/DomainUpdateStatus.php)(Domain $domain)
