<?php
/**
 * TmchClaimsNotice
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
 * TmchClaimsNotice Class Doc Comment
 *
 * @category Class
 * @package  Domainrobot
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class TmchClaimsNotice implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'TmchClaimsNotice';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'created' => '\DateTime',
        'updated' => '\DateTime',
        'owner' => '\Domainrobot\Model\User',
        'updater' => '\Domainrobot\Model\User',
        'reference' => 'string',
        'name' => '\Domainrobot\Model\Domain',
        'idn' => 'string',
        'ownerc' => '\Domainrobot\Model\Contact',
        'messageSent' => '\DateTime',
        'email' => 'string',
        'confirmed' => '\DateTime',
        'confirmIP' => '\Domainrobot\Model\InetAddress',
        'status' => '\Domainrobot\Model\GenericStatusConstants',
        'data' => 'string',
        'comment' => 'string',
        'tmchClaimsNoticeMails' => '\Domainrobot\Model\TmchClaimsNoticeMessage[]',
        'expire' => '\DateTime'
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
        'reference' => null,
        'name' => null,
        'idn' => null,
        'ownerc' => null,
        'messageSent' => 'date-time',
        'email' => null,
        'confirmed' => 'date-time',
        'confirmIP' => null,
        'status' => null,
        'data' => null,
        'comment' => null,
        'tmchClaimsNoticeMails' => null,
        'expire' => 'date-time'
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
        'reference' => 'reference',
        'name' => 'name',
        'idn' => 'idn',
        'ownerc' => 'ownerc',
        'messageSent' => 'messageSent',
        'email' => 'email',
        'confirmed' => 'confirmed',
        'confirmIP' => 'confirmIP',
        'status' => 'status',
        'data' => 'data',
        'comment' => 'comment',
        'tmchClaimsNoticeMails' => 'tmchClaimsNoticeMails',
        'expire' => 'expire'
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
        'reference' => 'setReference',
        'name' => 'setName',
        'idn' => 'setIdn',
        'ownerc' => 'setOwnerc',
        'messageSent' => 'setMessageSent',
        'email' => 'setEmail',
        'confirmed' => 'setConfirmed',
        'confirmIP' => 'setConfirmIP',
        'status' => 'setStatus',
        'data' => 'setData',
        'comment' => 'setComment',
        'tmchClaimsNoticeMails' => 'setTmchClaimsNoticeMails',
        'expire' => 'setExpire'
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
        'reference' => 'getReference',
        'name' => 'getName',
        'idn' => 'getIdn',
        'ownerc' => 'getOwnerc',
        'messageSent' => 'getMessageSent',
        'email' => 'getEmail',
        'confirmed' => 'getConfirmed',
        'confirmIP' => 'getConfirmIP',
        'status' => 'getStatus',
        'data' => 'getData',
        'comment' => 'getComment',
        'tmchClaimsNoticeMails' => 'getTmchClaimsNoticeMails',
        'expire' => 'getExpire'
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
        $this->container['created'] = isset($data['created']) ? $this->createData($data['created'], 'created')  : null;
        $this->container['updated'] = isset($data['updated']) ? $this->createData($data['updated'], 'updated')  : null;
        $this->container['owner'] = isset($data['owner']) ? $this->createData($data['owner'], 'owner')  : null;
        $this->container['updater'] = isset($data['updater']) ? $this->createData($data['updater'], 'updater')  : null;
        $this->container['reference'] = isset($data['reference']) ? $this->createData($data['reference'], 'reference')  : null;
        $this->container['name'] = isset($data['name']) ? $this->createData($data['name'], 'name')  : null;
        $this->container['idn'] = isset($data['idn']) ? $this->createData($data['idn'], 'idn')  : null;
        $this->container['ownerc'] = isset($data['ownerc']) ? $this->createData($data['ownerc'], 'ownerc')  : null;
        $this->container['messageSent'] = isset($data['messageSent']) ? $this->createData($data['messageSent'], 'messageSent')  : null;
        $this->container['email'] = isset($data['email']) ? $this->createData($data['email'], 'email')  : null;
        $this->container['confirmed'] = isset($data['confirmed']) ? $this->createData($data['confirmed'], 'confirmed')  : null;
        $this->container['confirmIP'] = isset($data['confirmIP']) ? $this->createData($data['confirmIP'], 'confirmIP')  : null;
        $this->container['status'] = isset($data['status']) ? $this->createData($data['status'], 'status')  : null;
        $this->container['data'] = isset($data['data']) ? $this->createData($data['data'], 'data')  : null;
        $this->container['comment'] = isset($data['comment']) ? $this->createData($data['comment'], 'comment')  : null;
        $this->container['tmchClaimsNoticeMails'] = isset($data['tmchClaimsNoticeMails']) ? $this->createData($data['tmchClaimsNoticeMails'], 'tmchClaimsNoticeMails')  : null;
        $this->container['expire'] = isset($data['expire']) ? $this->createData($data['expire'], 'expire')  : null;
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
    public function createData($data = null, $property = '')
    {
        if ($data === null || $property === '') {
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
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if ($this->container['confirmIP'] === null) {
            $invalidProperties[] = "'confirmIP' can't be null";
        }
        return $invalidProperties;
    }

    /**
     * Validate all the properties in the 
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
     * @return \Domainrobot\Model\User
     */
    public function getOwner()
    {
        return $this->container['owner'];
    }

    /**
     * Sets owner
     *
     * @param \Domainrobot\Model\User $owner The object owner.
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
     * @return \Domainrobot\Model\User
     */
    public function getUpdater()
    {
        return $this->container['updater'];
    }

    /**
     * Sets updater
     *
     * @param \Domainrobot\Model\User $updater User who performed the last update.
     *
     * @return $this
     */
    public function setUpdater($updater)
    {
        $this->container['updater'] = $updater;

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
     * @param string $reference reference
     *
     * @return $this
     */
    public function setReference($reference)
    {
        $this->container['reference'] = $reference;

        return $this;
    }

    /**
     * Gets name
     *
     * @return \Domainrobot\Model\Domain
     */
    public function getName()
    {
        return $this->container['name'];
    }

    /**
     * Sets name
     *
     * @param \Domainrobot\Model\Domain $name name
     *
     * @return $this
     */
    public function setName($name)
    {
        $this->container['name'] = $name;

        return $this;
    }

    /**
     * Gets idn
     *
     * @return string
     */
    public function getIdn()
    {
        return $this->container['idn'];
    }

    /**
     * Sets idn
     *
     * @param string $idn idn
     *
     * @return $this
     */
    public function setIdn($idn)
    {
        $this->container['idn'] = $idn;

        return $this;
    }

    /**
     * Gets ownerc
     *
     * @return \Domainrobot\Model\Contact
     */
    public function getOwnerc()
    {
        return $this->container['ownerc'];
    }

    /**
     * Sets ownerc
     *
     * @param \Domainrobot\Model\Contact $ownerc ownerc
     *
     * @return $this
     */
    public function setOwnerc($ownerc)
    {
        $this->container['ownerc'] = $ownerc;

        return $this;
    }

    /**
     * Gets messageSent
     *
     * @return \DateTime
     */
    public function getMessageSent()
    {
        return $this->container['messageSent'];
    }

    /**
     * Sets messageSent
     *
     * @param \DateTime $messageSent messageSent
     *
     * @return $this
     */
    public function setMessageSent($messageSent)
    {
        $this->container['messageSent'] = $messageSent;

        return $this;
    }

    /**
     * Gets email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->container['email'];
    }

    /**
     * Sets email
     *
     * @param string $email email
     *
     * @return $this
     */
    public function setEmail($email)
    {
        $this->container['email'] = $email;

        return $this;
    }

    /**
     * Gets confirmed
     *
     * @return \DateTime
     */
    public function getConfirmed()
    {
        return $this->container['confirmed'];
    }

    /**
     * Sets confirmed
     *
     * @param \DateTime $confirmed confirmed
     *
     * @return $this
     */
    public function setConfirmed($confirmed)
    {
        $this->container['confirmed'] = $confirmed;

        return $this;
    }

    /**
     * Gets confirmIP
     *
     * @return \Domainrobot\Model\InetAddress
     */
    public function getConfirmIP()
    {
        return $this->container['confirmIP'];
    }

    /**
     * Sets confirmIP
     *
     * @param \Domainrobot\Model\InetAddress $confirmIP confirmIP
     *
     * @return $this
     */
    public function setConfirmIP($confirmIP)
    {
        $this->container['confirmIP'] = $confirmIP;

        return $this;
    }

    /**
     * Gets status
     *
     * @return \Domainrobot\Model\GenericStatusConstants
     */
    public function getStatus()
    {
        return $this->container['status'];
    }

    /**
     * Sets status
     *
     * @param \Domainrobot\Model\GenericStatusConstants $status status
     *
     * @return $this
     */
    public function setStatus($status)
    {
        $this->container['status'] = $status;

        return $this;
    }

    /**
     * Gets data
     *
     * @return string
     */
    public function getData()
    {
        return $this->container['data'];
    }

    /**
     * Sets data
     *
     * @param string $data data
     *
     * @return $this
     */
    public function setData($data)
    {
        $this->container['data'] = $data;

        return $this;
    }

    /**
     * Gets comment
     *
     * @return string
     */
    public function getComment()
    {
        return $this->container['comment'];
    }

    /**
     * Sets comment
     *
     * @param string $comment comment
     *
     * @return $this
     */
    public function setComment($comment)
    {
        $this->container['comment'] = $comment;

        return $this;
    }

    /**
     * Gets tmchClaimsNoticeMails
     *
     * @return \Domainrobot\Model\TmchClaimsNoticeMessage[]
     */
    public function getTmchClaimsNoticeMails()
    {
        return $this->container['tmchClaimsNoticeMails'];
    }

    /**
     * Sets tmchClaimsNoticeMails
     *
     * @param \Domainrobot\Model\TmchClaimsNoticeMessage[] $tmchClaimsNoticeMails tmchClaimsNoticeMails
     *
     * @return $this
     */
    public function setTmchClaimsNoticeMails($tmchClaimsNoticeMails)
    {
        $this->container['tmchClaimsNoticeMails'] = $tmchClaimsNoticeMails;

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
     * @param \DateTime $expire expire
     *
     * @return $this
     */
    public function setExpire($expire)
    {
        $this->container['expire'] = $expire;

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


