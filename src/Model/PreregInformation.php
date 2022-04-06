<?php
/**
 * PreregInformation
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
 * PreregInformation Class Doc Comment
 *
 * @category Class
 * @package  Domainrobot
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class PreregInformation implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'PreregInformation';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'phase' => 'string',
        'confirmationStart' => '\DateTime',
        'confirmationEnd' => '\DateTime',
        'periodStart' => '\DateTime',
        'periodEnd' => '\DateTime',
        'category' => 'string',
        'registrationType' => 'string',
        'minPeriod' => '\Domainrobot\Model\TimePeriod'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'phase' => null,
        'confirmationStart' => 'date-time',
        'confirmationEnd' => 'date-time',
        'periodStart' => 'date-time',
        'periodEnd' => 'date-time',
        'category' => null,
        'registrationType' => null,
        'minPeriod' => null
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
        'phase' => 'phase',
        'confirmationStart' => 'confirmationStart',
        'confirmationEnd' => 'confirmationEnd',
        'periodStart' => 'periodStart',
        'periodEnd' => 'periodEnd',
        'category' => 'category',
        'registrationType' => 'registrationType',
        'minPeriod' => 'minPeriod'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'phase' => 'setPhase',
        'confirmationStart' => 'setConfirmationStart',
        'confirmationEnd' => 'setConfirmationEnd',
        'periodStart' => 'setPeriodStart',
        'periodEnd' => 'setPeriodEnd',
        'category' => 'setCategory',
        'registrationType' => 'setRegistrationType',
        'minPeriod' => 'setMinPeriod'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'phase' => 'getPhase',
        'confirmationStart' => 'getConfirmationStart',
        'confirmationEnd' => 'getConfirmationEnd',
        'periodStart' => 'getPeriodStart',
        'periodEnd' => 'getPeriodEnd',
        'category' => 'getCategory',
        'registrationType' => 'getRegistrationType',
        'minPeriod' => 'getMinPeriod'
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
        $this->container['phase'] = isset($data['phase']) ? $this->createData($data['phase'], 'phase')  : null;
        $this->container['confirmationStart'] = isset($data['confirmationStart']) ? $this->createData($data['confirmationStart'], 'confirmationStart')  : null;
        $this->container['confirmationEnd'] = isset($data['confirmationEnd']) ? $this->createData($data['confirmationEnd'], 'confirmationEnd')  : null;
        $this->container['periodStart'] = isset($data['periodStart']) ? $this->createData($data['periodStart'], 'periodStart')  : null;
        $this->container['periodEnd'] = isset($data['periodEnd']) ? $this->createData($data['periodEnd'], 'periodEnd')  : null;
        $this->container['category'] = isset($data['category']) ? $this->createData($data['category'], 'category')  : null;
        $this->container['registrationType'] = isset($data['registrationType']) ? $this->createData($data['registrationType'], 'registrationType')  : null;
        $this->container['minPeriod'] = isset($data['minPeriod']) ? $this->createData($data['minPeriod'], 'minPeriod')  : null;
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
     * Gets phase
     *
     * @return string
     */
    public function getPhase()
    {
        return $this->container['phase'];
    }

    /**
     * Sets phase
     *
     * @param string $phase phase
     *
     * @return $this
     */
    public function setPhase($phase)
    {
        $this->container['phase'] = $phase;

        return $this;
    }

    /**
     * Gets confirmationStart
     *
     * @return \DateTime
     */
    public function getConfirmationStart()
    {
        return $this->container['confirmationStart'];
    }

    /**
     * Sets confirmationStart
     *
     * @param \DateTime $confirmationStart confirmationStart
     *
     * @return $this
     */
    public function setConfirmationStart($confirmationStart)
    {
        $this->container['confirmationStart'] = $confirmationStart;

        return $this;
    }

    /**
     * Gets confirmationEnd
     *
     * @return \DateTime
     */
    public function getConfirmationEnd()
    {
        return $this->container['confirmationEnd'];
    }

    /**
     * Sets confirmationEnd
     *
     * @param \DateTime $confirmationEnd confirmationEnd
     *
     * @return $this
     */
    public function setConfirmationEnd($confirmationEnd)
    {
        $this->container['confirmationEnd'] = $confirmationEnd;

        return $this;
    }

    /**
     * Gets periodStart
     *
     * @return \DateTime
     */
    public function getPeriodStart()
    {
        return $this->container['periodStart'];
    }

    /**
     * Sets periodStart
     *
     * @param \DateTime $periodStart periodStart
     *
     * @return $this
     */
    public function setPeriodStart($periodStart)
    {
        $this->container['periodStart'] = $periodStart;

        return $this;
    }

    /**
     * Gets periodEnd
     *
     * @return \DateTime
     */
    public function getPeriodEnd()
    {
        return $this->container['periodEnd'];
    }

    /**
     * Sets periodEnd
     *
     * @param \DateTime $periodEnd periodEnd
     *
     * @return $this
     */
    public function setPeriodEnd($periodEnd)
    {
        $this->container['periodEnd'] = $periodEnd;

        return $this;
    }

    /**
     * Gets category
     *
     * @return string
     */
    public function getCategory()
    {
        return $this->container['category'];
    }

    /**
     * Sets category
     *
     * @param string $category category
     *
     * @return $this
     */
    public function setCategory($category)
    {
        $this->container['category'] = $category;

        return $this;
    }

    /**
     * Gets registrationType
     *
     * @return string
     */
    public function getRegistrationType()
    {
        return $this->container['registrationType'];
    }

    /**
     * Sets registrationType
     *
     * @param string $registrationType registrationType
     *
     * @return $this
     */
    public function setRegistrationType($registrationType)
    {
        $this->container['registrationType'] = $registrationType;

        return $this;
    }

    /**
     * Gets minPeriod
     *
     * @return \Domainrobot\Model\TimePeriod
     */
    public function getMinPeriod()
    {
        return $this->container['minPeriod'];
    }

    /**
     * Sets minPeriod
     *
     * @param \Domainrobot\Model\TimePeriod $minPeriod minPeriod
     *
     * @return $this
     */
    public function setMinPeriod($minPeriod)
    {
        $this->container['minPeriod'] = $minPeriod;

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


