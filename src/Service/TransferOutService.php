<?php

namespace Domainrobot\Service;

use Domainrobot\Domainrobot;
use Domainrobot\Lib\ArrayHelper;
use Domainrobot\Lib\DomainrobotConfig;
use Domainrobot\Lib\DomainrobotPromise;
use Domainrobot\Model\Query;
use Domainrobot\Model\TransferAnswer;
use Domainrobot\Model\TransferOut;
use Domainrobot\Service\DomainrobotService;
use InvalidArgumentException;

class TransferOutService extends DomainrobotService
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
     * Answer a transfer for the given domain with the given answer.
     * 
     * The following values are possible for $answer argument :
     * 
     * * TRANSFER_OUT_ACK
     * * TRANSFER_OUT_NACK
     * 
     * or use the TransferAnswer class.
     * 
     * The following values are possible for the $reason argument :
     * 
     * * 1 = Evidence of fraud
     * * 2 = Current UDRP action
     * * 3 = Court order
     * * 4 = Identity dispute
     * * 5 = No payment for previous registration period
     * * 6 = Express written objection to the transfer from the transfer contact. 
     *
     * @param string $domain,
     * @param string $answer
     * @param int reason
     * @return TransferOut
     */
    public function answer($domain, $answer, $reason = null)
    {
        $domainrobotPromise = $this->answerAsync($domain, $answer);
        $domainrobotResult = $domainrobotPromise->wait();

        Domainrobot::setLastDomainrobotResult($domainrobotResult);

        return new TransferOut(ArrayHelper::getValueFromArray($domainrobotResult->getResult(), 'data.0', []));
    }

    /**
     * Answer a transfer for the given domain with the given answer.
     * 
     * The following values are possible for $answer argument :
     * 
     * * TRANSFER_OUT_ACK
     * * TRANSFER_OUT_NACK
     * 
     * or use the TransferAnswer class.
     * 
     * The following values are possible for the $reason argument :
     * 
     * * 1 = Evidence of fraud
     * * 2 = Current UDRP action
     * * 3 = Court order
     * * 4 = Identity dispute
     * * 5 = No payment for previous registration period
     * * 6 = Express written objection to the transfer from the transfer contact. 
     *
     * @param string $domain,
     * @param string $answer
     * @param int reason
     * @return DomainrobotPromise
     */
    public function answerAsync($domain, $answer, $reason = null)
    {
        $transformedAnswer = "";
        if ($answer === TransferAnswer::ACK) {
            $transformedAnswer = "ack";
        } else if($answer === TransferAnswer::NACK){
            $transformedAnswer = "nack";
        } else {
            throw new InvalidArgumentException('Invalid answer value, use constants of the TransferAnswer class.');
        }

        $data = null;
        if ($reason != null) {
            $data = array("nackReason" => $reason);
        }

        return $this->sendRequest(
            $this->domainrobotConfig->getUrl() . "/transferout/$domain/$transformedAnswer",
            'PUT',
            ["json" => $data]
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
     * @param Query|null $body
     * @return TransferOut[]
     */
    public function list(?Query $body = null)
    {
        $domainrobotPromise = $this->listAsync($body);
        $domainrobotResult = $domainrobotPromise->wait();

        Domainrobot::setLastDomainrobotResult($domainrobotResult);

        $data = $domainrobotResult->getResult()['data'];
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
     * @param Query|null $body
     * @return DomainrobotPromise
     */
    public function listAsync(?Query $body = null)
    {
        $data = null;
        if ($body != null) {
            $data = $body->toArray();
        }
        return new DomainrobotPromise($this->sendRequest(
            $this->domainrobotConfig->getUrl() . "/transferout/_search",
            'POST',
            ["json" => $data]
        ));
    }
}

