<?php
/**
 * ObjectJob
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
 * ObjectJob Class Doc Comment
 *
 * @category Class
 * @package  Domainrobot
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class ObjectJob implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'ObjectJob';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'job' => '\Domainrobot\Model\Job',
        'object' => '\Domainrobot\Model\ResponseObject',
        'niccomLogs' => '\Domainrobot\Model\NiccomLog[]',
        'authentication' => '\Domainrobot\Model\CertAuthenticationStatus[]',
        'dcvAuth' => '\Domainrobot\Model\DomainControllValidationStatus[]',
        'notices' => 'string[]'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'job' => null,
        'object' => null,
        'niccomLogs' => null,
        'authentication' => null,
        'dcvAuth' => null,
        'notices' => null
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
        'job' => 'job',
        'object' => 'object',
        'niccomLogs' => 'niccomLogs',
        'authentication' => 'authentication',
        'dcvAuth' => 'dcvAuth',
        'notices' => 'notices'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'job' => 'setJob',
        'object' => 'setObject',
        'niccomLogs' => 'setNiccomLogs',
        'authentication' => 'setAuthentication',
        'dcvAuth' => 'setDcvAuth',
        'notices' => 'setNotices'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'job' => 'getJob',
        'object' => 'getObject',
        'niccomLogs' => 'getNiccomLogs',
        'authentication' => 'getAuthentication',
        'dcvAuth' => 'getDcvAuth',
        'notices' => 'getNotices'
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
        $this->container['job'] = isset($data['job']) ? $this->createData($data['job'], 'job')  : null;
        $this->container['object'] = isset($data['object']) ? $this->createData($data['object'], 'object')  : null;
        $this->container['niccomLogs'] = isset($data['niccomLogs']) ? $this->createData($data['niccomLogs'], 'niccomLogs')  : null;
        $this->container['authentication'] = isset($data['authentication']) ? $this->createData($data['authentication'], 'authentication')  : null;
        $this->container['dcvAuth'] = isset($data['dcvAuth']) ? $this->createData($data['dcvAuth'], 'dcvAuth')  : null;
        $this->container['notices'] = isset($data['notices']) ? $this->createData($data['notices'], 'notices')  : null;
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
     * Gets job
     *
     * @return \Domainrobot\Model\Job
     */
    public function getJob()
    {
        return $this->container['job'];
    }

    /**
     * Sets job
     *
     * @param \Domainrobot\Model\Job $job The related job.
     *
     * @return $this
     */
    public function setJob($job)
    {
        $this->container['job'] = $job;

        return $this;
    }

    /**
     * Gets object
     *
     * @return \Domainrobot\Model\ResponseObject
     */
    public function getObject()
    {
        return $this->container['object'];
    }

    /**
     * Sets object
     *
     * @param \Domainrobot\Model\ResponseObject $object The object of the job or notify.
     *
     * @return $this
     */
    public function setObject($object)
    {
        $this->container['object'] = $object;

        return $this;
    }

    /**
     * Gets niccomLogs
     *
     * @return \Domainrobot\Model\NiccomLog[]
     */
    public function getNiccomLogs()
    {
        return $this->container['niccomLogs'];
    }

    /**
     * Sets niccomLogs
     *
     * @param \Domainrobot\Model\NiccomLog[] $niccomLogs The niccom logs.
     *
     * @return $this
     */
    public function setNiccomLogs($niccomLogs)
    {
        $this->container['niccomLogs'] = $niccomLogs;

        return $this;
    }

    /**
     * Gets authentication
     *
     * @return \Domainrobot\Model\CertAuthenticationStatus[]
     */
    public function getAuthentication()
    {
        return $this->container['authentication'];
    }

    /**
     * Sets authentication
     *
     * @param \Domainrobot\Model\CertAuthenticationStatus[] $authentication The overall authentication status for a certificate request.
     *
     * @return $this
     */
    public function setAuthentication($authentication)
    {
        $this->container['authentication'] = $authentication;

        return $this;
    }

    /**
     * Gets dcvAuth
     *
     * @return \Domainrobot\Model\DomainControllValidationStatus[]
     */
    public function getDcvAuth()
    {
        return $this->container['dcvAuth'];
    }

    /**
     * Sets dcvAuth
     *
     * @param \Domainrobot\Model\DomainControllValidationStatus[] $dcvAuth The domain controll validation status for each domain.
     *
     * @return $this
     */
    public function setDcvAuth($dcvAuth)
    {
        $this->container['dcvAuth'] = $dcvAuth;

        return $this;
    }

    /**
     * Gets notices
     *
     * @return string[]
     */
    public function getNotices()
    {
        return $this->container['notices'];
    }

    /**
     * Sets notices
     *
     * @param string[] $notices Additional notices of the order
     *
     * @return $this
     */
    public function setNotices($notices)
    {
        $this->container['notices'] = $notices;

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


