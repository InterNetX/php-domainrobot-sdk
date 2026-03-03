# Contact 

General call of tasks:

```php
 $objectJob = $domainrobot->contact->create($contact);
```

List of all available tasks with linked examples:

* [create](https://github.com/InterNetX/php-domainrobot-sdk/blob/master/example/contact/ContactCreate.php)(Contact $contact)
* [update](https://github.com/InterNetX/php-domainrobot-sdk/blob/master/example/contact/ContactUpdate.php)(Contact $contact)
* [delete](https://github.com/InterNetX/php-domainrobot-sdk/blob/master/example/contact/ContactDelete.php)(int $contactID)
* [info](https://github.com/InterNetX/php-domainrobot-sdk/blob/master/example/contact/ContactInfo.php)(int $contactID)
* [list](https://github.com/InterNetX/php-domainrobot-sdk/blob/master/example/contact/ContactList.php)(Query $query = null)
* [verificationCreate](https://github.com/InterNetX/php-domainrobot-sdk/blob/master/example/contact/ContactVerificationCreate.php)(int $contactID)
* [verificationResendEmail](https://github.com/InterNetX/php-domainrobot-sdk/blob/master/example/contact/ContactVerificationResendEmail.php)(int $contactID)