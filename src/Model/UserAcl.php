<?php
/**
 * UserAcl
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
 * UserAcl Class Doc Comment
 *
 * @category Class
 * @package  Domainrobot
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class UserAcl implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'UserAcl';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'functionCode' => 'string',
        'children' => '\Domainrobot\Model\BasicUser[]',
        'childrenLocked' => 'bool',
        'userLocked' => 'bool',
        'effective' => 'bool',
        'childrenRem' => '\Domainrobot\Model\BasicUser[]',
        'childrenAdd' => '\Domainrobot\Model\BasicUser[]',
        'restriction' => '\Domainrobot\Model\ACLRestriction'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'functionCode' => null,
        'children' => null,
        'childrenLocked' => null,
        'userLocked' => null,
        'effective' => null,
        'childrenRem' => null,
        'childrenAdd' => null,
        'restriction' => null
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
        'functionCode' => 'functionCode',
        'children' => 'children',
        'childrenLocked' => 'childrenLocked',
        'userLocked' => 'userLocked',
        'effective' => 'effective',
        'childrenRem' => 'childrenRem',
        'childrenAdd' => 'childrenAdd',
        'restriction' => 'restriction'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'functionCode' => 'setFunctionCode',
        'children' => 'setChildren',
        'childrenLocked' => 'setChildrenLocked',
        'userLocked' => 'setUserLocked',
        'effective' => 'setEffective',
        'childrenRem' => 'setChildrenRem',
        'childrenAdd' => 'setChildrenAdd',
        'restriction' => 'setRestriction'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'functionCode' => 'getFunctionCode',
        'children' => 'getChildren',
        'childrenLocked' => 'getChildrenLocked',
        'userLocked' => 'getUserLocked',
        'effective' => 'getEffective',
        'childrenRem' => 'getChildrenRem',
        'childrenAdd' => 'getChildrenAdd',
        'restriction' => 'getRestriction'
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
        $this->container['functionCode'] = isset($data['functionCode']) ? $this->createData($data['functionCode'], 'functionCode')  : null;
        $this->container['children'] = isset($data['children']) ? $this->createData($data['children'], 'children')  : null;
        $this->container['childrenLocked'] = isset($data['childrenLocked']) ? $this->createData($data['childrenLocked'], 'childrenLocked')  : null;
        $this->container['userLocked'] = isset($data['userLocked']) ? $this->createData($data['userLocked'], 'userLocked')  : null;
        $this->container['effective'] = isset($data['effective']) ? $this->createData($data['effective'], 'effective')  : null;
        $this->container['childrenRem'] = isset($data['childrenRem']) ? $this->createData($data['childrenRem'], 'childrenRem')  : null;
        $this->container['childrenAdd'] = isset($data['childrenAdd']) ? $this->createData($data['childrenAdd'], 'childrenAdd')  : null;
        $this->container['restriction'] = isset($data['restriction']) ? $this->createData($data['restriction'], 'restriction')  : null;
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
    public function createData($data = null, $property)
    {
        if ($data === null) {
            return '';
        }
        $swaggerType = self::$swaggerTypes[$property];

        preg_match("/([\\\\\w\d]+)(\[\])?/", $swaggerType, $matches);

        // handle object types
        if (count($matches) > 0 && count($matches) < 3) {
            try {
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
            foreach ($data as $d) {
                try {
                    $reflection = new \ReflectionClass(str_replace("[]", "", $swaggerType));
                    $reflectionInstances[] = $reflection->newInstance($d);

                    return $reflectionInstances;
                } catch (\Exception $ex) {
                    return $data;
                }
            }
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
     * Gets functionCode
     *
     * @return string
     */
    public function getFunctionCode()
    {
        return $this->container['functionCode'];
    }

    /**
     * Sets functionCode
     *
     * @param string $functionCode The function code to restrict
     *
     * @return $this
     */
    public function setFunctionCode($functionCode)
    {
        $this->container['functionCode'] = $functionCode;

        return $this;
    }

    /**
     * Gets children
     *
     * @return \Domainrobot\Model\BasicUser[]
     */
    public function getChildren()
    {
        return $this->container['children'];
    }

    /**
     * Sets children
     *
     * @param \Domainrobot\Model\BasicUser[] $children The none locked children
     *
     * @return $this
     */
    public function setChildren($children)
    {
        $this->container['children'] = $children;

        return $this;
    }

    /**
     * Gets childrenLocked
     *
     * @return bool
     */
    public function getChildrenLocked()
    {
        return $this->container['childrenLocked'];
    }

    /**
     * Sets childrenLocked
     *
     * @param bool $childrenLocked The children lock
     *
     * @return $this
     */
    public function setChildrenLocked($childrenLocked)
    {
        $this->container['childrenLocked'] = $childrenLocked;

        return $this;
    }

    /**
     * Gets userLocked
     *
     * @return bool
     */
    public function getUserLocked()
    {
        return $this->container['userLocked'];
    }

    /**
     * Sets userLocked
     *
     * @param bool $userLocked The user lock
     *
     * @return $this
     */
    public function setUserLocked($userLocked)
    {
        $this->container['userLocked'] = $userLocked;

        return $this;
    }

    /**
     * Gets effective
     *
     * @return bool
     */
    public function getEffective()
    {
        return $this->container['effective'];
    }

    /**
     * Sets effective
     *
     * @param bool $effective The current active lock for the user
     *
     * @return $this
     */
    public function setEffective($effective)
    {
        $this->container['effective'] = $effective;

        return $this;
    }

    /**
     * Gets childrenRem
     *
     * @return \Domainrobot\Model\BasicUser[]
     */
    public function getChildrenRem()
    {
        return $this->container['childrenRem'];
    }

    /**
     * Sets childrenRem
     *
     * @param \Domainrobot\Model\BasicUser[] $childrenRem Children to remove from the exception list
     *
     * @return $this
     */
    public function setChildrenRem($childrenRem)
    {
        $this->container['childrenRem'] = $childrenRem;

        return $this;
    }

    /**
     * Gets childrenAdd
     *
     * @return \Domainrobot\Model\BasicUser[]
     */
    public function getChildrenAdd()
    {
        return $this->container['childrenAdd'];
    }

    /**
     * Sets childrenAdd
     *
     * @param \Domainrobot\Model\BasicUser[] $childrenAdd Children to add to the exception list
     *
     * @return $this
     */
    public function setChildrenAdd($childrenAdd)
    {
        $this->container['childrenAdd'] = $childrenAdd;

        return $this;
    }

    /**
     * Gets restriction
     *
     * @return \Domainrobot\Model\ACLRestriction
     */
    public function getRestriction()
    {
        return $this->container['restriction'];
    }

    /**
     * Sets restriction
     *
     * @param \Domainrobot\Model\ACLRestriction $restriction The human readable restriction mode
     *
     * @return $this
     */
    public function setRestriction($restriction)
    {
        $this->container['restriction'] = $restriction;

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
        };
        return $container;
    }
}


