<?php

namespace Domainrobot\tests\units;

use atoum;

require_once 'test/AtoumTestSuite.php';

class Domainrobot extends atoum
{
    use \TestSuite\AtoumTestSuite;

    public function testDomainrobotInstances()
    {
        $this
            // basic setup
            ->given($domainRobot = $this->newTestedInstance($this->getDomainRobotConfig(_AS_ARRAY)))

            ->then // test domainrobot instance properties and service creators
                ->boolean(get_class($domainRobot->certificate) === "Domainrobot\Service\CertificateService")
                    ->isEqualTo(true)
                ->boolean(get_class($domainRobot->domainStudio) === "Domainrobot\Service\DomainStudioService")
                    ->isEqualTo(true)
                ->boolean(get_class($domainRobot->domain) === "Domainrobot\Service\DomainService")
                    ->isEqualTo(true)
                ->boolean(get_class($domainRobot->domainBulk) === "Domainrobot\Service\DomainBulkService")
                    ->isEqualTo(true)
                ->boolean(get_class($domainRobot->sslContact) === "Domainrobot\Service\SslContactService")
                    ->isEqualTo(true)
                ->boolean(get_class($domainRobot->contact) === "Domainrobot\Service\ContactService")
                    ->isEqualTo(true)
                ->boolean(get_class($domainRobot->domainCancelation) === "Domainrobot\Service\DomainCancelationService")
                    ->isEqualTo(true)
                ->boolean(get_class($domainRobot->poll) === "Domainrobot\Service\PollMessageService")
                    ->isEqualTo(true)
                ->boolean(get_class($domainRobot->transferOut) === "Domainrobot\Service\TransferOutService")
                    ->isEqualTo(true)
                ->boolean(get_class($domainRobot->trustedApp) === "Domainrobot\Service\TrustedApplicationService")
                    ->isEqualTo(true)
                ->boolean(get_class($domainRobot->zone) === "Domainrobot\Service\ZoneService")
                    ->isEqualTo(true)
                ->boolean(get_class($domainRobot->user) === "Domainrobot\Service\UserService")
                    ->isEqualTo(true)
                ->boolean(get_class($domainRobot->user2fa) === "Domainrobot\Service\User2faService")
                    ->isEqualTo(true)
                ->boolean(get_class($domainRobot->price) === "Domainrobot\Service\PriceService")
                    ->isEqualTo(true)
                ->boolean(get_class($domainRobot->job) === "Domainrobot\Service\JobService")
                    ->isEqualTo(true)
                ->boolean(get_class($domainRobot->restore) === "Domainrobot\Service\RestoreService")
                    ->isEqualTo(true)
                ->boolean(get_class($domainRobot->pcDomains) === "Domainrobot\Service\PcDomainsService")
                    ->isEqualTo(true)
                ->boolean(get_class($domainRobot->whois) === "Domainrobot\Service\WhoisService")
                    ->isEqualTo(true)
        ;
    }

    public function testGetDomainrobotConfig()
    {
         $this
            // basic setup
            ->given($domainRobot = $this->newTestedInstance($this->getDomainRobotConfig(_AS_ARRAY)))
            ->then // test domainrobot config properties
                ->boolean(get_class($domainRobot->getDomainrobotConfig()) === "Domainrobot\Lib\DomainrobotConfig")
                    ->isEqualTo(true)
                ->string($domainRobot->getDomainrobotConfig()->getUrl())
                    ->isEqualTo("api.autodns.com")
                ->boolean(get_class($domainRobot->getDomainrobotConfig()->getAuth()) === "Domainrobot\Lib\DomainrobotAuth")
                    ->isEqualTo(true)
                ->string($domainRobot->getDomainrobotConfig()->getAuth()->getUser())
                    ->isEqualTo("user")
                ->string($domainRobot->getDomainrobotConfig()->getAuth()->getPassword())
                    ->isEqualTo("pass")
                ->integer($domainRobot->getDomainrobotConfig()->getAuth()->getContext())
                    ->isEqualTo(1)
                ->boolean($domainRobot->getDomainrobotConfig()->hasLogRequestCallback())
                    ->isEqualTo(false)
                ->boolean($domainRobot->getDomainrobotConfig()->hasLogResponseCallback())
                    ->isEqualTo(false)

            ->then // test updated domainrobot config properties
            ->given($domainRobot->getDomainrobotConfig()->setLogRequestCallback(function(){}))
                ->boolean($domainRobot->getDomainrobotConfig()->hasLogRequestCallback())
                    ->isEqualTo(true)
        ;

    }
}
