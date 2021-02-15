<?php
/**
 * DomainPreregAddon
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
 * DomainPreregAddon Class Doc Comment
 *
 * @category Class
 * @package  Domainrobot
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class DomainPreregAddon implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'DomainPreregAddon';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'irpAppCapacit' => 'string',
        'irpAppDate' => '\DateTime',
        'irpCcLocality' => 'string',
        'irpName' => 'string',
        'irpNumber' => 'string',
        'irpPvrc' => 'string',
        'irpRegDate' => '\DateTime',
        'mode' => 'string',
        'confirmOrder' => 'bool',
        'externalReference' => 'string',
        'notAfter' => '\DateTime',
        'confirmed' => '\DateTime',
        'confirmIp' => 'string',
        'priceClass' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'irpAppCapacit' => null,
        'irpAppDate' => 'date-time',
        'irpCcLocality' => null,
        'irpName' => null,
        'irpNumber' => null,
        'irpPvrc' => null,
        'irpRegDate' => 'date-time',
        'mode' => null,
        'confirmOrder' => null,
        'externalReference' => null,
        'notAfter' => 'date-time',
        'confirmed' => 'date-time',
        'confirmIp' => null,
        'priceClass' => null
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
        'irpAppCapacit' => 'irpAppCapacit',
        'irpAppDate' => 'irpAppDate',
        'irpCcLocality' => 'irpCcLocality',
        'irpName' => 'irpName',
        'irpNumber' => 'irpNumber',
        'irpPvrc' => 'irpPvrc',
        'irpRegDate' => 'irpRegDate',
        'mode' => 'mode',
        'confirmOrder' => 'confirmOrder',
        'externalReference' => 'externalReference',
        'notAfter' => 'notAfter',
        'confirmed' => 'confirmed',
        'confirmIp' => 'confirmIp',
        'priceClass' => 'priceClass'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'irpAppCapacit' => 'setIrpAppCapacit',
        'irpAppDate' => 'setIrpAppDate',
        'irpCcLocality' => 'setIrpCcLocality',
        'irpName' => 'setIrpName',
        'irpNumber' => 'setIrpNumber',
        'irpPvrc' => 'setIrpPvrc',
        'irpRegDate' => 'setIrpRegDate',
        'mode' => 'setMode',
        'confirmOrder' => 'setConfirmOrder',
        'externalReference' => 'setExternalReference',
        'notAfter' => 'setNotAfter',
        'confirmed' => 'setConfirmed',
        'confirmIp' => 'setConfirmIp',
        'priceClass' => 'setPriceClass'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'irpAppCapacit' => 'getIrpAppCapacit',
        'irpAppDate' => 'getIrpAppDate',
        'irpCcLocality' => 'getIrpCcLocality',
        'irpName' => 'getIrpName',
        'irpNumber' => 'getIrpNumber',
        'irpPvrc' => 'getIrpPvrc',
        'irpRegDate' => 'getIrpRegDate',
        'mode' => 'getMode',
        'confirmOrder' => 'getConfirmOrder',
        'externalReference' => 'getExternalReference',
        'notAfter' => 'getNotAfter',
        'confirmed' => 'getConfirmed',
        'confirmIp' => 'getConfirmIp',
        'priceClass' => 'getPriceClass'
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
        $this->container['irpAppCapacit'] = isset($data['irpAppCapacit']) ? $this->createData($data['irpAppCapacit'], 'irpAppCapacit')  : null;
        $this->container['irpAppDate'] = isset($data['irpAppDate']) ? $this->createData($data['irpAppDate'], 'irpAppDate')  : null;
        $this->container['irpCcLocality'] = isset($data['irpCcLocality']) ? $this->createData($data['irpCcLocality'], 'irpCcLocality')  : null;
        $this->container['irpName'] = isset($data['irpName']) ? $this->createData($data['irpName'], 'irpName')  : null;
        $this->container['irpNumber'] = isset($data['irpNumber']) ? $this->createData($data['irpNumber'], 'irpNumber')  : null;
        $this->container['irpPvrc'] = isset($data['irpPvrc']) ? $this->createData($data['irpPvrc'], 'irpPvrc')  : null;
        $this->container['irpRegDate'] = isset($data['irpRegDate']) ? $this->createData($data['irpRegDate'], 'irpRegDate')  : null;
        $this->container['mode'] = isset($data['mode']) ? $this->createData($data['mode'], 'mode')  : null;
        $this->container['confirmOrder'] = isset($data['confirmOrder']) ? $this->createData($data['confirmOrder'], 'confirmOrder')  : null;
        $this->container['externalReference'] = isset($data['externalReference']) ? $this->createData($data['externalReference'], 'externalReference')  : null;
        $this->container['notAfter'] = isset($data['notAfter']) ? $this->createData($data['notAfter'], 'notAfter')  : null;
        $this->container['confirmed'] = isset($data['confirmed']) ? $this->createData($data['confirmed'], 'confirmed')  : null;
        $this->container['confirmIp'] = isset($data['confirmIp']) ? $this->createData($data['confirmIp'], 'confirmIp')  : null;
        $this->container['priceClass'] = isset($data['priceClass']) ? $this->createData($data['priceClass'], 'priceClass')  : null;
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
     * Gets irpAppCapacit
     *
     * @return string
     */
    public function getIrpAppCapacit()
    {
        return $this->container['irpAppCapacit'];
    }

    /**
     * Sets irpAppCapacit
     *
     * @param string $irpAppCapacit The Irp App Capacity.
     *
     * @return $this
     */
    public function setIrpAppCapacit($irpAppCapacit)
    {
        $this->container['irpAppCapacit'] = $irpAppCapacit;

        return $this;
    }

    /**
     * Gets irpAppDate
     *
     * @return \DateTime
     */
    public function getIrpAppDate()
    {
        return $this->container['irpAppDate'];
    }

    /**
     * Sets irpAppDate
     *
     * @param \DateTime $irpAppDate The Irp App Date.
     *
     * @return $this
     */
    public function setIrpAppDate($irpAppDate)
    {
        $this->container['irpAppDate'] = $irpAppDate;

        return $this;
    }

    /**
     * Gets irpCcLocality
     *
     * @return string
     */
    public function getIrpCcLocality()
    {
        return $this->container['irpCcLocality'];
    }

    /**
     * Sets irpCcLocality
     *
     * @param string $irpCcLocality The Irp Cc Locality.
     *
     * @return $this
     */
    public function setIrpCcLocality($irpCcLocality)
    {
        $this->container['irpCcLocality'] = $irpCcLocality;

        return $this;
    }

    /**
     * Gets irpName
     *
     * @return string
     */
    public function getIrpName()
    {
        return $this->container['irpName'];
    }

    /**
     * Sets irpName
     *
     * @param string $irpName The Irp Name.
     *
     * @return $this
     */
    public function setIrpName($irpName)
    {
        $this->container['irpName'] = $irpName;

        return $this;
    }

    /**
     * Gets irpNumber
     *
     * @return string
     */
    public function getIrpNumber()
    {
        return $this->container['irpNumber'];
    }

    /**
     * Sets irpNumber
     *
     * @param string $irpNumber The Irp Number.
     *
     * @return $this
     */
    public function setIrpNumber($irpNumber)
    {
        $this->container['irpNumber'] = $irpNumber;

        return $this;
    }

    /**
     * Gets irpPvrc
     *
     * @return string
     */
    public function getIrpPvrc()
    {
        return $this->container['irpPvrc'];
    }

    /**
     * Sets irpPvrc
     *
     * @param string $irpPvrc The Irp Pvrc.
     *
     * @return $this
     */
    public function setIrpPvrc($irpPvrc)
    {
        $this->container['irpPvrc'] = $irpPvrc;

        return $this;
    }

    /**
     * Gets irpRegDate
     *
     * @return \DateTime
     */
    public function getIrpRegDate()
    {
        return $this->container['irpRegDate'];
    }

    /**
     * Sets irpRegDate
     *
     * @param \DateTime $irpRegDate The Irp Reg Date.
     *
     * @return $this
     */
    public function setIrpRegDate($irpRegDate)
    {
        $this->container['irpRegDate'] = $irpRegDate;

        return $this;
    }

    /**
     * Gets mode
     *
     * @return string
     */
    public function getMode()
    {
        return $this->container['mode'];
    }

    /**
     * Sets mode
     *
     * @param string $mode The addon update mode.
     *
     * @return $this
     */
    public function setMode($mode)
    {
        $this->container['mode'] = $mode;

        return $this;
    }

    /**
     * Gets confirmOrder
     *
     * @return bool
     */
    public function getConfirmOrder()
    {
        return $this->container['confirmOrder'];
    }

    /**
     * Sets confirmOrder
     *
     * @param bool $confirmOrder Confirm order.
     *
     * @return $this
     */
    public function setConfirmOrder($confirmOrder)
    {
        $this->container['confirmOrder'] = $confirmOrder;

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
     * @param string $externalReference The external reference.
     *
     * @return $this
     */
    public function setExternalReference($externalReference)
    {
        $this->container['externalReference'] = $externalReference;

        return $this;
    }

    /**
     * Gets notAfter
     *
     * @return \DateTime
     */
    public function getNotAfter()
    {
        return $this->container['notAfter'];
    }

    /**
     * Sets notAfter
     *
     * @param \DateTime $notAfter The not after date.
     *
     * @return $this
     */
    public function setNotAfter($notAfter)
    {
        $this->container['notAfter'] = $notAfter;

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
     * @param \DateTime $confirmed The confirmed date.
     *
     * @return $this
     */
    public function setConfirmed($confirmed)
    {
        $this->container['confirmed'] = $confirmed;

        return $this;
    }

    /**
     * Gets confirmIp
     *
     * @return string
     */
    public function getConfirmIp()
    {
        return $this->container['confirmIp'];
    }

    /**
     * Sets confirmIp
     *
     * @param string $confirmIp The confirm ip.
     *
     * @return $this
     */
    public function setConfirmIp($confirmIp)
    {
        $this->container['confirmIp'] = $confirmIp;

        return $this;
    }

    /**
     * Gets priceClass
     *
     * @return string
     */
    public function getPriceClass()
    {
        return $this->container['priceClass'];
    }

    /**
     * Sets priceClass
     *
     * @param string $priceClass The price class.
     *
     * @return $this
     */
    public function setPriceClass($priceClass)
    {
        $this->container['priceClass'] = $priceClass;

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


