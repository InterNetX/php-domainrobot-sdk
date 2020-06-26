# Model configuration

Model properties can be set while creating a new model or after a model has been created.

The following examples are valid:

```php
use Domainrobot\Model\Certificate;

$timePeriod = new TimePeriod([
    "unit" => TimeUnitConstants::MONTH,
    "period" => 12
]);
$certificateModel = new Certificate([
    "lifetime" => $timePeriod,
    "product" => "BASIC_SSL"
]);
```

```php
use Domainrobot\Model\Certificate;
use Domainrobot\Model\TimePeriod;

$certificateModel = new Certificate();
$timePeriod = new TimePeriod([
    "unit" => "MONTH",
    "period" => 12
]);
$certificateModel->setLifetime($timePeriod);
$certificateModel->setProduct("BASIC_SSL")
```
