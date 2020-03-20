<?php
/**
 * SEPAMandate
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
 * SEPAMandate Class Doc Comment
 *
 * @category Class
 * @package  Domainrobot
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class SEPAMandate implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'SEPAMandate';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'created' => '\DateTime',
        'updated' => '\DateTime',
        'reference' => 'string',
        'confirmSignature' => '\DateTime',
        'confirmIp' => '\Domainrobot\Model\InetAddress',
        'confirmUseragent' => 'string',
        'confirmChecked' => 'bool',
        'expire' => '\DateTime',
        'histories' => '\Domainrobot\Model\SEPAMandate[]',
        'accountHolder' => 'string',
        'iban' => 'string',
        'bic' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'created' => 'date-time',
        'updated' => 'date-time',
        'reference' => null,
        'confirmSignature' => 'date-time',
        'confirmIp' => null,
        'confirmUseragent' => null,
        'confirmChecked' => null,
        'expire' => 'date-time',
        'histories' => null,
        'accountHolder' => null,
        'iban' => null,
        'bic' => null
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
        'reference' => 'reference',
        'confirmSignature' => 'confirmSignature',
        'confirmIp' => 'confirmIp',
        'confirmUseragent' => 'confirmUseragent',
        'confirmChecked' => 'confirmChecked',
        'expire' => 'expire',
        'histories' => 'histories',
        'accountHolder' => 'accountHolder',
        'iban' => 'iban',
        'bic' => 'bic'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'created' => 'setCreated',
        'updated' => 'setUpdated',
        'reference' => 'setReference',
        'confirmSignature' => 'setConfirmSignature',
        'confirmIp' => 'setConfirmIp',
        'confirmUseragent' => 'setConfirmUseragent',
        'confirmChecked' => 'setConfirmChecked',
        'expire' => 'setExpire',
        'histories' => 'setHistories',
        'accountHolder' => 'setAccountHolder',
        'iban' => 'setIban',
        'bic' => 'setBic'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'created' => 'getCreated',
        'updated' => 'getUpdated',
        'reference' => 'getReference',
        'confirmSignature' => 'getConfirmSignature',
        'confirmIp' => 'getConfirmIp',
        'confirmUseragent' => 'getConfirmUseragent',
        'confirmChecked' => 'getConfirmChecked',
        'expire' => 'getExpire',
        'histories' => 'getHistories',
        'accountHolder' => 'getAccountHolder',
        'iban' => 'getIban',
        'bic' => 'getBic'
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
        $this->container['reference'] = isset($data['reference']) ? $data['reference'] : null;
        $this->container['confirmSignature'] = isset($data['confirmSignature']) ? $data['confirmSignature'] : null;
        $this->container['confirmIp'] = isset($data['confirmIp']) ? $data['confirmIp'] : null;
        $this->container['confirmUseragent'] = isset($data['confirmUseragent']) ? $data['confirmUseragent'] : null;
        $this->container['confirmChecked'] = isset($data['confirmChecked']) ? $data['confirmChecked'] : null;
        $this->container['expire'] = isset($data['expire']) ? $data['expire'] : null;
        $this->container['histories'] = isset($data['histories']) ? $data['histories'] : null;
        $this->container['accountHolder'] = isset($data['accountHolder']) ? $data['accountHolder'] : null;
        $this->container['iban'] = isset($data['iban']) ? $data['iban'] : null;
        $this->container['bic'] = isset($data['bic']) ? $data['bic'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if ($this->container['confirmSignature'] === null) {
            $invalidProperties[] = "'confirmSignature' can't be null";
        }
        if ($this->container['confirmIp'] === null) {
            $invalidProperties[] = "'confirmIp' can't be null";
        }
        if ($this->container['confirmChecked'] === null) {
            $invalidProperties[] = "'confirmChecked' can't be null";
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
     * Gets reference
     *
     * @return string
     */
    public function getReference()
    {
        return $this->container['reference'];
    }

    /**
     * Sets reference
     *
     * @param string $reference The sepa mandate reference
     *
     * @return $this
     */
    public function setReference($reference)
    {
        $this->container['reference'] = $reference;

        return $this;
    }

    /**
     * Gets confirmSignature
     *
     * @return \DateTime
     */
    public function getConfirmSignature()
    {
        return $this->container['confirmSignature'];
    }

    /**
     * Sets confirmSignature
     *
     * @param \DateTime $confirmSignature The date of the confirm signature
     *
     * @return $this
     */
    public function setConfirmSignature($confirmSignature)
    {
        $this->container['confirmSignature'] = $confirmSignature;

        return $this;
    }

    /**
     * Gets confirmIp
     *
     * @return \Domainrobot\Model\InetAddress
     */
    public function getConfirmIp()
    {
        return $this->container['confirmIp'];
    }

    /**
     * Sets confirmIp
     *
     * @param \Domainrobot\Model\InetAddress $confirmIp The address of the confirm signature
     *
     * @return $this
     */
    public function setConfirmIp($confirmIp)
    {
        $this->container['confirmIp'] = $confirmIp;

        return $this;
    }

    /**
     * Gets confirmUseragent
     *
     * @return string
     */
    public function getConfirmUseragent()
    {
        return $this->container['confirmUseragent'];
    }

    /**
     * Sets confirmUseragent
     *
     * @param string $confirmUseragent The user agent of the confirm signature
     *
     * @return $this
     */
    public function setConfirmUseragent($confirmUseragent)
    {
        $this->container['confirmUseragent'] = $confirmUseragent;

        return $this;
    }

    /**
     * Gets confirmChecked
     *
     * @return bool
     */
    public function getConfirmChecked()
    {
        return $this->container['confirmChecked'];
    }

    /**
     * Sets confirmChecked
     *
     * @param bool $confirmChecked Flag for indicating if the confirm data has been checked
     *
     * @return $this
     */
    public function setConfirmChecked($confirmChecked)
    {
        $this->container['confirmChecked'] = $confirmChecked;

        return $this;
    }

    /**
     * Gets expire
     *
     * @return \DateTime
     */
    public function getExpire()
    {
        return $this->container['expire'];
    }

    /**
     * Sets expire
     *
     * @param \DateTime $expire Date after the mandate will be expired
     *
     * @return $this
     */
    public function setExpire($expire)
    {
        $this->container['expire'] = $expire;

        return $this;
    }

    /**
     * Gets histories
     *
     * @return \Domainrobot\Model\SEPAMandate[]
     */
    public function getHistories()
    {
        return $this->container['histories'];
    }

    /**
     * Sets histories
     *
     * @param \Domainrobot\Model\SEPAMandate[] $histories A list of historized sepa mandates
     *
     * @return $this
     */
    public function setHistories($histories)
    {
        $this->container['histories'] = $histories;

        return $this;
    }

    /**
     * Gets accountHolder
     *
     * @return string
     */
    public function getAccountHolder()
    {
        return $this->container['accountHolder'];
    }

    /**
     * Sets accountHolder
     *
     * @param string $accountHolder The holder of the bank account
     *
     * @return $this
     */
    public function setAccountHolder($accountHolder)
    {
        $this->container['accountHolder'] = $accountHolder;

        return $this;
    }

    /**
     * Gets iban
     *
     * @return string
     */
    public function getIban()
    {
        return $this->container['iban'];
    }

    /**
     * Sets iban
     *
     * @param string $iban The bank iban
     *
     * @return $this
     */
    public function setIban($iban)
    {
        $this->container['iban'] = $iban;

        return $this;
    }

    /**
     * Gets bic
     *
     * @return string
     */
    public function getBic()
    {
        return $this->container['bic'];
    }

    /**
     * Sets bic
     *
     * @param string $bic The bank bic
     *
     * @return $this
     */
    public function setBic($bic)
    {
        $this->container['bic'] = $bic;

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
     * toArray() => returns all values
     * toArray(true) => returns only non empty values
     * toArray(true, ["key"]) => returns all non empty values and "key" even if empty
     * toArray(true, ["key:no_empty_value"]) => returns all non empty values and "key" if not empty
     */
    public function toArray($removeEmptyValues = false, $retrieveKeys = []){
        $container = $this->container;
        foreach($container as $key => &$value){
            if(!in_array($key, $retrieveKeys) && $removeEmptyValues && empty($value)){
                unset($container[$key]);
                continue;
            }
            if(in_array($key.":no_empty_value", $retrieveKeys)){
                unset($container[$key]);
                continue;
            }
            if(gettype($value) === "object"){
                $value = $value->toArray();
            }
        };
        return $container;
    }
}


