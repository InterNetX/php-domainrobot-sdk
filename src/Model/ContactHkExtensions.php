<?php
/**
 * ContactHkExtensions
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
 * ContactHkExtensions Class Doc Comment
 *
 * @category Class
 * @package  Domainrobot
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class ContactHkExtensions implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'ContactHkExtensions';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'documentType' => '\Domainrobot\Model\HkDocumentTypeConstants',
        'others' => 'string',
        'documentNumber' => 'string',
        'documentOrigin' => 'string',
        'above18' => 'bool',
        'industryType' => '\Domainrobot\Model\HkIndustryTypeConstants'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'documentType' => null,
        'others' => null,
        'documentNumber' => null,
        'documentOrigin' => null,
        'above18' => null,
        'industryType' => null
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
        'documentType' => 'documentType',
        'others' => 'others',
        'documentNumber' => 'documentNumber',
        'documentOrigin' => 'documentOrigin',
        'above18' => 'above18',
        'industryType' => 'industryType'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'documentType' => 'setDocumentType',
        'others' => 'setOthers',
        'documentNumber' => 'setDocumentNumber',
        'documentOrigin' => 'setDocumentOrigin',
        'above18' => 'setAbove18',
        'industryType' => 'setIndustryType'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'documentType' => 'getDocumentType',
        'others' => 'getOthers',
        'documentNumber' => 'getDocumentNumber',
        'documentOrigin' => 'getDocumentOrigin',
        'above18' => 'getAbove18',
        'industryType' => 'getIndustryType'
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
        $this->container['documentType'] = isset($data['documentType']) ? $this->createData($data['documentType'], 'documentType')  : null;
        $this->container['others'] = isset($data['others']) ? $this->createData($data['others'], 'others')  : null;
        $this->container['documentNumber'] = isset($data['documentNumber']) ? $this->createData($data['documentNumber'], 'documentNumber')  : null;
        $this->container['documentOrigin'] = isset($data['documentOrigin']) ? $this->createData($data['documentOrigin'], 'documentOrigin')  : null;
        $this->container['above18'] = isset($data['above18']) ? $this->createData($data['above18'], 'above18')  : null;
        $this->container['industryType'] = isset($data['industryType']) ? $this->createData($data['industryType'], 'industryType')  : null;
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
     * Gets documentType
     *
     * @return \Domainrobot\Model\HkDocumentTypeConstants
     */
    public function getDocumentType()
    {
        return $this->container['documentType'];
    }

    /**
     * Sets documentType
     *
     * @param \Domainrobot\Model\HkDocumentTypeConstants $documentType The document types.
     *
     * @return $this
     */
    public function setDocumentType($documentType)
    {
        $this->container['documentType'] = $documentType;

        return $this;
    }

    /**
     * Gets others
     *
     * @return string
     */
    public function getOthers()
    {
        return $this->container['others'];
    }

    /**
     * Sets others
     *
     * @param string $others Additional descriptions for OTHIDV and OTHORG.
     *
     * @return $this
     */
    public function setOthers($others)
    {
        $this->container['others'] = $others;

        return $this;
    }

    /**
     * Gets documentNumber
     *
     * @return string
     */
    public function getDocumentNumber()
    {
        return $this->container['documentNumber'];
    }

    /**
     * Sets documentNumber
     *
     * @param string $documentNumber Document number.
     *
     * @return $this
     */
    public function setDocumentNumber($documentNumber)
    {
        $this->container['documentNumber'] = $documentNumber;

        return $this;
    }

    /**
     * Gets documentOrigin
     *
     * @return string
     */
    public function getDocumentOrigin()
    {
        return $this->container['documentOrigin'];
    }

    /**
     * Sets documentOrigin
     *
     * @param string $documentOrigin Country of licensure.
     *
     * @return $this
     */
    public function setDocumentOrigin($documentOrigin)
    {
        $this->container['documentOrigin'] = $documentOrigin;

        return $this;
    }

    /**
     * Gets above18
     *
     * @return bool
     */
    public function getAbove18()
    {
        return $this->container['above18'];
    }

    /**
     * Sets above18
     *
     * @param bool $above18 Is the person 18 years of age or older. For Person only.
     *
     * @return $this
     */
    public function setAbove18($above18)
    {
        $this->container['above18'] = $above18;

        return $this;
    }

    /**
     * Gets industryType
     *
     * @return \Domainrobot\Model\HkIndustryTypeConstants
     */
    public function getIndustryType()
    {
        return $this->container['industryType'];
    }

    /**
     * Sets industryType
     *
     * @param \Domainrobot\Model\HkIndustryTypeConstants $industryType The industry types.
     *
     * @return $this
     */
    public function setIndustryType($industryType)
    {
        $this->container['industryType'] = $industryType;

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


