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
 * Domainrobot JSON API for managing: Domains, SSL                                             Certificates, DNS and                                             much more.
 *
 * OpenAPI spec version: v1
 * 
 * Generated by: https://github.com/swagger-api/swagger-codegen.git
 * Swagger Codegen version: 2.4.16-SNAPSHOT
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
        'transaction' => null,
        'type' => null,
        'nackReason' => 'int32'
    ];

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function swaggerTypes(): array
    {
        return self::$swaggerTypes;
    }

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function swaggerFormats(): array
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
    public static function attributeMap(): array
    {
        return self::$attributeMap;
    }

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @return array
     */
    public static function setters(): array
    {
        return self::$setters;
    }

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @return array
     */
    public static function getters(): array
    {
        return self::$getters;
    }

    /**
     * The original name of the model.
     *
     * @return string
     */
    public function getModelName(): string
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
    public function __construct(?array $data = null)
    {
        $this->container['created'] = isset($data['created']) ? $this->createData($data['created'], 'created')  : null;
        $this->container['updated'] = isset($data['updated']) ? $this->createData($data['updated'], 'updated')  : null;
        $this->container['owner'] = isset($data['owner']) ? $this->createData($data['owner'], 'owner')  : null;
        $this->container['updater'] = isset($data['updater']) ? $this->createData($data['updater'], 'updater')  : null;
        $this->container['domain'] = isset($data['domain']) ? $this->createData($data['domain'], 'domain')  : null;
        $this->container['gainingRegistrar'] = isset($data['gainingRegistrar']) ? $this->createData($data['gainingRegistrar'], 'gainingRegistrar')  : null;
        $this->container['loosingRegistrar'] = isset($data['loosingRegistrar']) ? $this->createData($data['loosingRegistrar'], 'loosingRegistrar')  : null;
        $this->container['start'] = isset($data['start']) ? $this->createData($data['start'], 'start')  : null;
        $this->container['reminder'] = isset($data['reminder']) ? $this->createData($data['reminder'], 'reminder')  : null;
        $this->container['autoAck'] = isset($data['autoAck']) ? $this->createData($data['autoAck'], 'autoAck')  : null;
        $this->container['autoNack'] = isset($data['autoNack']) ? $this->createData($data['autoNack'], 'autoNack')  : null;
        $this->container['end'] = isset($data['end']) ? $this->createData($data['end'], 'end')  : null;
        $this->container['autoAnswer'] = isset($data['autoAnswer']) ? $this->createData($data['autoAnswer'], 'autoAnswer')  : null;
        $this->container['recipient'] = isset($data['recipient']) ? $this->createData($data['recipient'], 'recipient')  : null;
        $this->container['transaction'] = isset($data['transaction']) ? $this->createData($data['transaction'], 'transaction')  : null;
        $this->container['type'] = isset($data['type']) ? $this->createData($data['type'], 'type')  : null;
        $this->container['nackReason'] = isset($data['nackReason']) ? $this->createData($data['nackReason'], 'nackReason')  : null;
    }

    /**
     * create data according to types;
     * non object types will just be returend as is:
     * object types will return an instance of themselves or and array of instances
     *
     * @param mixed[] $data
     * @param string $property
     * @return mixed
     */
    public function createData($data = null, $property = null): mixed
    {
        if ($data === null || $property === null) {
            return '';
        }
        
        $swaggerType = self::$swaggerTypes[$property];

        preg_match("/([\\\\\w\d]+)(\[\])?/", $swaggerType, $matches);

        // handle object types
        if (count($matches) > 0 && count($matches) < 3) {
            try {
                if (!is_array($data)) {
                    return $data;
                }
                
                $reflection = new \ReflectionClass($swaggerType);
                $reflectionInstance = $reflection->newInstance($data);

                return $reflectionInstance;
            } catch (\Exception $ex) {
                return $data;
            }
        } elseif (count($matches) >= 3) {
            // Object[]
            // arrays of objects have to be handled differently
            $reflectionInstances = [];
            foreach($data as $d){
                try {
                    if(!is_array($d)){
                        $reflectionInstances[] = $d;
                        continue;
                    }
                    $reflection = new \ReflectionClass(str_replace("[]", "", $swaggerType) );
                    $reflectionInstances[] = $reflection->newInstance($d);                   
                } catch (\Exception $ex) {
                    return $d;
                }
            }

            return $reflectionInstances;
        }

        return $data;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties(): array
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
     * Validate all the properties in the 
     * return true if all passed
     *
     * @return bool True if all properties are valid
     */
    public function valid(): bool
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
     * @param \DateTime $created Date of creation.
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
     * @param \DateTime $updated Date of the last update.
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
     * @param \Domainrobot\Model\BasicUser $owner The object owner.
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
     * @param \Domainrobot\Model\BasicUser $updater User who performed the last update.
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
     * @param \DateTime $start Date on which the transfer started.
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
     * @param \DateTime $reminder Date on which the transfer reminder mail is sent.
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
     * @param \DateTime $autoAck Date of the automatic ACK on which the transfer is confirmed.
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
     * @param \DateTime $autoNack Date of the automatic NACK on which the transfer is rejected.
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
     * @param \DateTime $end Date on which the transfer process ends.
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
     * @param bool $autoAnswer Automatic response to the transfer request.  false = not active  true = active  Default value = false  For XML, 0 (false) and 1 (true) can also be used.
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
     * @param string $recipient Receiver of the reminder email.
     *
     * @return $this
     */
    public function setRecipient($recipient)
    {
        $this->container['recipient'] = $recipient;

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
     * @param int $nackReason Reason for rejection. Only for type \"nack\", mandatory here.
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
    public function offsetExists($offset): bool
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
    public function offsetGet($offset): mixed
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
    public function offsetSet($offset, $value): void
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
    public function offsetUnset($offset): void
    {
        unset($this->container[$offset]);
    }

    /**
     * Gets the string presentation of the object
     *
     * @return string
     */
    public function __toString(): string
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
    public function toArray($retrieveAllValues = false): array
    {
        $container = $this->container;

        $cleanContainer = [];
        foreach ($container as $key => &$value) {
            if (
                $retrieveAllValues === false && 
                empty($value) === true &&
                $value !== false &&
                $value !== '' &&
                $value !== 0 &&
                $value !== '0'
            ) {
                unset($container[$key]);
                continue;
            }
            
            if (gettype($value) === "object") {
                if(method_exists($value, 'toArray')) {
                    $value = $value->toArray($retrieveAllValues);
                }else{
                    if(get_class($value) === "DateTime"){
                        $value = $value->format("Y-m-d\TH:i:s");
                    }else{
                        $value = (array) $value;
                    }
                }
            }

            if (is_array($value)) {
                foreach ($value as &$v) {
                    if (gettype($v) === "object") {
                        $v = $v->toArray($retrieveAllValues);
                    }
                }
            }

            $cleanContainer[self::$attributeMap[$key]] = $value;
        };

        return $cleanContainer;
    }
}


