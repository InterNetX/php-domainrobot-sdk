<?php
require_once "vendor/autoload.php";

use Domainrobot\Domainrobot;
use Domainrobot\Lib\DomainrobotAuth;
use Domainrobot\Model\Query;
use Domainrobot\Model\QueryView;

$domainrobot = new Domainrobot([
  'url' => "https://api.autodns.com/v1",
  'auth' => new DomainrobotAuth([
    'user' => 'USER',
    'password' => 'PASS',
    'context' => 4
  ])
]);

$query = new Query([
  'filters' => [],
  'view' => new QueryView([
      'children' => true,
      'limit' => 10,
      'offset' => 0
  ])
]);

$domainList = $domainrobot->domainCancelation->list($query);
?>