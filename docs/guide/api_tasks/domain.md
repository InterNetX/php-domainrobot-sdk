# Domain

```php
function create(Domain $body);
function update(Domain $body);
function info($name);
function list(Query $body = null)
function updateStatus(Domain $body);
function renew(Domain $body);
function transfer(Domain $body);
function createAuthinfo1($name);
function deleteAuthinfo1($name);
function createAuthinfo2($name);
function restoreList(Query $body = null);
function restore(DomainRestore $body);
```
