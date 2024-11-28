<?php

namespace Domainrobot\Service;

use Domainrobot\Domainrobot;
use Domainrobot\Lib\ArrayHelper;
use Domainrobot\Lib\DomainrobotConfig;
use Domainrobot\Lib\DomainrobotPromise;
use Domainrobot\Model\BasicUser;
use Domainrobot\Model\BillingObjectLimit;
use Domainrobot\Model\BillingTerm;
use Domainrobot\Model\JsonNoData;
use Domainrobot\Model\Query;
use Domainrobot\Model\ServiceProfiles;
use Domainrobot\Model\ServiceUsersProfile;
use Domainrobot\Model\User;
use Domainrobot\Model\UserProfile;
use Domainrobot\Model\UserProfileViews;
use Domainrobot\Service\DomainrobotService;

class UserService extends DomainrobotService
{

    /**
     * @param DomainrobotConfig $domainrobotConfig
     */
    public function __construct(DomainrobotConfig $domainrobotConfig)
    {
        parent::__construct($domainrobotConfig);
    }

    /**
     * Create an User
     * 
     * @param User $body
     * @return User
     */
    public function create(User $body)
    {
        $domainrobotPromise = $this->createAsync($body);
        $domainrobotResult = $domainrobotPromise->wait();

        Domainrobot::setLastDomainrobotResult($domainrobotResult);

        return new User(ArrayHelper::getValueFromArray($domainrobotResult->getResult(), 'data.0', []));
    }

    /**
     * Create an User
     * 
     * @param User $body
     * @return DomainrobotPromise
     */
    public function createAsync(User $body)
    {
        return $this->sendRequest(
            $this->domainrobotConfig->getUrl() . "/user",
            'POST',
            ["json" => $body->toArray()]
        );
    }

    /**
     * Sends a User info request
     *
     * @param string $user
     * @param integer $context
     * @return User
     */
    public function info($user, $context)
    {
        $domainrobotPromise = $this->infoAsync($user, $context);
        $domainrobotResult = $domainrobotPromise->wait();

        Domainrobot::setLastDomainrobotResult($domainrobotResult);

        return new User(ArrayHelper::getValueFromArray($domainrobotResult->getResult(), 'data.0', []));
    }

    /**
     * Sends a User info request
     *
     * @param string $user
     * @param integer $context
     * @return DomainrobotPromise
     */
    public function infoAsync($user, $context)
    {
        return $this->sendRequest(
            $this->domainrobotConfig->getUrl() . "/user/" . $user . "/" . $context,
            'GET'
        );
    }

    /**
     * Update an existing User
     * 
     * @param User $body
     * @return User
     */
    public function update(User $body)
    {
        $domainrobotPromise = $this->updateAsync($body);
        $domainrobotResult = $domainrobotPromise->wait();

        Domainrobot::setLastDomainrobotResult($domainrobotResult);

        return new User(ArrayHelper::getValueFromArray($domainrobotResult->getResult(), 'data.0', []));
    }

    /**
     * Update an existing User
     * 
     * @param User $body
     * @return DomainrobotPromise
     */
    public function updateAsync(User $body)
    {
        return $this->sendRequest(
            $this->domainrobotConfig->getUrl() . "/user/" . $body->getUser() . "/" . $body->getContext(),
            'PUT',
            ["json" => $body->toArray()]
        );
    }

    /**
     * Delete an User
     * 
     * @param string $user
     * @param integer $context
     * @return 
     */
    public function delete($user, $context)
    {
        $domainrobotPromise = $this->deleteAsync($user, $context);
        $domainrobotResult = $domainrobotPromise->wait();

        Domainrobot::setLastDomainrobotResult($domainrobotResult);
    }

    /**
     * Delete an User
     * 
     * @param string $user
     * @param integer $context
     * @return DomainrobotPromise
     */
    public function deleteAsync($user, $context)
    {
        return $this->sendRequest(
            $this->domainrobotConfig->getUrl() . "/user/" . $user . "/" . $context,
            'DELETE'
        );
    }

