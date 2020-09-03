<?php

namespace Domainrobot;

use Domainrobot\Lib\DomainrobotConfig;
use Domainrobot\Service\CertificateService;
use Domainrobot\Service\DomainStudioService;
use Domainrobot\Service\DomainService;
use Domainrobot\Service\SslContactService;
use Domainrobot\Service\ContactService;
use Domainrobot\Service\DomainCancelationService;
use Domainrobot\Service\TransferOutService;
use Domainrobot\Service\TrustedApplicationService;
use Domainrobot\Service\ZoneService;
use Domainrobot\Service\PollMessageService;
use Domainrobot\Service\UserService;
use Domainrobot\Service\PriceService;
use Domainrobot\Service\JobService;
use Domainrobot\Service\PcDomainsService;
use Domainrobot\Service\RestoreService;

class Domainrobot
{

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
        $this->sslContact = new SslContactService($this->domainrobotConfig);
        $this->contact = new ContactService($this->domainrobotConfig);
        $this->domainCancelation = new DomainCancelationService($this->domainrobotConfig);
        $this->poll = new PollMessageService($this->domainrobotConfig);
        $this->transferOut = new TransferOutService($this->domainrobotConfig);
        $this->trustedApp = new TrustedApplicationService($this->domainrobotConfig);
        $this->zone = new ZoneService($this->domainrobotConfig);
        $this->user = new UserService($this->domainrobotConfig);
        $this->price = new PriceService($this->domainrobotConfig);
        $this->job = new JobService($this->domainrobotConfig);
        $this->restore = new RestoreService($this->domainrobotConfig);
        $this->pcDomains = new PcDomainsService($this->domainrobotConfig);
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
