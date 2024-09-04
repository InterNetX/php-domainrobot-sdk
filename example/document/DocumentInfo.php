<?php
require_once "vendor/autoload.php";

use Domainrobot\Domainrobot;
use Domainrobot\Lib\DomainrobotAuth;

$domainrobot = new Domainrobot([
  'url' => "https://api.autodns.com/v1",
  'auth' => new DomainrobotAuth([
    'user' => 'USER',
    'password' => 'PASS',
    'context' => 4
  ])
]);


$targetFolder = 'path/to/folder/';
$targetFile = 'price_list.xml';

$domainrobot->document->info('price_list.xml', $targetFolder . $targetFile);