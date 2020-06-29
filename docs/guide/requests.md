# Asynchronous vs Synchronous Requests

::: noheader
This library is mainly meant to be used with **synchronous** request but also provides the possibility to be used with **asynchronous** requests.
:::

----

*The **main difference** is that the asynchronous requests will provide you with less guidance than the synchronous requests.*

----

See examples below for more information on this topic.

A synchronous request will return an Object as described in our official [swagger documentation](https://help.internetx.com/display/APIJSONEN/Technical+Documentation), whereas an asynchronous request will give you a DomainrobotResult Object which will only return the response as a plain array. You will then have to handle the data on your own.

Both methods provide certain advantages in certain situations.

Be aware that in both cases you will have access to the return status code and the plain array result through:

```php
Domainrobot::getLastDomainrobotResult()->getResult();
Domainrobot::getLastDomainrobotResult()->getStatusCode();
```

## Synchronous response

```php
// will return an array of Domainrobot\Model\Domain
$domainList = $domainrobot->domain->list($query)

// now you can loop through the array
// and query object properties of the domainList items
foreach($domainList as $item){
    print_r($item->name);
}

// This is an example of a retrieved $domainList
// Array(
//     [0] => Domainrobot\Model\Domain Object(
//         [container:protected] => Array(
//             [created] => 2019-09-12T10:31:00.000+0200
//             [updated] => 2020-06-23T16:36:41.000+0200
//             [owner] => Array
//                 (
//                     [context] => 797095
//                     [user] => user
//                 )
//             [name] => example.com
//         )
//     )
// )

```

## Asynchronous response

```php
// will return an array of domains as arrays
try {
    $promise = $domainrobot->domain->listAsync($query)
    $result = $promise->wait();
}catch(DomainrobotException $exception){
    return response()->json($exception->getError(), $exception->getStatusCode());
}
// extract the resulting domain array
$domanList = $result->getResult()

// now you can loob through the array
// and query object properties through array key calls
foreach($domainList as $item){
    print_r($item["name"]);
}

// get the status code of the request
$result->getStatusCode()

// This is an example of the retrieved $domanList
// Array(
//     [stid] => 20200625-app3-dev-4752
//     [status] => Array
//         (
//             [code] => S0105
//             [text] => Domain-Daten wurden erfolgreich ermittelt.
//             [type] => SUCCESS
//         )
//     [object] => Array
//         (
//             [type] => Domain
//             [summary] => 2
//         )
//     [data] => Array
//         (
//             [0] => Array
//                 (
//                     [created] => 2019-09-12T10:31:00.000+0200
//                     [updated] => 2020-06-23T16:36:41.000+0200
//                     [owner] => Array
//                         (
//                             [context] => 797095
//                             [user] => user
//                         )
//                     [name] => example.com
//                 )
//         )
// )
```
