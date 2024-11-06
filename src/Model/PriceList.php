<?php
/**
 * PriceList
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
 * PriceList Class Doc Comment
 *
 * @category Class
 * @package  Domainrobot
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class PriceList implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'PriceList';

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
        'id' => 'int',
        'label' => 'string',
        'client' => 'string',
        'group' => 'string',
        'type' => '\Domainrobot\Model\Type',
        'from' => '\DateTime',
        'to' => '\DateTime',
        'inactive' => 'bool',
        'comment' => 'string',
        'customerPriceListsAdd' => '\Domainrobot\Model\CustomerPriceList[]',
        'customerPriceListsRem' => '\Domainrobot\Model\CustomerPriceList[]',
        'hasCustomerPriceList' => 'bool',
        'excludeFromPricechange' => 'bool'
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
        'id' => 'int32',
        'label' => null,
        'client' => null,
        'group' => null,
        'type' => null,
        'from' => 'date-time',
        'to' => 'date-time',
        'inactive' => null,
        'comment' => null,
        'customerPriceListsAdd' => null,
        'customerPriceListsRem' => null,
        'hasCustomerPriceList' => null,
        'excludeFromPricechange' => null
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
        'id' => 'id',
        'label' => 'label',
        'client' => 'client',
        'group' => 'group',
        'type' => 'type',
        'from' => 'from',
        'to' => 'to',
        'inactive' => 'inactive',
        'comment' => 'comment',
        'customerPriceListsAdd' => 'customerPriceListsAdd',
        'customerPriceListsRem' => 'customerPriceListsRem',
        'hasCustomerPriceList' => 'hasCustomerPriceList',
        'excludeFromPricechange' => 'excludeFromPricechange'
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
        'id' => 'setId',
        'label' => 'setLabel',
        'client' => 'setClient',
        'group' => 'setGroup',
        'type' => 'setType',
        'from' => 'setFrom',
        'to' => 'setTo',
        'inactive' => 'setInactive',
        'comment' => 'setComment',
        'customerPriceListsAdd' => 'setCustomerPriceListsAdd',
        'customerPriceListsRem' => 'setCustomerPriceListsRem',
        'hasCustomerPriceList' => 'setHasCustomerPriceList',
        'excludeFromPricechange' => 'setExcludeFromPricechange'
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
        'id' => 'getId',
        'label' => 'getLabel',
        'client' => 'getClient',
        'group' => 'getGroup',
        'type' => 'getType',
        'from' => 'getFrom',
        'to' => 'getTo',
        'inactive' => 'getInactive',
        'comment' => 'getComment',
        'customerPriceListsAdd' => 'getCustomerPriceListsAdd',
        'customerPriceListsRem' => 'getCustomerPriceListsRem',
        'hasCustomerPriceList' => 'getHasCustomerPriceList',
        'excludeFromPricechange' => 'getExcludeFromPricechange'
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
        $this->container['id'] = isset($data['id']) ? $this->createData($data['id'], 'id')  : null;
        $this->container['label'] = isset($data['label']) ? $this->createData($data['label'], 'label')  : null;
        $this->container['client'] = isset($data['client']) ? $this->createData($data['client'], 'client')  : null;
        $this->container['group'] = isset($data['group']) ? $this->createData($data['group'], 'group')  : null;
        $this->container['type'] = isset($data['type']) ? $this->createData($data['type'], 'type')  : null;
        $this->container['from'] = isset($data['from']) ? $this->createData($data['from'], 'from')  : null;
        $this->container['to'] = isset($data['to']) ? $this->createData($data['to'], 'to')  : null;
        $this->container['inactive'] = isset($data['inactive']) ? $this->createData($data['inactive'], 'inactive')  : null;
        $this->container['comment'] = isset($data['comment']) ? $this->createData($data['comment'], 'comment')  : null;
        $this->container['customerPriceListsAdd'] = isset($data['customerPriceListsAdd']) ? $this->createData($data['customerPriceListsAdd'], 'customerPriceListsAdd')  : null;
        $this->container['customerPriceListsRem'] = isset($data['customerPriceListsRem']) ? $this->createData($data['customerPriceListsRem'], 'customerPriceListsRem')  : null;
        $this->container['hasCustomerPriceList'] = isset($data['hasCustomerPriceList']) ? $this->createData($data['hasCustomerPriceList'], 'hasCustomerPriceList')  : null;
        $this->container['excludeFromPricechange'] = isset($data['excludeFromPricechange']) ? $this->createData($data['excludeFromPricechange'], 'excludeFromPricechange')  : null;
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
     * Gets id
     *
     * @return int
     */
    public function getId()
    {
        return $this->container['id'];
    }

    /**
     * Sets id
     *
     * @param int $id The id.
     *
     * @return $this
     */
    public function setId($id)
    {
        $this->container['id'] = $id;

        return $this;
    }

    /**
     * Gets label
     *
     * @return string
     */
    public function getLabel()
    {
        return $this->container['label'];
    }

    /**
     * Sets label
     *
     * @param string $label The unique identifier, must be unique within the customer client
     *
     * @return $this
     */
    public function setLabel($label)
    {
        $this->container['label'] = $label;

        return $this;
    }

    /**
     * Gets client
     *
     * @return string
     */
    public function getClient()
    {
        return $this->container['client'];
    }

    /**
     * Sets client
     *
     * @param string $client The customer client
     *
     * @return $this
     */
    public function setClient($client)
    {
        $this->container['client'] = $client;

        return $this;
    }

    /**
     * Gets group
     *
     * @return string
     */
    public function getGroup()
    {
        return $this->container['group'];
    }

    /**
     * Sets group
     *
     * @param string $group The optional list group
     *
     * @return $this
     */
    public function setGroup($group)
    {
        $this->container['group'] = $group;

        return $this;
    }

    /**
     * Gets type
     *
     * @return \Domainrobot\Model\Type
     */
    public function getType()
    {
        return $this->container['type'];
    }

    /**
     * Sets type
     *
     * @param \Domainrobot\Model\Type $type The type of the price list
     *
     * @return $this
     */
    public function setType($type)
    {
        $this->container['type'] = $type;

        return $this;
    }

    /**
     * Gets from
     *
     * @return \DateTime
     */
    public function getFrom()
    {
        return $this->container['from'];
    }

    /**
     * Sets from
     *
     * @param \DateTime $from The from date
     *
     * @return $this
     */
    public function setFrom($from)
    {
        $this->container['from'] = $from;

        return $this;
    }

    /**
     * Gets to
     *
     * @return \DateTime
     */
    public function getTo()
    {
        return $this->container['to'];
    }

    /**
     * Sets to
     *
     * @param \DateTime $to The to date
     *
     * @return $this
     */
    public function setTo($to)
    {
        $this->container['to'] = $to;

        return $this;
    }

    /**
     * Gets inactive
     *
     * @return bool
     */
    public function getInactive()
    {
        return $this->container['inactive'];
    }

    /**
     * Sets inactive
     *
     * @param bool $inactive Flag indication if the priceList is inactive
     *
     * @return $this
     */
    public function setInactive($inactive)
    {
        $this->container['inactive'] = $inactive;

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
     * @param string $comment Comments
     *
     * @return $this
     */
    public function setComment($comment)
    {
        $this->container['comment'] = $comment;

        return $this;
    }

    /**
     * Gets customerPriceListsAdd
     *
     * @return \Domainrobot\Model\CustomerPriceList[]
     */
    public function getCustomerPriceListsAdd()
    {
        return $this->container['customerPriceListsAdd'];
    }

    /**
     * Sets customerPriceListsAdd
     *
     * @param \Domainrobot\Model\CustomerPriceList[] $customerPriceListsAdd Used by the patch route
     *
     * @return $this
     */
    public function setCustomerPriceListsAdd($customerPriceListsAdd)
    {
        $this->container['customerPriceListsAdd'] = $customerPriceListsAdd;

        return $this;
    }

    /**
     * Gets customerPriceListsRem
     *
     * @return \Domainrobot\Model\CustomerPriceList[]
     */
    public function getCustomerPriceListsRem()
    {
        return $this->container['customerPriceListsRem'];
    }

    /**
     * Sets customerPriceListsRem
     *
     * @param \Domainrobot\Model\CustomerPriceList[] $customerPriceListsRem Used by the patch route
     *
     * @return $this
     */
    public function setCustomerPriceListsRem($customerPriceListsRem)
    {
        $this->container['customerPriceListsRem'] = $customerPriceListsRem;

        return $this;
    }

    /**
     * Gets hasCustomerPriceList
     *
     * @return bool
     */
    public function getHasCustomerPriceList()
    {
        return $this->container['hasCustomerPriceList'];
    }

    /**
     * Sets hasCustomerPriceList
     *
     * @param bool $hasCustomerPriceList Flag indication if the priceList is inactive
     *
     * @return $this
     */
    public function setHasCustomerPriceList($hasCustomerPriceList)
    {
        $this->container['hasCustomerPriceList'] = $hasCustomerPriceList;

        return $this;
    }

    /**
     * Gets excludeFromPricechange
     *
     * @return bool
     */
    public function getExcludeFromPricechange()
    {
        return $this->container['excludeFromPricechange'];
    }

    /**
     * Sets excludeFromPricechange
     *
     * @param bool $excludeFromPricechange excludeFromPricechange
     *
     * @return $this
     */
    public function setExcludeFromPricechange($excludeFromPricechange)
    {
        $this->container['excludeFromPricechange'] = $excludeFromPricechange;

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