    /**
     * Sends a User list request
     *
     * The following keys can be used for filtering, ordering or fetching additional
     * data via query parameter:
     *
     * * user
     * * context
     *
     * @param Query|null $body
     * @return User[]
     */
    public function list(?Query $body = null)
    {
        $domainrobotPromise = $this->listAsync($body);
        $domainrobotResult = $domainrobotPromise->wait();

        Domainrobot::setLastDomainrobotResult($domainrobotResult);

        $data = $domainrobotResult->getResult()['data'];

        $users = array();
        foreach ($data as $d) {
            $u = new User($d);
            array_push($users, $u);
        }
        
        return $users;
    }

    /**
     * Sends a User list request
     *
     * The following keys can be used for filtering, ordering or fetching additional
     * data via query parameter:
     *
     * * user
     * * context
     *
     * @param Query|null $body
     * @return DomainrobotPromise
     */
    public function listAsync(?Query $body = null)
    {
        $data = null;
        if ($body != null) {
            $data = $body->toArray();
        }

        return new DomainrobotPromise($this->sendRequest(
            $this->domainrobotConfig->getUrl() . "/user/_search",
            'POST',
            ["json" => $data]
        ));
    }

    /**
     * New Password
     *  
     * @param string $token
     * @return JsonNoData
     */
    public function newPassword($token)
    {
        $domainrobotPromise = $this->asyncNewPassword($token);
        $domainrobotResult = $domainrobotPromise->wait();

        Domainrobot::setLastDomainrobotResult($domainrobotResult);

        return new JsonNoData();
    }

    /**
     * New Password
     *  
     * @param string $token
     * @return DomainrobotPromise
     */
    public function asyncNewPassword($token)
    {
        return $this->sendRequest(
            $this->domainrobotConfig->getUrl() . "/user/_newPassword?token=" . $token,
            'PUT'
        );
    }

    /**
     * New Password Verify
     * 
     * @param string $token
     * @return JsonNoData
     */
    public function newPasswordVerify($token)
    {
        $domainrobotPromise = $this->asyncNewPasswordVerify($token);
        $domainrobotResult = $domainrobotPromise->wait();

        Domainrobot::setLastDomainrobotResult($domainrobotResult);

        return new JsonNoData();
    }

    /**
     * New Password Verify
     * 
     * @param string $token
     * @return DomainrobotPromise
     */
    public function asyncNewPasswordVerify($token)
    {
        return $this->sendRequest(
            $this->domainrobotConfig->getUrl() . "/user/_newPasswordVerify?token=" . $token,
            'GET'
        );
    }

    /**
     * SSO Action Verify
     * 
     * @param string $token
     * @return User
     */
    public function ssoPasswordVerify($token)
    {
        $domainrobotPromise = $this->asyncSsoPasswordVerify($token);
        $domainrobotResult = $domainrobotPromise->wait();

        Domainrobot::setLastDomainrobotResult($domainrobotResult);

        return new User(ArrayHelper::getValueFromArray($domainrobotResult->getResult(), 'data.0', []));
    }

    /**
     * SSO Action Verify
     * 
     * @param string $token
     * @return DomainrobotPromise
     */
    public function asyncSsoPasswordVerify($token)
    {
        return $this->sendRequest(
            $this->domainrobotConfig->getUrl() . "/user/_sso/" . $token,
            'GET'
        );
    }

    /**
     * User Action Verify
     * 
     * @param string $token
     * @return User
     */
    public function userActionVerify($token)
    {
        $domainrobotPromise = $this->asyncUserActionVerify($token);
        $domainrobotResult = $domainrobotPromise->wait();

        Domainrobot::setLastDomainrobotResult($domainrobotResult);

        return new User(ArrayHelper::getValueFromArray($domainrobotResult->getResult(), 'data.0', []));
    }

