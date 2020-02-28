<?php

namespace IXDomainRobot\Service;

use IXDomainRobot\DomainRobot;
use IXDomainRobot\Lib\ArrayHelper;
use IXDomainRobot\Lib\DomainRobotConfig;
use IXDomainRobot\Lib\DomainRobotPromise;
use IXDomainRobot\Model\Query;
use IXDomainRobot\Model\DomainCancelation;
use IXDomainRobot\Model\TransferAnswer;
use IXDomainRobot\Model\TransferOut;
use IXDomainRobot\Service\DomainRobotService;

class TransferOutService extends DomainRobotService
{
    private $transferOutModel;

    /**
     *
     * @param TransferOut $transferOutModel
     * @param DomainRobotConfig $domainRobotConfig
     */
    public function __construct(TransferOut $transferOutModel, DomainRobotConfig $domainRobotConfig)
    {
        parent::__construct($domainRobotConfig);
        $this->transferOutModel = $transferOutModel;
    }

    /**
     * Answer a transfer for the given domain with the given answer.
     *
     * @param [string] $domain
     * @param [string] $type
     * @return TransferOut
     */
    public function answer($domain, TransferAnswer $answer)
    {
        $domainRobotPromise = $this->answerAsync($domain, $answer);
        $domainRobotResult = $domainRobotPromise->wait();

        DomainRobot::setLastDomainRobotResult($domainRobotResult);

        return new TransferOut(ArrayHelper::getValueFromArray($domainRobotResult->getResult(), 'data.0', []));
    }

    /**
     * Answer a transfer for the given domain with the given answer.
     *
     * @param [string] $domain
     * @param [string] $type
     * @return DomainRobotPromise
     */
    public function answerAsync($domain, $answer)
    {

        $transformedAnswer = "";
        if ($answer === TransferAnswer::ACK) {
            $transformedAnswer = "ack";
        } else {
            $transformedAnswer = "nack";
        }

        return $this->sendRequest(
            $this->domainRobotConfig->getUrl() . "/transferout/$domain/$transformedAnswer",
            'PUT',
            ["json" => $this->transferOutModel->toArray(true)]
        );
    }

    /**
     * Sends a TransferOut list request.
     * 
     * The following keys can be used for filtering, ordering or fetching additional
     * data via query parameter:
     * 
     * * reminder
     * * created
     * * loosingRegistrar
     * * start
     * * sld
     * * tld
     * * type
     * * subtld
     * * end
     * * gainingRegistrar
     * * id
     * * updated
     * * transaction
     * * status
     *
     * @return TransferOut[]
     */
    public function list(Query $query = null)
    {
        $domainRobotPromise = $this->listAsync($query);
        $domainRobotResult = $domainRobotPromise->wait();

        DomainRobot::setLastDomainRobotResult($domainRobotResult);
        $data = $domainRobotResult->getResult()['data'];
        $transferOuts = array();
        foreach ($data as $d) {
            $t = new TransferOut($d);
            array_push($transferOuts, $t);
        }
        return $transferOuts;
    }

    /**
     * Sends a TransferOut list request.
     * 
     * The following keys can be used for filtering, ordering or fetching additional
     * data via query parameter:
     * 
     * * reminder
     * * created
     * * loosingRegistrar
     * * start
     * * sld
     * * tld
     * * type
     * * subtld
     * * end
     * * gainingRegistrar
     * * id
     * * updated
     * * transaction
     * * status
     *
     * @return DomainRobotPromise
     */

    public function listAsync(Query $query = null)
    {
        if ($query === null) {
            return new DomainRobotPromise($this->sendRequest(
                $this->domainRobotConfig->getUrl() . "/transferout/_search",
                'POST',
                ["json" => null]
            ));
        } else {
            return new DomainRobotPromise($this->sendRequest(
                $this->domainRobotConfig->getUrl() . "/transferout/_search",
                'POST',
                ["json" => $query->toArray(true)]
            ));
        }
    }
}
