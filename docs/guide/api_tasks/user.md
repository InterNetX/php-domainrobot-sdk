# User

General call of tasks:

```php
 $objectJob = $domainrobot->user->info($user, $context);
```

List of all available tasks with linked examples:

* create(User $user)
* info(string $user, int $context) [example](https://github.com/InterNetX/php-domainrobot-sdk/blob/master/example/user/UserInfo.php)
* update(User $user)
* delete(string $user, int $context)
* list(Query $query = null) [example](https://github.com/InterNetX/php-domainrobot-sdk/blob/master/example/user/UserList.php)
* billingObjectLimitInfo(array $keys = [], array $articleTypes = [])
* billingObjectTermsInfo()
* updateLock(string $user, int $context, array $keys = [])
* updateUnlock(string $user, int $context, array $keys = [])
* copy(string $user, string $context, User $user)
* profileInfo(string $user, string $context, $prefix = '')
* profileUpdate(string $user, string $context, UserProfileViews $userProfileViews)
* serviceProfileInfo(string $user, string $context, $prefix = '')
* serviceProfileUpdate(string $user, string $context, ServiceProfiles $serviceProfiles)
