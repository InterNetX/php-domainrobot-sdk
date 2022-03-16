<?php

namespace Domainrobot;

use Domainrobot\Lib\DomainrobotConfig;
use Domainrobot\Service\CertificateService;
use Domainrobot\Service\DomainStudioService;
use Domainrobot\Service\DomainService;
use Domainrobot\Service\DomainBulkService;
use Domainrobot\Service\SslContactService;
use Domainrobot\Service\ContactService;
use Domainrobot\Service\DomainCancelationService;
use Domainrobot\Service\TransferOutService;
use Domainrobot\Service\TrustedApplicationService;
use Domainrobot\Service\ZoneService;
use Domainrobot\Service\PollMessageService;
use Domainrobot\Service\UserService;
use Domainrobot\Service\User2faService;
use Domainrobot\Service\PriceService;
use Domainrobot\Service\JobService;
use Domainrobot\Service\RestoreService;
use Domainrobot\Service\PcDomainsService;
use Domainrobot\Service\WhoisService;
use Domainrobot\Service\LoginService;
use Domainrobot\Service\DomainPremiumService;
use Domainrobot\Service\RedirectService;
class Domainrobot
{
    // private static $instance = null;

    /**
     *
     * @var DomainrobotConfig
     */
    private $domainrobotConfig;

    private static $lastDomainrobotResult;

    /**
     * Interface for all Certificate related requests
     *
     * @var CertificateService
     */
    public $certificate;

    /**
     * Interface for all DomainStudio related requests
     *
     * @var DomainStudioService
     */
    public $domainStudio;

    /**
     * Interface for all domain related requests
     *
     * @var DomainService
     */
    public $domain;

    /**
     * Interface for Domain Bulk Requests
     *
     * @var DomainBulkService
     */
    public $domainBulk;

    /**
     * Interface for all ssl contact related requests
     *
     * @var SslContactService
     */
    public $sslContact;

    /**
     * Interface for all contact related requests
     *
     * @var ContactService
     */
    public $contact;

    /**
     * Interface for all domain cancelation related requests
     *
     * @var DomainCancelationService
     */
    public $domainCancelation;

    /**
     * Interface for all pollmessage related requests
     *
     * @var PollMessageService
     */
    public $poll;

    /**
     * Interface for all transferOut related requests
     *
     * @var TransferOutService
     */
    public $transferOut;

    /**
     * Interface for all domain trustedApp related requests
     *
     * @var TrustedApplicationService
     */
    public $trustedApp;

    /**
     * Interface for all zone related requests
     *
     * @var ZoneService
     */
    public $zone;

    /**
     * Interface for all user related requests
     *
     * @var UserService
     */
    public $user;

    /**
     * Interface all two factor authentication requests
     *
     * @var UserService
     */
    public $user2fa;

    /**
     * Interface for Accounting Requests
     *
     * @var PriceService
     */
    public $price;

    /**
     * Interface for Job Requests
     *
     * @var JobService
     */
    public $job;

    /**
     * Interface for Restore Requests
     *
     * @var RestoreService
     */
    public $restore;

    /**
     * Interface for pcDomains Requests
     *
     * @var PcDomainsService
     */
    public $pcDomains;

    /**
     * Interface for Whois Requests
     *
     * @var WhoisService
     */
    public $whois;

    /**
     * Interface for Login Requests
     *
     * @var LoginService
     */
    public $login;

    /**
     * Interface for DomainPremium Requests
     *
     * @var DomainPremiumService
     */
    public $domainPremium;

    /**
     * Interface for Redirect Requests
     *
     * @var RedirectService
     */
    public $redirect;

    /**
     * [
     *   "url" => string, //optional
     *   "auth" => DomainrobotAuth //optional
     * ]
     *
     * @param array $domainrobotConfig
     */
    public function __construct($domainrobotConfig = [])
    {
        $this->setDomainrobotConfig(new DomainrobotConfig($domainrobotConfig));
        $this->certificate = new CertificateService($this->domainrobotConfig);
        $this->domainStudio = new DomainStudioService($this->domainrobotConfig);
        $this->domain = new DomainService($this->domainrobotConfig);
        $this->domainBulk = new DomainBulkService($this->domainrobotConfig);
        $this->sslContact = new SslContactService($this->domainrobotConfig);
        $this->contact = new ContactService($this->domainrobotConfig);
        $this->domainCancelation = new DomainCancelationService($this->domainrobotConfig);
        $this->poll = new PollMessageService($this->domainrobotConfig);
        $this->transferOut = new TransferOutService($this->domainrobotConfig);
        $this->trustedApp = new TrustedApplicationService($this->domainrobotConfig);
        $this->zone = new ZoneService($this->domainrobotConfig);
        $this->user = new UserService($this->domainrobotConfig);
        $this->user2fa = new User2faService($this->domainrobotConfig);
        $this->price = new PriceService($this->domainrobotConfig);
        $this->job = new JobService($this->domainrobotConfig);
        $this->restore = new RestoreService($this->domainrobotConfig);
        $this->pcDomains = new PcDomainsService($this->domainrobotConfig);
        $this->whois = new WhoisService($this->domainrobotConfig);
        $this->login = new LoginService($this->domainrobotConfig);
        $this->domainPremium = new DomainPremiumService($this->domainrobotConfig);
        $this->redirect = new RedirectService($this->domainrobotConfig);
    }

    public function setDomainrobotConfig(DomainrobotConfig $domainrobotConfig)
    {
        $this->domainrobotConfig = $domainrobotConfig;
    }
    
    public function getDomainrobotConfig()
    {
        return $this->domainrobotConfig;
    }

    public static function setLastDomainrobotResult($lastDomainrobotResult)
    {
        self::$lastDomainrobotResult = $lastDomainrobotResult;
    }

    public static function getLastDomainrobotResult()
    {
        return self::$lastDomainrobotResult;
    }
}