    /**
     * User Action Verify
     * 
     * @param string $token
     * @return DomainrobotPromise
     */
    public function asyncUserActionVerify($token)
    {
        return $this->sendRequest(
            $this->domainrobotConfig->getUrl() . "/user/_verify/" . $token,
            'GET'
        );
    }

    /**
     * Inquiring the Billing Limit for the User
     * 
     * @param array $keys
     * @param array $articleTypes
     * @return BillingObjectLimit[]
     */
    public function billingObjectLimitInfo(array $keys = [], array $articleTypes = [])
    {
        $queryString = '';

        if ( count($keys) > 0 ) {
            $queryString .= '?keys[]=' . implode('&keys[]=', $keys);
        }

        if ( count($articleTypes) > 0 ) {

            if ( $queryString === '' ) {
                $queryString .= '?';
            } else {
                $queryString .= '&';
            }

            $queryString .= 'articleTypes[]=' . implode('&articleTypes[]=', $articleTypes);
        }

        $domainrobotPromise = $this->asyncBillingObjectLimitInfo($queryString);
        $domainrobotResult = $domainrobotPromise->wait();

        Domainrobot::setLastDomainrobotResult($domainrobotResult);

        $billingLimitEntries = ArrayHelper::getValueFromArray($domainrobotResult->getResult(), 'data.0.entries', []);

        $billingLimitObjects = [];
        foreach ( $billingLimitEntries as $billingLimitEntry ) {
            $billingLimitObjects[] = new BillingObjectLimit($billingLimitEntry);
        }

        return $billingLimitObjects;
    }

    /**
     * Inquiring the Billing Limit for the User
     * 
     * @param string $queryString
     * @return DomainrobotPromise
     */
    public function asyncBillingObjectLimitInfo($queryString)
    {
        return $this->sendRequest(
            $this->domainrobotConfig->getUrl() . "/user/billinglimit" . $queryString,
            'GET'
        );
    }

    /**
     * Inquiring the Billing Terms for the User
     * 
     * @return BillingTerm
     */
    public function billingObjectTermsInfo()
    {
        $domainrobotPromise = $this->asyncBillingObjectTermsInfo();
        $domainrobotResult = $domainrobotPromise->wait();

        Domainrobot::setLastDomainrobotResult($domainrobotResult);

        return new BillingTerm(ArrayHelper::getValueFromArray($domainrobotResult->getResult(), 'data.0', []));
    }

    /**
     * Inquiring the Billing Terms for the User
     * 
     * @return DomainrobotPromise
     */
    public function asyncBillingObjectTermsInfo()
    {
        return $this->sendRequest(
            $this->domainrobotConfig->getUrl() . "/user/billingterm",
            'GET'
        );
    }

    /**
     * Lock an User
     * 
     * @param string $user
     * @param string $context
     * @param array $keys
     * @return User
     */
    public function updateLock($user, $context, array $keys = [])
    {
        $keysString = '';
        if ( count($keys) > 0 ) {
            $keysString = '?keys[]=' . implode('&keys[]=', $keys);
        }

        $domainrobotPromise = $this->asyncUpdateLock($user, $context, $keysString);
        $domainrobotResult = $domainrobotPromise->wait();

        Domainrobot::setLastDomainrobotResult($domainrobotResult);

        return new User(ArrayHelper::getValueFromArray($domainrobotResult->getResult(), 'data.0', []));
    }

    /**
     * Lock an User
     * 
     * @param string $user
     * @param string $context
     * @param string $keysString
     * @return DomainrobotPromise
     */
    public function asyncUpdateLock($user, $context, $keysString)
    {
        return $this->sendRequest(
            $this->domainrobotConfig->getUrl() . "/user/" . $user . "/" . $context . "/_lock" . $keysString,
            'PUT'
        );
    }

