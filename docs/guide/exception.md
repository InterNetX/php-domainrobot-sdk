# Exception handling

::: tip DomainrobotException
If there is any error response from the API, the services will throw a DomainrobotException, which contains information about the error.
:::

Therefore you should call all SDK tasks inside a try/catch block.

## Try/catch example

```php
 try {
    $promise = $domainrobot->certificate->createRealtime($certificate);
}catch(DomainrobotException $exception){
    return response()->json(
        $exception->getError(),
        $exception->getStatusCode()
    );
}
```

The specific **error message** is stored in $exception->error and can be accessed with $exception->getError().

The specific **http status** code can be accessed with $exception->getStatusCode().

## Error message example

```php
Array
(
    [stid] => 20200210-app3-dev-5050
    [messages] => Array
        (
            [0] => Array
                (
                    [text] => Domain validation failed on the CA side.
                    [code] => EF400139
                    [status] => ERROR
                )
        )
    [status] => Array
        (
            [code] => E4001012
            [text] => E4001012
            [type] => ERROR
        )
    [object] => Array
        (
            [type] => Certificate
            [value] => example.com
        )
)
```
