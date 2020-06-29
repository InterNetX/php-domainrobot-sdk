# Certificate

::: unobtrusive-info
Create, delete and manage certificates.

Find additional help here: [https://help.internetx.com/display/SSLEN](https://help.internetx.com/display/SSLEN)
:::

General call of tasks:

```php
 $objectJob = $domainrobot->certificate->create($certificate);
```

List of all available tasks with linked examples:

* [create](https://github.com/InterNetX/php-domainrobot-sdk/blob/master/example/certificate/CertificateCreate.php)(Certificate $certificate)
* [realtime](https://github.com/InterNetX/php-domainrobot-sdk/blob/master/example/certificate/CertificateCreateRealtime.php)(Certificate $certificate)
* [prepareOrder](https://github.com/InterNetX/php-domainrobot-sdk/blob/master/example/certificate/CertificatePrepareOrder.php)(CertificateData $certificateData)
* [list](https://github.com/InterNetX/php-domainrobot-sdk/blob/master/example/certificate/CertificateList.php)(Query $query = null)
* [info](https://github.com/InterNetX/php-domainrobot-sdk/blob/master/example/certificate/CertificateInfo.php)(int $id)
* [delete](https://github.com/InterNetX/php-domainrobot-sdk/blob/master/example/certificate/CertificateDelete.php)(int $id)
* reissue(Certificate $certificate)
* renew(Certificate $certificate)
* commentUpdate(int $id, string $comment)
