<?php

namespace Domainrobot\Service;

use Domainrobot\Domainrobot;
use Domainrobot\Lib\ArrayHelper;
use Domainrobot\Lib\DomainrobotConfig;
use Domainrobot\Lib\DomainrobotPromise;
use Domainrobot\Model\Query;
use Domainrobot\Model\TrustedApplication;
use Domainrobot\Service\DomainrobotService;

class TrustedApplicationService extends DomainrobotService
{


    /**
     *
     * @param DomainrobotConfig $domainrobotConfig
     */
    public function __construct(DomainrobotConfig $domainrobotConfig)
    {
        parent::__construct($domainrobotConfig);
    }

    /**
     * Sends a TrustedApplication create request.
     *
     * @param TrustedApplication $body
     * @return TrustedApplication
     */
    public function create(TrustedApplication $body)
    {
        $domainrobotPromise = $this->createAsync($body);
        $domainrobotResult = $domainrobotPromise->wait();

        Domainrobot::setLastDomainrobotResult($domainrobotResult);

        return new TrustedApplication(ArrayHelper::getValueFromArray($domainrobotResult->getResult(), 'data.0', []));
    }

    /**
     * Sends a TrustedApplication create request.
     *
     * @param TrustedApplication $body
     * @return DomainrobotPromise
     */
    public function createAsync(TrustedApplication $body)
    {
        return $this->sendRequest(
            $this->domainRobotConfig->getUrl() . "/trustedapp",
            'POST',
            ["json" => $body->toArray(true)]
        );
    }

    /**
     *  Sends a TrustedApplication list request.
     * 
     * The following keys can be used for filtering, ordering or fetching additional
     * data via query parameter:
     *
     * * created
     * * comment
     * * uuid
     * * device
     * * updated
     * * application
     *
     * @return TrustedApplication[]
     */
    public function list(Query $query = null)
    {
        $domainrobotPromise = $this->listAsync($query);
        $domainrobotResult = $domainrobotPromise->wait();

        Domainrobot::setLastDomainrobotResult($domainrobotResult);
        $data = $domainrobotResult->getResult()['data'];
        $trustedApps = array();
        foreach ($data as $d) {
            $t = new TrustedApplication($d);
            array_push($trustedApps, $t);
        }
        return $trustedApps;
    }

    /**
     *  Sends a TrustedApplication list request.
     * 
     * The following keys can be used for filtering, ordering or fetching additional
     * data via query parameter:
     *
     * * created
     * * comment
     * * uuid
     * * device
     * * updated
     * * application
     *
     * @return DomainrobotPromise
     */
    public function listAsync(Query $query = null)
    {
        $body = null;
        if ($query != null) {
            $body = $query->toArray(true);
        }
        return new DomainrobotPromise($this->sendRequest(
            $this->domainRobotConfig->getUrl() . "/trustedapp/_search",
            'POST',
            ["json" => $body]
        ));
    }

    /**
     * Sends a TrustedApplication info request.
     *
     * @param [int] $id
     * @return TrustedApplication
     */
    public function info($id)
    {
        $domainrobotPromise = $this->infoAsync($id);
        $domainrobotResult = $domainrobotPromise->wait();


        return new TrustedApplication(ArrayHelper::getValueFromArray($domainrobotResult->getResult(), 'data.0', []));
    }

    /**
     * Sends a TrustedApplication info request.
     *
     * @param [int] $id
     * @return DomainrobotPromise
     */
    public function infoAsync($id)
    {
        return $this->sendRequest(
            $this->domainRobotConfig->getUrl() . "/trustedapp/$id",
            'GET'
        );
    }

    /**
     * Sends a TrustedApplication delete request.
     *
     * @param [int] $id
     * @return
     */
    public function delete($id)
    {
        $domainrobotPromise = $this->deleteAsync($id);
        $domainrobotResult = $domainrobotPromise->wait();

        Domainrobot::setLastDomainrobotResult($domainrobotResult);
    }


    /**
     * Sends a TrustedApplication delete request.
     *
     * @param [int] $id
     * @return DomainrobotPromise
     */
    public function deleteAsync($id)
    {
        return $this->sendRequest(
            $this->domainRobotConfig->getUrl() . "/trustedapp/$id",
            'DELETE'
        );
    }

    /**
     * Sends a TrustedApplication update request.
     *
     * @param TrustedApplication $body
     * @return TrustedApplication
     */
    public function update(TrustedApplication $body)
    {
        $domainrobotPromise = $this->updateAsync($body);
        $domainrobotResult = $domainrobotPromise->wait();

        Domainrobot::setLastDomainrobotResult($domainrobotResult);
    }

    /**
     * Sends a TrustedApplication update request.
     *
     * @param TrustedApplication $body
     * @return DomainrobotPromise
     */
    public function updateAsync(TrustedApplication $body)
    {
        if ($body->getId() === null) {
            throw InvalidArgumentException("Field TrustedApplication.id is missing.");
        }
        $this->sendRequest(
            $this->domainRobotConfig->getUrl() . "/trustedapp/".$body->getId(),
            'PUT',
            ["json" => $this->trustedApplicationModel->toArray(true)]
        );
    }
}
