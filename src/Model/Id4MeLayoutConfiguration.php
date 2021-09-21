<?php
/**
 * Id4MeLayoutConfiguration
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
 * Id4MeLayoutConfiguration Class Doc Comment
 *
 * @category Class
 * @package  Domainrobot
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class Id4MeLayoutConfiguration implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'Id4MeLayoutConfiguration';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'title' => 'string',
        'privacy' => 'string',
        'loginLogoWidth' => 'string',
        'menuLogoHeight' => 'string',
        'menuLogoWidth' => 'string',
        'primaryColor' => 'string',
        'primaryText' => 'string',
        'secondaryColor' => 'string',
        'loginLogoSrc' => 'string',
        'menuLogoSrc' => 'string',
        'loginLogoHeight' => 'string',
        'about' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'title' => null,
        'privacy' => null,
        'loginLogoWidth' => null,
        'menuLogoHeight' => null,
        'menuLogoWidth' => null,
        'primaryColor' => null,
        'primaryText' => null,
        'secondaryColor' => null,
        'loginLogoSrc' => null,
        'menuLogoSrc' => null,
        'loginLogoHeight' => null,
        'about' => null
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
        'title' => 'title',
        'privacy' => 'privacy',
        'loginLogoWidth' => 'loginLogoWidth',
        'menuLogoHeight' => 'menuLogoHeight',
        'menuLogoWidth' => 'menuLogoWidth',
        'primaryColor' => 'primaryColor',
        'primaryText' => 'primaryText',
        'secondaryColor' => 'secondaryColor',
        'loginLogoSrc' => 'loginLogoSrc',
        'menuLogoSrc' => 'menuLogoSrc',
        'loginLogoHeight' => 'loginLogoHeight',
        'about' => 'about'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'title' => 'setTitle',
        'privacy' => 'setPrivacy',
        'loginLogoWidth' => 'setLoginLogoWidth',
        'menuLogoHeight' => 'setMenuLogoHeight',
        'menuLogoWidth' => 'setMenuLogoWidth',
        'primaryColor' => 'setPrimaryColor',
        'primaryText' => 'setPrimaryText',
        'secondaryColor' => 'setSecondaryColor',
        'loginLogoSrc' => 'setLoginLogoSrc',
        'menuLogoSrc' => 'setMenuLogoSrc',
        'loginLogoHeight' => 'setLoginLogoHeight',
        'about' => 'setAbout'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'title' => 'getTitle',
        'privacy' => 'getPrivacy',
        'loginLogoWidth' => 'getLoginLogoWidth',
        'menuLogoHeight' => 'getMenuLogoHeight',
        'menuLogoWidth' => 'getMenuLogoWidth',
        'primaryColor' => 'getPrimaryColor',
        'primaryText' => 'getPrimaryText',
        'secondaryColor' => 'getSecondaryColor',
        'loginLogoSrc' => 'getLoginLogoSrc',
        'menuLogoSrc' => 'getMenuLogoSrc',
        'loginLogoHeight' => 'getLoginLogoHeight',
        'about' => 'getAbout'
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
        $this->container['title'] = isset($data['title']) ? $this->createData($data['title'], 'title')  : null;
        $this->container['privacy'] = isset($data['privacy']) ? $this->createData($data['privacy'], 'privacy')  : null;
        $this->container['loginLogoWidth'] = isset($data['loginLogoWidth']) ? $this->createData($data['loginLogoWidth'], 'loginLogoWidth')  : null;
        $this->container['menuLogoHeight'] = isset($data['menuLogoHeight']) ? $this->createData($data['menuLogoHeight'], 'menuLogoHeight')  : null;
        $this->container['menuLogoWidth'] = isset($data['menuLogoWidth']) ? $this->createData($data['menuLogoWidth'], 'menuLogoWidth')  : null;
        $this->container['primaryColor'] = isset($data['primaryColor']) ? $this->createData($data['primaryColor'], 'primaryColor')  : null;
        $this->container['primaryText'] = isset($data['primaryText']) ? $this->createData($data['primaryText'], 'primaryText')  : null;
        $this->container['secondaryColor'] = isset($data['secondaryColor']) ? $this->createData($data['secondaryColor'], 'secondaryColor')  : null;
        $this->container['loginLogoSrc'] = isset($data['loginLogoSrc']) ? $this->createData($data['loginLogoSrc'], 'loginLogoSrc')  : null;
        $this->container['menuLogoSrc'] = isset($data['menuLogoSrc']) ? $this->createData($data['menuLogoSrc'], 'menuLogoSrc')  : null;
        $this->container['loginLogoHeight'] = isset($data['loginLogoHeight']) ? $this->createData($data['loginLogoHeight'], 'loginLogoHeight')  : null;
        $this->container['about'] = isset($data['about']) ? $this->createData($data['about'], 'about')  : null;
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
     * Gets title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->container['title'];
    }

    /**
     * Sets title
     *
     * @param string $title title
     *
     * @return $this
     */
    public function setTitle($title)
    {
        $this->container['title'] = $title;

        return $this;
    }

    /**
     * Gets privacy
     *
     * @return string
     */
    public function getPrivacy()
    {
        return $this->container['privacy'];
    }

    /**
     * Sets privacy
     *
     * @param string $privacy privacy
     *
     * @return $this
     */
    public function setPrivacy($privacy)
    {
        $this->container['privacy'] = $privacy;

        return $this;
    }

    /**
     * Gets loginLogoWidth
     *
     * @return string
     */
    public function getLoginLogoWidth()
    {
        return $this->container['loginLogoWidth'];
    }

    /**
     * Sets loginLogoWidth
     *
     * @param string $loginLogoWidth loginLogoWidth
     *
     * @return $this
     */
    public function setLoginLogoWidth($loginLogoWidth)
    {
        $this->container['loginLogoWidth'] = $loginLogoWidth;

        return $this;
    }

    /**
     * Gets menuLogoHeight
     *
     * @return string
     */
    public function getMenuLogoHeight()
    {
        return $this->container['menuLogoHeight'];
    }

    /**
     * Sets menuLogoHeight
     *
     * @param string $menuLogoHeight menuLogoHeight
     *
     * @return $this
     */
    public function setMenuLogoHeight($menuLogoHeight)
    {
        $this->container['menuLogoHeight'] = $menuLogoHeight;

        return $this;
    }

    /**
     * Gets menuLogoWidth
     *
     * @return string
     */
    public function getMenuLogoWidth()
    {
        return $this->container['menuLogoWidth'];
    }

    /**
     * Sets menuLogoWidth
     *
     * @param string $menuLogoWidth menuLogoWidth
     *
     * @return $this
     */
    public function setMenuLogoWidth($menuLogoWidth)
    {
        $this->container['menuLogoWidth'] = $menuLogoWidth;

        return $this;
    }

    /**
     * Gets primaryColor
     *
     * @return string
     */
    public function getPrimaryColor()
    {
        return $this->container['primaryColor'];
    }

    /**
     * Sets primaryColor
     *
     * @param string $primaryColor primaryColor
     *
     * @return $this
     */
    public function setPrimaryColor($primaryColor)
    {
        $this->container['primaryColor'] = $primaryColor;

        return $this;
    }

    /**
     * Gets primaryText
     *
     * @return string
     */
    public function getPrimaryText()
    {
        return $this->container['primaryText'];
    }

    /**
     * Sets primaryText
     *
     * @param string $primaryText primaryText
     *
     * @return $this
     */
    public function setPrimaryText($primaryText)
    {
        $this->container['primaryText'] = $primaryText;

        return $this;
    }

    /**
     * Gets secondaryColor
     *
     * @return string
     */
    public function getSecondaryColor()
    {
        return $this->container['secondaryColor'];
    }

    /**
     * Sets secondaryColor
     *
     * @param string $secondaryColor secondaryColor
     *
     * @return $this
     */
    public function setSecondaryColor($secondaryColor)
    {
        $this->container['secondaryColor'] = $secondaryColor;

        return $this;
    }

    /**
     * Gets loginLogoSrc
     *
     * @return string
     */
    public function getLoginLogoSrc()
    {
        return $this->container['loginLogoSrc'];
    }

    /**
     * Sets loginLogoSrc
     *
     * @param string $loginLogoSrc loginLogoSrc
     *
     * @return $this
     */
    public function setLoginLogoSrc($loginLogoSrc)
    {
        $this->container['loginLogoSrc'] = $loginLogoSrc;

        return $this;
    }

    /**
     * Gets menuLogoSrc
     *
     * @return string
     */
    public function getMenuLogoSrc()
    {
        return $this->container['menuLogoSrc'];
    }

    /**
     * Sets menuLogoSrc
     *
     * @param string $menuLogoSrc menuLogoSrc
     *
     * @return $this
     */
    public function setMenuLogoSrc($menuLogoSrc)
    {
        $this->container['menuLogoSrc'] = $menuLogoSrc;

        return $this;
    }

    /**
     * Gets loginLogoHeight
     *
     * @return string
     */
    public function getLoginLogoHeight()
    {
        return $this->container['loginLogoHeight'];
    }

    /**
     * Sets loginLogoHeight
     *
     * @param string $loginLogoHeight loginLogoHeight
     *
     * @return $this
     */
    public function setLoginLogoHeight($loginLogoHeight)
    {
        $this->container['loginLogoHeight'] = $loginLogoHeight;

        return $this;
    }

    /**
     * Gets about
     *
     * @return string
     */
    public function getAbout()
    {
        return $this->container['about'];
    }

    /**
     * Sets about
     *
     * @param string $about about
     *
     * @return $this
     */
    public function setAbout($about)
    {
        $this->container['about'] = $about;

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


