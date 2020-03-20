<?php

namespace Domainrobot;

use Domainrobot\Lib\DomainRobotConfig;
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

class DomainRobot
{

    /**
     *
     * @var DomainRobotConfig
     */
    private $domainRobotConfig;

    private static $lastDomainRobotResult;

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
     * [
     *   "url" => string, //optional
     *   "auth" => DomainRobotAuth //optional
     * ]
     *
     * @param array $domainRobotConfig
     */
    public function __construct($domainRobotConfig = [])
    {
        $this->setDomainRobotConfig(new DomainRobotConfig($domainRobotConfig));
        $this->certificate = new CertificateService($this->domainRobotConfig);
        $this->domainStudio = new DomainStudioService($this->domainRobotConfig);
        $this->domain = new DomainService($this->domainRobotConfig);
        $this->sslContact = new SslContactService($this->domainRobotConfig);
        $this->contact = new ContactService($this->domainRobotConfig);
        $this->domainCancelation = new DomainCancelationService($this->domainRobotConfig);
        $this->poll = new PollMessageService($this->domainRobotConfig);
        $this->transferOut = new TransferOutService($this->domainRobotConfig);
        $this->trustedApp = new TrustedApplicationService($this->domainRobotConfig);
        $this->zone = new ZoneService($this->domainRobotConfig);
    }

    public function setDomainRobotConfig(DomainRobotConfig $domainRobotConfig)
    {
        $this->domainRobotConfig = $domainRobotConfig;
    }

    public static function setLastDomainRobotResult($lastDomainRobotResult)
    {
        self::$lastDomainRobotResult = $lastDomainRobotResult;
    }

    public static function getLastDomainRobotResult()
    {
        return self::$lastDomainRobotResult;
    }
}
