<?php

namespace Domainrobot\Lib;

use Domainrobot\Lib\ArrayHelper;
use Domainrobot\DomainRobotConstants;


class DomainRobotAuth
{
    /**
     * AutoDNS User
     *
     * @var String
     */
    private $user;
    /**
     * AutoDNS Password
     *
     * @var String
     */
    private $password;
      /**
     * AutoDNS Context
     *
     * @var int
     */
    private $context;

    public function __construct($config = [])
    {
        $this->setUser(ArrayHelper::getValueFromArray($config, 'user', ''));
        $this->setPassword(ArrayHelper::getValueFromArray($config, 'password', ''));
        $this->setContext(ArrayHelper::getValueFromArray($config, 'context', DomainRobotConstants::AUTODNS_CONTEXT));
    }

    private function setUser($user)
    {
        $this->user = $user;
    }
    private function setPassword($password)
    {
        $this->password = $password;
    }
    private function setContext($context)
    {
        $this->context = $context;
    }

    public function getUser() :string
    {
        return $this->user;
    }
    public function getPassword() :string
    {
        return $this->password;
    }
    public function getContext() :int
    {
        return $this->context;
    }

}
