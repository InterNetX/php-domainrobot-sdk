# Zone

```php
function create(Zone $body);
function update(Zone $body);
function delete($name, $systemNameServer);
function info($name, $systemNameServer);
function list(Query $body = null);
function stream($origin, ZoneStream $body);
function importZone(Zone $body);
```
