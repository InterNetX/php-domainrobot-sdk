# PC Domains

General call of tasks:

```php
 $apiEstimationResponse = $domainrobot->pcDomains->estimation($estimation);
```

List of all available tasks with linked examples:

* [estimation](https://github.com/InterNetX/php-domainrobot-sdk/blob/master/example/pc_domains/Estimation.php)(Estimation $estimation)
* [alexa](https://github.com/InterNetX/php-domainrobot-sdk/blob/master/example/pc_domains/Alexa.php)(string $domain) 
* [keyword](https://github.com/InterNetX/php-domainrobot-sdk/blob/master/example/pc_domains/Keyword.php)(Keywords $keywords)
* [meta](https://github.com/InterNetX/php-domainrobot-sdk/blob/master/example/pc_domains/Meta.php)(string $domain)
* [sistrix](https://github.com/InterNetX/php-domainrobot-sdk/blob/master/example/pc_domains/Sistrix.php)(string $domain, string $country)
  * $country: [ISO Code](https://de.wikipedia.org/wiki/ISO-3166-1-Kodierliste) (ISO-3166 ALPHA-2)
* [majestic](https://github.com/InterNetX/php-domainrobot-sdk/blob/master/example/pc_domains/Majestic.php)(Domains $domains)
* [smuCheck](https://github.com/InterNetX/php-domainrobot-sdk/blob/master/example/pc_domains/SocialMediaUsernameCheck.php)(string $username)
* [wayback](https://github.com/InterNetX/php-domainrobot-sdk/blob/master/pc_domains/Wayback.php)(string $domain)
