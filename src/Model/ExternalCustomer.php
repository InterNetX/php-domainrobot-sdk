<?php
/**
 * ExternalCustomer
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
 * ExternalCustomer Class Doc Comment
 *
 * @category Class
 * @package  Domainrobot
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class ExternalCustomer implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'ExternalCustomer';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'number' => 'int',
        'client' => 'string',
        'group' => 'int',
        'billing' => '\Domainrobot\Model\BasicUser',
        'externalReference' => 'string',
        'creditLimit' => 'double',
        'created' => '\DateTime',
        'updated' => '\DateTime',
        'priceLists' => '\Domainrobot\Model\PriceListEntity[]',
        'customer' => '\Domainrobot\Model\BasicCustomer'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'number' => 'int64',
        'client' => null,
        'group' => 'int64',
        'billing' => null,
        'externalReference' => null,
        'creditLimit' => 'double',
        'created' => 'date-time',
        'updated' => 'date-time',
        'priceLists' => null,
        'customer' => null
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
        'number' => 'number',
        'client' => 'client',
        'group' => 'group',
        'billing' => 'billing',
        'externalReference' => 'externalReference',
        'creditLimit' => 'creditLimit',
        'created' => 'created',
        'updated' => 'updated',
        'priceLists' => 'priceLists',
        'customer' => 'customer'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'number' => 'setNumber',
        'client' => 'setClient',
        'group' => 'setGroup',
        'billing' => 'setBilling',
        'externalReference' => 'setExternalReference',
        'creditLimit' => 'setCreditLimit',
        'created' => 'setCreated',
        'updated' => 'setUpdated',
        'priceLists' => 'setPriceLists',
        'customer' => 'setCustomer'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'number' => 'getNumber',
        'client' => 'getClient',
        'group' => 'getGroup',
        'billing' => 'getBilling',
        'externalReference' => 'getExternalReference',
        'creditLimit' => 'getCreditLimit',
        'created' => 'getCreated',
        'updated' => 'getUpdated',
        'priceLists' => 'getPriceLists',
        'customer' => 'getCustomer'
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
        $this->container['number'] = isset($data['number']) ? $this->createData($data['number'], 'number')  : null;
        $this->container['client'] = isset($data['client']) ? $this->createData($data['client'], 'client')  : null;
        $this->container['group'] = isset($data['group']) ? $this->createData($data['group'], 'group')  : null;
        $this->container['billing'] = isset($data['billing']) ? $this->createData($data['billing'], 'billing')  : null;
        $this->container['externalReference'] = isset($data['externalReference']) ? $this->createData($data['externalReference'], 'externalReference')  : null;
        $this->container['creditLimit'] = isset($data['creditLimit']) ? $this->createData($data['creditLimit'], 'creditLimit')  : null;
        $this->container['created'] = isset($data['created']) ? $this->createData($data['created'], 'created')  : null;
        $this->container['updated'] = isset($data['updated']) ? $this->createData($data['updated'], 'updated')  : null;
        $this->container['priceLists'] = isset($data['priceLists']) ? $this->createData($data['priceLists'], 'priceLists')  : null;
        $this->container['customer'] = isset($data['customer']) ? $this->createData($data['customer'], 'customer')  : null;
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

        if ($this->container['number'] === null) {
            $invalidProperties[] = "'number' can't be null";
        }
        if ($this->container['client'] === null) {
            $invalidProperties[] = "'client' can't be null";
        }
        if ((mb_strlen($this->container['client']) > 2147483647)) {
            $invalidProperties[] = "invalid value for 'client', the character length must be smaller than or equal to 2147483647.";
        }

        if ((mb_strlen($this->container['client']) < 1)) {
            $invalidProperties[] = "invalid value for 'client', the character length must be bigger than or equal to 1.";
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
     * Gets number
     *
     * @return int
     */
    public function getNumber()
    {
        return $this->container['number'];
    }

    /**
     * Sets number
     *
     * @param int $number number
     *
     * @return $this
     */
    public function setNumber($number)
    {
        $this->container['number'] = $number;

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
     * @param string $client client
     *
     * @return $this
     */
    public function setClient($client)
    {
        if ((mb_strlen($client) > 2147483647)) {
            throw new \InvalidArgumentException('invalid length for $client when calling ExternalCustomer., must be smaller than or equal to 2147483647.');
        }
        if ((mb_strlen($client) < 1)) {
            throw new \InvalidArgumentException('invalid length for $client when calling ExternalCustomer., must be bigger than or equal to 1.');
        }

        $this->container['client'] = $client;

        return $this;
    }

    /**
     * Gets group
     *
     * @return int
     */
    public function getGroup()
    {
        return $this->container['group'];
    }

    /**
     * Sets group
     *
     * @param int $group group
     *
     * @return $this
     */
    public function setGroup($group)
    {
        $this->container['group'] = $group;

        return $this;
    }

    /**
     * Gets billing
     *
     * @return \Domainrobot\Model\BasicUser
     */
    public function getBilling()
    {
        return $this->container['billing'];
    }

    /**
     * Sets billing
     *
     * @param \Domainrobot\Model\BasicUser $billing The billing user.
     *
     * @return $this
     */
    public function setBilling($billing)
    {
        $this->container['billing'] = $billing;

        return $this;
    }

    /**
     * Gets externalReference
     *
     * @return string
     */
    public function getExternalReference()
    {
        return $this->container['externalReference'];
    }

    /**
     * Sets externalReference
     *
     * @param string $externalReference The external reference gives a hint on the creation or use case of the external customer.
     *
     * @return $this
     */
    public function setExternalReference($externalReference)
    {
        $this->container['externalReference'] = $externalReference;

        return $this;
    }

    /**
     * Gets creditLimit
     *
     * @return double
     */
    public function getCreditLimit()
    {
        return $this->container['creditLimit'];
    }

    /**
     * Sets creditLimit
     *
     * @param double $creditLimit The credit limit the external customer.
     *
     * @return $this
     */
    public function setCreditLimit($creditLimit)
    {
        $this->container['creditLimit'] = $creditLimit;

        return $this;
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
     * Gets priceLists
     *
     * @return \Domainrobot\Model\PriceListEntity[]
     */
    public function getPriceLists()
    {
        return $this->container['priceLists'];
    }

    /**
     * Sets priceLists
     *
     * @param \Domainrobot\Model\PriceListEntity[] $priceLists priceLists
     *
     * @return $this
     */
    public function setPriceLists($priceLists)
    {
        $this->container['priceLists'] = $priceLists;

        return $this;
    }

    /**
     * Gets customer
     *
     * @return \Domainrobot\Model\BasicCustomer
     */
    public function getCustomer()
    {
        return $this->container['customer'];
    }

    /**
     * Sets customer
     *
     * @param \Domainrobot\Model\BasicCustomer $customer The customer data.
     *
     * @return $this
     */
    public function setCustomer($customer)
    {
        $this->container['customer'] = $customer;

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