    /**
     * Unlock an User
     * 
     * @param string $user
     * @param string $context
     * @param array $keys
     * @return User
     */
    public function updateUnlock($user, $context, array $keys = [])
    {
        $keysString = '';
        if ( count($keys) > 0 ) {
            $keysString = '?keys[]=' . implode('&keys[]=', $keys);
        }

        $domainrobotPromise = $this->asyncUpdateLock($user, $context, $keysString);
        $domainrobotResult = $domainrobotPromise->wait();

        Domainrobot::setLastDomainrobotResult($domainrobotResult);

        return new User(ArrayHelper::getValueFromArray($domainrobotResult->getResult(), 'data.0', []));
    }

    /**
     * Unlock an User
     * 
     * @param string $user
     * @param string $context
     * @param string $keysString
     * @return DomainrobotPromise
     */
    public function asyncUpdateUnlock($user, $context, $keysString)
    {
        return $this->sendRequest(
            $this->domainrobotConfig->getUrl() . "/user/" . $user . "/" . $context . "/_unlock" . $keysString,
            'PUT'
        );
    }

    /**
     * User ACL Info
     *
     * @param string $user
     * @param string $context
     * @return User
     */
    public function aclInfo($user, $context)
    {
        $domainrobotPromise = $this->asyncAclInfo($user, $context);
        $domainrobotResult = $domainrobotPromise->wait();

        Domainrobot::setLastDomainrobotResult($domainrobotResult);

        return new User(ArrayHelper::getValueFromArray($domainrobotResult->getResult(), 'data.0', []));
    }

    /**
     * User ACL Info
     * 
     * @param string $user
     * @param string $context
     * @return DomainrobotPromise
     */
    public function asyncAclInfo($user, $context)
    {
        return $this->sendRequest(
            $this->domainrobotConfig->getUrl() . "/user/" . $user . "/" . $context . "/acl",
            'GET'
        );
    }

    /**
     * User ACL Update
     *
     * @param object $body
     * @return User
     */
    public function aclUpdate($body)
    {
        $domainrobotPromise = $this->asyncAclUpdate($body);
        $domainrobotResult = $domainrobotPromise->wait();

        Domainrobot::setLastDomainrobotResult($domainrobotResult);

        return new User(ArrayHelper::getValueFromArray($domainrobotResult->getResult(), 'data.0', []));
    }

    /**
     * User ACL Update
     * 
     * @param object $body 
     * @return DomainrobotPromise
     */
    public function asyncAclUpdate($body)
    {
        return $this->sendRequest(
            $this->domainrobotConfig->getUrl() . "/user/" . $body->user . "/" . $body->context . "/acl",
            'PUT',
            ['json' => $body->toArray()]
        );
    }

    /**
     * Copy an User
     * 
     * @param string $user
     * @param string $context
     * @param User $body
     * @return void
     */
    public function copy($user, $context, User $body)
    {
        $domainrobotPromise = $this->asyncCopy($user, $context, $body);
        $domainrobotResult = $domainrobotPromise->wait();

        Domainrobot::setLastDomainrobotResult($domainrobotResult);
    }

    /**
     * Copy an User
     * 
     * @param string $user
     * @param string $context
     * @param User $body
     * @return DomainrobotPromise
     */
    public function asyncCopy($user, $context, User $body)
    {
        return $this->sendRequest(
            $this->domainrobotConfig->getUrl() . "/user/" . $user . "/" . $context . "/copy",
            'POST',
            ['json' => $body->toArray()]
        );
    }

    /**
     * Get an User Profile Info
     *
     * @param string $user
     * @param string $context
     * @param string $prefix
     * @return UserProfileViews[]
     */
    public function profileInfo($user, $context, $prefix='')
    {
        if ( $prefix !== '' ) {
            $prefix = '/' . $prefix;
        }

        $domainrobotPromise = $this->asyncProfileInfo($user, $context, $prefix);
        $domainrobotResult = $domainrobotPromise->wait();

        Domainrobot::setLastDomainrobotResult($domainrobotResult);

        $profiles = ArrayHelper::getValueFromArray($domainrobotResult->getResult(), 'data.0.profiles', []);

        $userProfiles = [];
        foreach ( $profiles as $profile ) {
            $userProfiles[] = new UserProfile($profile);
        }

        $userProfileViews = new UserProfileViews();
        $userProfileViews->setProfiles($userProfiles);

        return $userProfileViews;
    }

