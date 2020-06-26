# Certificate

```php
function create(Certificate $body);
function realtime(Certificate $body);
function prepareOrder(CertificateData $body);
function list(Query $body = null);
function info($id);
function delete($id);
function reissue(Certificate $body);
function renew(Certificate $body);
function commentUpdate($id, $comment);
```
