<?php
/**
 * TransferOut
 *
 * PHP version 5
 *
 * @category Class
 * @package  Domainrobot
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */

/**
 * Domainrobot JSON API
 *
 * Domainrobot JSON API for managing: Domains, SSL            Certificates, DNS and            much more.
 *
 * OpenAPI spec version: v1
 * 
 * Generated by: https://github.com/swagger-api/swagger-codegen.git
 * Swagger Codegen version: 2.4.12-SNAPSHOT
 */

/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace Domainrobot\Model;

use \ArrayAccess;
use \Domainrobot\ObjectSerializer;

/**
 * TransferOut Class Doc Comment
 *
 * @category Class
 * @package  Domainrobot
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class TransferOut implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'TransferOut';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'created' => '\DateTime',
        'updated' => '\DateTime',
        'owner' => '\Domainrobot\Model\BasicUser',
        'updater' => '\Domainrobot\Model\BasicUser',
        'domain' => 'string',
        'gainingRegistrar' => 'string',
        'loosingRegistrar' => 'string',
        'start' => '\DateTime',
        'reminder' => '\DateTime',
        'autoAck' => '\DateTime',
        'autoNack' => '\DateTime',
        'end' => '\DateTime',
        'autoAnswer' => 'bool',
        'recipient' => 'string',
        'mailserver' => 'string',
        'deliveredMailserver' => 'string',
        'delivered' => '\DateTime',
        'transaction' => 'string',
        'type' => '\Domainrobot\Model\TransferAnswer',
        'nackReason' => 'int'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'created' => 'date-time',
        'updated' => 'date-time',
        'owner' => null,
        'updater' => null,
        'domain' => null,
        'gainingRegistrar' => null,
        'loosingRegistrar' => null,
        'start' => 'date-time',
        'reminder' => 'date-time',
        'autoAck' => 'date-time',
        'autoNack' => 'date-time',
        'end' => 'date-time',
        'autoAnswer' => null,
        'recipient' => null,
        'mailserver' => null,
        'deliveredMailserver' => null,
        'delivered' => 'date-time',
        'transaction' => null,
        'type' => null,
        'nackReason' => 'int32'
    ];

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function swaggerTypes()
    {
        return self::$swaggerTypes;
    }

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function swaggerFormats()
    {
        return self::$swaggerFormats;
    }

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'created' => 'created',
        'updated' => 'updated',
        'owner' => 'owner',
        'updater' => 'updater',
        'domain' => 'domain',
        'gainingRegistrar' => 'gainingRegistrar',
        'loosingRegistrar' => 'loosingRegistrar',
        'start' => 'start',
        'reminder' => 'reminder',
        'autoAck' => 'autoAck',
        'autoNack' => 'autoNack',
        'end' => 'end',
        'autoAnswer' => 'autoAnswer',
        'recipient' => 'recipient',
        'mailserver' => 'mailserver',
        'deliveredMailserver' => 'deliveredMailserver',
        'delivered' => 'delivered',
        'transaction' => 'transaction',
        'type' => 'type',
        'nackReason' => 'nackReason'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'created' => 'setCreated',
        'updated' => 'setUpdated',
        'owner' => 'setOwner',
        'updater' => 'setUpdater',
        'domain' => 'setDomain',
        'gainingRegistrar' => 'setGainingRegistrar',
        'loosingRegistrar' => 'setLoosingRegistrar',
        'start' => 'setStart',
        'reminder' => 'setReminder',
        'autoAck' => 'setAutoAck',
        'autoNack' => 'setAutoNack',
        'end' => 'setEnd',
        'autoAnswer' => 'setAutoAnswer',
        'recipient' => 'setRecipient',
        'mailserver' => 'setMailserver',
        'deliveredMailserver' => 'setDeliveredMailserver',
        'delivered' => 'setDelivered',
        'transaction' => 'setTransaction',
        'type' => 'setType',
        'nackReason' => 'setNackReason'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'created' => 'getCreated',
        'updated' => 'getUpdated',
        'owner' => 'getOwner',
        'updater' => 'getUpdater',
        'domain' => 'getDomain',
        'gainingRegistrar' => 'getGainingRegistrar',
        'loosingRegistrar' => 'getLoosingRegistrar',
        'start' => 'getStart',
        'reminder' => 'getReminder',
        'autoAck' => 'getAutoAck',
        'autoNack' => 'getAutoNack',
        'end' => 'getEnd',
        'autoAnswer' => 'getAutoAnswer',
        'recipient' => 'getRecipient',
        'mailserver' => 'getMailserver',
        'deliveredMailserver' => 'getDeliveredMailserver',
        'delivered' => 'getDelivered',
        'transaction' => 'getTransaction',
        'type' => 'getType',
        'nackReason' => 'getNackReason'
    ];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @return array
     */
    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @return array
     */
    public static function setters()
    {
        return self::$setters;
    }

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @return array
     */
    public static function getters()
    {
        return self::$getters;
    }

    /**
     * The original name of the model.
     *
     * @return string
     */
    public function getModelName()
    {
        return self::$swaggerModelName;
    }

    

    

    /**
     * Associative array for storing property values
     *
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Constructor
     *
     * @param mixed[] $data Associated array of property values
     *                      initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->container['created'] = isset($data['created']) ? $data['created'] : null;
        $this->container['updated'] = isset($data['updated']) ? $data['updated'] : null;
        $this->container['owner'] = isset($data['owner']) ? $data['owner'] : null;
        $this->container['updater'] = isset($data['updater']) ? $data['updater'] : null;
        $this->container['domain'] = isset($data['domain']) ? $data['domain'] : null;
        $this->container['gainingRegistrar'] = isset($data['gainingRegistrar']) ? $data['gainingRegistrar'] : null;
        $this->container['loosingRegistrar'] = isset($data['loosingRegistrar']) ? $data['loosingRegistrar'] : null;
        $this->container['start'] = isset($data['start']) ? $data['start'] : null;
        $this->container['reminder'] = isset($data['reminder']) ? $data['reminder'] : null;
        $this->container['autoAck'] = isset($data['autoAck']) ? $data['autoAck'] : null;
        $this->container['autoNack'] = isset($data['autoNack']) ? $data['autoNack'] : null;
        $this->container['end'] = isset($data['end']) ? $data['end'] : null;
        $this->container['autoAnswer'] = isset($data['autoAnswer']) ? $data['autoAnswer'] : null;
        $this->container['recipient'] = isset($data['recipient']) ? $data['recipient'] : null;
        $this->container['mailserver'] = isset($data['mailserver']) ? $data['mailserver'] : null;
        $this->container['deliveredMailserver'] = isset($data['deliveredMailserver']) ? $data['deliveredMailserver'] : null;
        $this->container['delivered'] = isset($data['delivered']) ? $data['delivered'] : null;
        $this->container['transaction'] = isset($data['transaction']) ? $data['transaction'] : null;
        $this->container['type'] = isset($data['type']) ? $data['type'] : null;
        $this->container['nackReason'] = isset($data['nackReason']) ? $data['nackReason'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if ($this->container['domain'] === null) {
            $invalidProperties[] = "'domain' can't be null";
        }
        if ($this->container['type'] === null) {
            $invalidProperties[] = "'type' can't be null";
        }
        return $invalidProperties;
    }

    /**
     * Validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properties are valid
     */
    public function valid()
    {
        return count($this->listInvalidProperties()) === 0;
    }


    /**
     * Gets created
     *
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->container['created'];
    }

    /**
     * Sets created
     *
     * @param \DateTime $created The created date.
     *
     * @return $this
     */
    public function setCreated($created)
    {
        $this->container['created'] = $created;

        return $this;
    }

    /**
     * Gets updated
     *
     * @return \DateTime
     */
    public function getUpdated()
    {
        return $this->container['updated'];
    }

    /**
     * Sets updated
     *
     * @param \DateTime $updated The updated date.
     *
     * @return $this
     */
    public function setUpdated($updated)
    {
        $this->container['updated'] = $updated;

        return $this;
    }

    /**
     * Gets owner
     *
     * @return \Domainrobot\Model\BasicUser
     */
    public function getOwner()
    {
        return $this->container['owner'];
    }

    /**
     * Sets owner
     *
     * @param \Domainrobot\Model\BasicUser $owner The owner of the object.
     *
     * @return $this
     */
    public function setOwner($owner)
    {
        $this->container['owner'] = $owner;

        return $this;
    }

    /**
     * Gets updater
     *
     * @return \Domainrobot\Model\BasicUser
     */
    public function getUpdater()
    {
        return $this->container['updater'];
    }

    /**
     * Sets updater
     *
     * @param \Domainrobot\Model\BasicUser $updater The updating user of the object.
     *
     * @return $this
     */
    public function setUpdater($updater)
    {
        $this->container['updater'] = $updater;

        return $this;
    }

    /**
     * Gets domain
     *
     * @return string
     */
    public function getDomain()
    {
        return $this->container['domain'];
    }

    /**
     * Sets domain
     *
     * @param string $domain The domain name.
     *
     * @return $this
     */
    public function setDomain($domain)
    {
        $this->container['domain'] = $domain;

        return $this;
    }

    /**
     * Gets gainingRegistrar
     *
     * @return string
     */
    public function getGainingRegistrar()
    {
        return $this->container['gainingRegistrar'];
    }

    /**
     * Sets gainingRegistrar
     *
     * @param string $gainingRegistrar The gaining registrar.
     *
     * @return $this
     */
    public function setGainingRegistrar($gainingRegistrar)
    {
        $this->container['gainingRegistrar'] = $gainingRegistrar;

        return $this;
    }

    /**
     * Gets loosingRegistrar
     *
     * @return string
     */
    public function getLoosingRegistrar()
    {
        return $this->container['loosingRegistrar'];
    }

    /**
     * Sets loosingRegistrar
     *
     * @param string $loosingRegistrar The loosing registrar.
     *
     * @return $this
     */
    public function setLoosingRegistrar($loosingRegistrar)
    {
        $this->container['loosingRegistrar'] = $loosingRegistrar;

        return $this;
    }

    /**
     * Gets start
     *
     * @return \DateTime
     */
    public function getStart()
    {
        return $this->container['start'];
    }

    /**
     * Sets start
     *
     * @param \DateTime $start The start date.
     *
     * @return $this
     */
    public function setStart($start)
    {
        $this->container['start'] = $start;

        return $this;
    }

    /**
     * Gets reminder
     *
     * @return \DateTime
     */
    public function getReminder()
    {
        return $this->container['reminder'];
    }

    /**
     * Sets reminder
     *
     * @param \DateTime $reminder The reminder date.
     *
     * @return $this
     */
    public function setReminder($reminder)
    {
        $this->container['reminder'] = $reminder;

        return $this;
    }

    /**
     * Gets autoAck
     *
     * @return \DateTime
     */
    public function getAutoAck()
    {
        return $this->container['autoAck'];
    }

    /**
     * Sets autoAck
     *
     * @param \DateTime $autoAck The auto ack date.
     *
     * @return $this
     */
    public function setAutoAck($autoAck)
    {
        $this->container['autoAck'] = $autoAck;

        return $this;
    }

    /**
     * Gets autoNack
     *
     * @return \DateTime
     */
    public function getAutoNack()
    {
        return $this->container['autoNack'];
    }

    /**
     * Sets autoNack
     *
     * @param \DateTime $autoNack The auto nack date.
     *
     * @return $this
     */
    public function setAutoNack($autoNack)
    {
        $this->container['autoNack'] = $autoNack;

        return $this;
    }

    /**
     * Gets end
     *
     * @return \DateTime
     */
    public function getEnd()
    {
        return $this->container['end'];
    }

    /**
     * Sets end
     *
     * @param \DateTime $end The end date.
     *
     * @return $this
     */
    public function setEnd($end)
    {
        $this->container['end'] = $end;

        return $this;
    }

    /**
     * Gets autoAnswer
     *
     * @return bool
     */
    public function getAutoAnswer()
    {
        return $this->container['autoAnswer'];
    }

    /**
     * Sets autoAnswer
     *
     * @param bool $autoAnswer Autoanswer active.
     *
     * @return $this
     */
    public function setAutoAnswer($autoAnswer)
    {
        $this->container['autoAnswer'] = $autoAnswer;

        return $this;
    }

    /**
     * Gets recipient
     *
     * @return string
     */
    public function getRecipient()
    {
        return $this->container['recipient'];
    }

    /**
     * Sets recipient
     *
     * @param string $recipient The recipient.
     *
     * @return $this
     */
    public function setRecipient($recipient)
    {
        $this->container['recipient'] = $recipient;

        return $this;
    }

    /**
     * Gets mailserver
     *
     * @return string
     */
    public function getMailserver()
    {
        return $this->container['mailserver'];
    }

    /**
     * Sets mailserver
     *
     * @param string $mailserver The mailserver.
     *
     * @return $this
     */
    public function setMailserver($mailserver)
    {
        $this->container['mailserver'] = $mailserver;

        return $this;
    }

    /**
     * Gets deliveredMailserver
     *
     * @return string
     */
    public function getDeliveredMailserver()
    {
        return $this->container['deliveredMailserver'];
    }

    /**
     * Sets deliveredMailserver
     *
     * @param string $deliveredMailserver The delivered mailserver.
     *
     * @return $this
     */
    public function setDeliveredMailserver($deliveredMailserver)
    {
        $this->container['deliveredMailserver'] = $deliveredMailserver;

        return $this;
    }

    /**
     * Gets delivered
     *
     * @return \DateTime
     */
    public function getDelivered()
    {
        return $this->container['delivered'];
    }

    /**
     * Sets delivered
     *
     * @param \DateTime $delivered The delivered date.
     *
     * @return $this
     */
    public function setDelivered($delivered)
    {
        $this->container['delivered'] = $delivered;

        return $this;
    }

    /**
     * Gets transaction
     *
     * @return string
     */
    public function getTransaction()
    {
        return $this->container['transaction'];
    }

    /**
     * Sets transaction
     *
     * @param string $transaction The ctid.
     *
     * @return $this
     */
    public function setTransaction($transaction)
    {
        $this->container['transaction'] = $transaction;

        return $this;
    }

    /**
     * Gets type
     *
     * @return \Domainrobot\Model\TransferAnswer
     */
    public function getType()
    {
        return $this->container['type'];
    }

    /**
     * Sets type
     *
     * @param \Domainrobot\Model\TransferAnswer $type The type of the transfer.
     *
     * @return $this
     */
    public function setType($type)
    {
        $this->container['type'] = $type;

        return $this;
    }

    /**
     * Gets nackReason
     *
     * @return int
     */
    public function getNackReason()
    {
        return $this->container['nackReason'];
    }

    /**
     * Sets nackReason
     *
     * @param int $nackReason The reason.
     *
     * @return $this
     */
    public function setNackReason($nackReason)
    {
        $this->container['nackReason'] = $nackReason;

        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param integer $offset Offset
     *
     * @return boolean
     */
    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     *
     * @param integer $offset Offset
     *
     * @return mixed
     */
    public function offsetGet($offset)
    {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }

    /**
     * Sets value based on offset.
     *
     * @param integer $offset Offset
     * @param mixed   $value  Value to be set
     *
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     *
     * @param integer $offset Offset
     *
     * @return void
     */
    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }

    /**
     * Gets the string presentation of the object
     *
     * @return string
     */
    public function __toString()
    {
        if (defined('JSON_PRETTY_PRINT')) { // use JSON pretty print
            return json_encode(
                ObjectSerializer::sanitizeForSerialization($this),
                JSON_PRETTY_PRINT
            );
        }

        return json_encode(ObjectSerializer::sanitizeForSerialization($this));
    }
    
    /**
     * @param boolean $removeEmptyValues [remove all empty values if true]
     * @param array $retrieveKeys [list of keys to get back in any case]
     * 
     * Examples:
     * toArray() => returns only non empty values
     * toArray(true) => returns all values
     */
    public function toArray($retrieveAllValues = false){
        $container = $this->container;
        foreach($container as $key => &$value){
            if(!$retrieveAllValues && empty($value)){
                unset($container[$key]);
                continue;
            }
            
            if(gettype($value) === "object"){
                $value = $value->toArray();
            }
            if(is_array($value)){
                foreach($value as &$v){
                    if (gettype($v) === "object") {
                        $v = $v->toArray();
                    }
                }
            }
        };
        return $container;
    }
}

