# SslContact

::: unobtrusive-info
Contact tasks used for all certificate tasks.
:::

General call of tasks:

```php
 $sslContact = $domainrobot->sslContact->create($sslContact);
```

* create(SslContact $sslContact);
* update(SslContact $sslContact);
* delete(int $id);
* info(int $id);
* list(Query $query = null);
