<?php

namespace IXDomainRobot\Service;

use IXDomainRobot\Lib\DomainRobotConfig;
use IXDomainRobot\Model\Certificate;
use IXDomainRobot\Model\CertificateData;
use IXDomainRobot\Service\DomainRobotService;

class CertificateService extends DomainRobotService
{
    private $certificateModel;

    /**
     *
     * @param Certificate $certificateModel
     * @param DomainRobotConfig $domainRobotConfig
     */
    public function __construct(Certificate $certificateModel, DomainRobotConfig $domainRobotConfig)
    {
        parent::__construct($domainRobotConfig);
        $this->certificateModel = $certificateModel;
    }

    /**
     * Order or renew a certificate in realtime. Only supported by a few certificate products!
     *
     * @return GuzzleHttp\Promise\PromiseInterface $promise
     */
    public function createRealtime()
    {
        $this->prepareCsr();

        return $this->sendPostRequest(
            $this->domainRobotConfig->getUrl()."/certificate/_realtime",
            $this->certificateModel->toArray(true)
        );      
    }
    /**
     * Prepare a certificate order. This call checks the csr and generates authentication data required for further calls like order, renew, reissue, revoke, delete.
     *
     * @return GuzzleHttp\Promise\PromiseInterface
     */
    public function prepareOrder()
    {
        $this->prepareCsr();

        $certDataModel = new CertificateData();       
        $certDataModel->setPlain($this->certificateModel->getCsr());

        return $this->sendPostRequest(
            $this->domainRobotConfig->getUrl()."/certificate/_prepareOrder",
            $certDataModel->toArray(true)
        );
    }

    /**
     * make sure the csr has the right format
     */
    private function prepareCsr()
    {
        preg_match(
            "/^(-----BEGIN CERTIFICATE REQUEST-----)(.*)(-----END CERTIFICATE REQUEST-----)$/",
            trim($this->certificateModel->getCsr()),
            $matches
        );
        if (!empty($matches)) {
            $this->certificateModel->setCsr(implode("\n", [
                $matches[1],
                $matches[2],
                $matches[3]
            ]));
        }
    }
}
