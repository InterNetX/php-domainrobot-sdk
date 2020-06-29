# Time Unit

```php
use Domainrobot\Model\TimeUnitConstants;

TimeUnitConstants::MILLISECOND;
TimeUnitConstants::SECOND;
TimeUnitConstants::MINUTE;
TimeUnitConstants::HOUR;
TimeUnitConstants::DAY;
TimeUnitConstants::WEEK;
TimeUnitConstants::MONTH;
TimeUnitConstants::QUARTER;
TimeUnitConstants::YEAR;

// Example

new TimePeriod([
    'unit' => TimeUnitConstants::MONTH,
    'period' => 12
]);
```

----

Used in :

* [certificate](http://localhost:8080/guide/api_tasks/contact.html)->[create](https://github.com/InterNetX/php-domainrobot-sdk/blob/master/example/contact/CertificateCreate.php)(Certificate $certificate)