# Domainstudio

::: unobtrusive-info
The DomainStudio search generates a list of domain names from several selected sources and adds further data to the search results.
:::

General call of tasks:

```php
 // returns an array of DomainRobot/Models/Envelope
 $suggestions = $domainrobot->domainStudio->search($domainEnvelopeSearchRequest);
```

List of all available tasks with linked examples:

* [search](https://github.com/InterNetX/php-domainrobot-sdk/blob/master/example/domainstudio/DomainStudioSearch.php)(DomainEnvelopeSearchRequest $domainEnvelopeSearchRequest)

::: tip Additional information

You can also find a more extensive documentation of the DomainStudio API here:

[https://help.internetx.com/display/APIADDITIONALEN/DomainStudio+Guide](https://help.internetx.com/display/APIADDITIONALEN/DomainStudio+Guide)
::: 