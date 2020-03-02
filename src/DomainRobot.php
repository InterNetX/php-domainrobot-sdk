<?php

namespace IXDomainRobot;

use IXDomainRobot\Lib\DomainRobotConfig;
use IXDomainRobot\Service\CertificateService;
use IXDomainRobot\Service\DomainStudioService;
use IXDomainRobot\Service\DomainService;
use IXDomainRobot\Service\SslContactService;
use IXDomainRobot\Service\ContactService;
use IXDomainRobot\Service\DomainCancelationService;
use IXDomainRobot\Service\TransferOutService;
use IXDomainRobot\Service\TrustedApplicationService;
use IXDomainRobot\Service\ZoneService;
use IXDomainRobot\Service\PollMessageService;

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
        $certificate = new CertificateService($this->domainRobotConfig);
        $domainStudio = new DomainStudioService($this->domainRobotConfig);
        $domain = new DomainService($this->domainRobotConfig);
        $sslContact = new SslContactService($this->domainRobotConfig);
        $contact = new ContactService($this->domainRobotConfig);
        $domainCancelation = new DomainCancelationService($this->domainRobotConfig);
        $poll = new PollMessageService($this->domainRobotConfig);
        $transferOut = new TransferOutService($this->domainRobotConfig);
        $trustedApp = new TrustedApplicationService($this->domainRobotConfig);
        $zone = new ZoneService($this->domainRobotConfig);
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
