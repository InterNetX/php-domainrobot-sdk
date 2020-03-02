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

    /**
     *
     * @param DomainRobotConfig $domainRobotConfig
     */
    public function __construct(DomainRobotConfig $domainRobotConfig)
    {
        parent::__construct($domainRobotConfig);
    }

    /**
     * Answer a transfer for the given domain with the given answer.
     *
     * @param [string] $domain
     * @param [string] $type
     * @return TransferOut
     */
    public function answer($domain, $answer)
    {
        $domainRobotPromise = $this->answerAsync($domain, $answer);
        $domainRobotResult = $domainRobotPromise->wait();

        DomainRobot::setLastDomainRobotResult($domainRobotResult);

        return new TransferOut(ArrayHelper::getValueFromArray($domainRobotResult->getResult(), 'data.0', []));
    }

    /**
     * Answer a transfer for the given domain with the given answer.
     *
     * @param [string] $domain,
     * @param [string] $answer
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
            'PUT'
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
     * @param Query $body
     * @return TransferOut[]
     */
    public function list(Query $body = null)
    {
        $domainRobotPromise = $this->listAsync($body);
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
     * @param Query $body
     * @return DomainRobotPromise
     */
    public function listAsync(Query $body = null)
    {
        $data = null;
        if ($body != null) {
            $data = $body->toArray(true);
        }
        return new DomainRobotPromise($this->sendRequest(
            $this->domainRobotConfig->getUrl() . "/transferout/_search",
            'POST',
            ["json" => $data]
        ));
    }
}
