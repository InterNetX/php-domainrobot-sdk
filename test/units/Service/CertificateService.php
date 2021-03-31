<?php

namespace Domainrobot\Service\tests\units;

use atoum;

use Domainrobot\Model\Certificate;
use Domainrobot\Model\CertificateData;


require_once 'test/AtoumTestSuite.php';

class CertificateService extends atoum
{
    use \TestSuite\AtoumTestSuite;

    public function testCertificateCreate()
    {
        $this
            // basic setup
            ->given($certificateService = $this->newTestedInstance($this->getDomainRobotConfig()))
            
            ->then // start main test
            ->given($certificate = new Certificate($this->loadMockDataAsArray("Certificate/PrepareOrderCertificateModel.json")))
            
            ->then // test created certificate properties
                ->string($certificate->getName())
                    ->isEqualTo("junkdragons.de")
                    ->boolean(get_class($certificate->getLifetime()) === "Domainrobot\Model\TimePeriod")
                    ->isEqualTo(true)

            ->then // build actual create request
            ->given($response = $this->loadMockDataAsJsonString("Certificate/CreateResponse.json"))
            ->and($this->registerGuzzleMockHandler($certificateService, [$response]))
                ->if($job = $certificateService->create($certificate))
                    ->then // test response if create was successful
                        ->boolean(get_class($job) === "Domainrobot\Model\ObjectJob")
                            ->isEqualTo(true)
                        ->integer($job->getJob()->getId())
                            ->isEqualTo(4297939738)
        ;

    }

    public function testPrepareOrder(){
        $this
            // basic setup
            ->given($certificateService = $this->newTestedInstance($this->getDomainRobotConfig()))
            
            ->then // start main test
            ->given($certificateData = new CertificateData($this->loadMockDataAsArray("Certificate/PrepareOrderCertificateModel.json")))

            ->then // test created certificateData properties
                ->string($certificateData->getName())
                    ->isEqualTo("junkdragons.de")
                ->string($certificateData->getPlain())
                    ->isEqualTo($this->loadMockDataAsArray("Certificate/PrepareOrderCertificateModel.json")["plain"])
            
            ->then // build actual create request
            ->given($response = $this->loadMockDataAsJsonString("Certificate/PrepareOrderResponse.json"))
            ->and($this->registerGuzzleMockHandler($certificateService, [$response]))
                ->if($certificateData = $certificateService->prepareOrder($certificateData))
                    ->then // test response if prepare was successful
                        ->boolean(get_class($certificateData) === "Domainrobot\Model\CertificateData")
                            ->isEqualTo(true)
                        ->string($certificateData->getName())
                            ->isEqualTo("junkdragons.de")
                        ->array($certificateData->getAuthentication())
                            ->values
                            ->object[0]
                                ->isInstanceOf("Domainrobot\Model\CertAuthentication")
        ;
    }
}