    /**
     * Get an User Profile Info
     * 
     * @param string $user
     * @param string $context
     * @param string $prefix
     * @return DomainrobotPromise
     */
    public function asyncProfileInfo($user, $context, $prefix)
    {
        return $this->sendRequest(
            $this->domainrobotConfig->getUrl() . "/user/" . $user . "/" . $context . "/profile" . $prefix,
            'GET'
        );
    }

    /**
     * Update User Profile Example Request
     *
     * @param string $user
     * @param string $context
     * @param UserProfileViews $body
     * @return void
     */
    public function profileUpdate($user, $context, UserProfileViews $body)
    {
        $domainrobotPromise = $this->asyncProfileUpdate($user, $context, $body);
        $domainrobotResult = $domainrobotPromise->wait();

        Domainrobot::setLastDomainrobotResult($domainrobotResult);
    }

    /**
     * Update User Profile Example Request
     * 
     * @param string $user
     * @param string $context
     * @param UserProfileViews $body
     * @return DomainrobotPromise
     */
    public function asyncProfileUpdate($user, $context, UserProfileViews $body)
    {
        return $this->sendRequest(
            $this->domainrobotConfig->getUrl() . "/user/" . $user . "/" . $context . "/profile",
            'PUT',
            ['json' => $body->toArray()]
        );
    }

    /**
     * Inquiring the User Service Profile
     *
     * @param string $user
     * @param string $context
     * @param string $prefix
     * @return void
     */
    public function serviceProfileInfo($user, $context, $prefix='')
    {
        if ( $prefix !== '' ) {
            $prefix = '/' . $prefix;
        }

        $domainrobotPromise = $this->asyncServiceProfileInfo($user, $context, $prefix);
        $domainrobotResult = $domainrobotPromise->wait();

        Domainrobot::setLastDomainrobotResult($domainrobotResult);

        $profiles = ArrayHelper::getValueFromArray($domainrobotResult->getResult(), 'data.0.serviceProfiles', []);

        $serviceUsersProfiles = [];
        foreach ( $profiles as $profile ) {
            $serviceUsersProfiles[] = new ServiceUsersProfile($profile);
        }

        $serviceProfiles = new ServiceProfiles();
        $serviceProfiles->setServiceProfiles($serviceUsersProfiles);

        return $serviceProfiles;
    }

    /**
     * Inquiring the User Service Profile
     *
     * @param string $user
     * @param string $context
     * @param string $prefix 
     * @return DomainrobotPromise
     */
    public function asyncServiceProfileInfo($user, $context, $prefix)
    {
        return $this->sendRequest(
            $this->domainrobotConfig->getUrl() . "/user/" . $user . "/" . $context . "/serviceProfile" . $prefix,
            'GET'
        );
    }

    /**
     * Update the User Service Profile
     * 
     * @param string $user
     * @param string $context
     * @param ServiceProfiles $body
     * @return ServiceUsersProfile
     */
    public function serviceProfileUpdate($user, $context, ServiceProfiles $body)
    {
        $domainrobotPromise = $this->asyncServiceProfileUpdate($user, $context, $body);
        $domainrobotResult = $domainrobotPromise->wait();

        Domainrobot::setLastDomainrobotResult($domainrobotResult);

        return new ServiceUsersProfile(ArrayHelper::getValueFromArray($domainrobotResult->getResult(), 'data.0', []));
    }

    /**
     * Update the User Service Profile
     * 
     * @param string $user
     * @param string $context
     * @param ServiceProfiles $body
     * @return DomainrobotPromise
     */
    public function asyncServiceProfileUpdate($user, $context, ServiceProfiles $body)
    {
        return $this->sendRequest(
            $this->domainrobotConfig->getUrl() . "/user/" . $user . "/" . $context . "/serviceProfile",
            'PUT',
            ['json' => $body->toArray()]
        );
    }
}

