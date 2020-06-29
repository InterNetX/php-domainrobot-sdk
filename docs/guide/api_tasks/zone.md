# Zone

General call of tasks:

```php
 $zone = $domainrobot->zone->create($zone);
```

* create(Zone $zone);
* update(Zone $zone);
* delete(string $name, string $systemNameServer);
* info(string $name, string $systemNameServer);
* list(Query $query = null);
* stream(string $origin, ZoneStream $zonestream);
* importZone(Zone $zone);
