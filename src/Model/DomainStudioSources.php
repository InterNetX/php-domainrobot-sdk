<?php
/**
 * DomainStudioSources
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
 * DomainStudioSources Class Doc Comment
 *
 * @category Class
 * @package  Domainrobot
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class DomainStudioSources implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'DomainStudioSources';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'initial' => '\Domainrobot\Model\DomainStudioSourceInitial',
        'suggestion' => '\Domainrobot\Model\DomainStudioSourceSuggestion',
        'premium' => '\Domainrobot\Model\DomainStudioSourcePremium',
        'market' => '\Domainrobot\Model\DomainStudioSourceMarket',
        'geo' => '\Domainrobot\Model\DomainStudioSourceGeo',
        'similar' => '\Domainrobot\Model\DomainStudioSourceSimilar',
        'recommended' => '\Domainrobot\Model\DomainStudioSourceRecommended',
        'custom' => '\Domainrobot\Model\DomainStudioSourceCustom',
        'onlinePresence' => '\Domainrobot\Model\DomainStudioSourceOnlinePresence',
        'personalNames' => '\Domainrobot\Model\DomainStudioSourcePersonalNames',
        'spinWord' => '\Domainrobot\Model\DomainStudioSourceSpinWord',
        'upcoming' => '\Domainrobot\Model\DomainStudioSourceUpcoming',
        'prefixSuffix' => '\Domainrobot\Model\DomainStudioSourcePrefixSuffix'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'initial' => null,
        'suggestion' => null,
        'premium' => null,
        'market' => null,
        'geo' => null,
        'similar' => null,
        'recommended' => null,
        'custom' => null,
        'onlinePresence' => null,
        'personalNames' => null,
        'spinWord' => null,
        'upcoming' => null,
        'prefixSuffix' => null
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
        'initial' => 'initial',
        'suggestion' => 'suggestion',
        'premium' => 'premium',
        'market' => 'market',
        'geo' => 'geo',
        'similar' => 'similar',
        'recommended' => 'recommended',
        'custom' => 'custom',
        'onlinePresence' => 'onlinePresence',
        'personalNames' => 'personalNames',
        'spinWord' => 'spinWord',
        'upcoming' => 'upcoming',
        'prefixSuffix' => 'prefixSuffix'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'initial' => 'setInitial',
        'suggestion' => 'setSuggestion',
        'premium' => 'setPremium',
        'market' => 'setMarket',
        'geo' => 'setGeo',
        'similar' => 'setSimilar',
        'recommended' => 'setRecommended',
        'custom' => 'setCustom',
        'onlinePresence' => 'setOnlinePresence',
        'personalNames' => 'setPersonalNames',
        'spinWord' => 'setSpinWord',
        'upcoming' => 'setUpcoming',
        'prefixSuffix' => 'setPrefixSuffix'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'initial' => 'getInitial',
        'suggestion' => 'getSuggestion',
        'premium' => 'getPremium',
        'market' => 'getMarket',
        'geo' => 'getGeo',
        'similar' => 'getSimilar',
        'recommended' => 'getRecommended',
        'custom' => 'getCustom',
        'onlinePresence' => 'getOnlinePresence',
        'personalNames' => 'getPersonalNames',
        'spinWord' => 'getSpinWord',
        'upcoming' => 'getUpcoming',
        'prefixSuffix' => 'getPrefixSuffix'
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
        $this->container['initial'] = isset($data['initial']) ? $this->createData($data['initial'], 'initial')  : null;
        $this->container['suggestion'] = isset($data['suggestion']) ? $this->createData($data['suggestion'], 'suggestion')  : null;
        $this->container['premium'] = isset($data['premium']) ? $this->createData($data['premium'], 'premium')  : null;
        $this->container['market'] = isset($data['market']) ? $this->createData($data['market'], 'market')  : null;
        $this->container['geo'] = isset($data['geo']) ? $this->createData($data['geo'], 'geo')  : null;
        $this->container['similar'] = isset($data['similar']) ? $this->createData($data['similar'], 'similar')  : null;
        $this->container['recommended'] = isset($data['recommended']) ? $this->createData($data['recommended'], 'recommended')  : null;
        $this->container['custom'] = isset($data['custom']) ? $this->createData($data['custom'], 'custom')  : null;
        $this->container['onlinePresence'] = isset($data['onlinePresence']) ? $this->createData($data['onlinePresence'], 'onlinePresence')  : null;
        $this->container['personalNames'] = isset($data['personalNames']) ? $this->createData($data['personalNames'], 'personalNames')  : null;
        $this->container['spinWord'] = isset($data['spinWord']) ? $this->createData($data['spinWord'], 'spinWord')  : null;
        $this->container['upcoming'] = isset($data['upcoming']) ? $this->createData($data['upcoming'], 'upcoming')  : null;
        $this->container['prefixSuffix'] = isset($data['prefixSuffix']) ? $this->createData($data['prefixSuffix'], 'prefixSuffix')  : null;
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
     * Gets initial
     *
     * @return \Domainrobot\Model\DomainStudioSourceInitial
     */
    public function getInitial()
    {
        return $this->container['initial'];
    }

    /**
     * Sets initial
     *
     * @param \Domainrobot\Model\DomainStudioSourceInitial $initial The configuration for the initial source
     *
     * @return $this
     */
    public function setInitial($initial)
    {
        $this->container['initial'] = $initial;

        return $this;
    }

    /**
     * Gets suggestion
     *
     * @return \Domainrobot\Model\DomainStudioSourceSuggestion
     */
    public function getSuggestion()
    {
        return $this->container['suggestion'];
    }

    /**
     * Sets suggestion
     *
     * @param \Domainrobot\Model\DomainStudioSourceSuggestion $suggestion The configuration for the suggestion source
     *
     * @return $this
     */
    public function setSuggestion($suggestion)
    {
        $this->container['suggestion'] = $suggestion;

        return $this;
    }

    /**
     * Gets premium
     *
     * @return \Domainrobot\Model\DomainStudioSourcePremium
     */
    public function getPremium()
    {
        return $this->container['premium'];
    }

    /**
     * Sets premium
     *
     * @param \Domainrobot\Model\DomainStudioSourcePremium $premium The configuration for the premium source
     *
     * @return $this
     */
    public function setPremium($premium)
    {
        $this->container['premium'] = $premium;

        return $this;
    }

    /**
     * Gets market
     *
     * @return \Domainrobot\Model\DomainStudioSourceMarket
     */
    public function getMarket()
    {
        return $this->container['market'];
    }

    /**
     * Sets market
     *
     * @param \Domainrobot\Model\DomainStudioSourceMarket $market The configuration for the market source
     *
     * @return $this
     */
    public function setMarket($market)
    {
        $this->container['market'] = $market;

        return $this;
    }

    /**
     * Gets geo
     *
     * @return \Domainrobot\Model\DomainStudioSourceGeo
     */
    public function getGeo()
    {
        return $this->container['geo'];
    }

    /**
     * Sets geo
     *
     * @param \Domainrobot\Model\DomainStudioSourceGeo $geo The configuration for the geo source
     *
     * @return $this
     */
    public function setGeo($geo)
    {
        $this->container['geo'] = $geo;

        return $this;
    }

    /**
     * Gets similar
     *
     * @return \Domainrobot\Model\DomainStudioSourceSimilar
     */
    public function getSimilar()
    {
        return $this->container['similar'];
    }

    /**
     * Sets similar
     *
     * @param \Domainrobot\Model\DomainStudioSourceSimilar $similar The configuration for the similar source
     *
     * @return $this
     */
    public function setSimilar($similar)
    {
        $this->container['similar'] = $similar;

        return $this;
    }

    /**
     * Gets recommended
     *
     * @return \Domainrobot\Model\DomainStudioSourceRecommended
     */
    public function getRecommended()
    {
        return $this->container['recommended'];
    }

    /**
     * Sets recommended
     *
     * @param \Domainrobot\Model\DomainStudioSourceRecommended $recommended The configuration for the recommended source
     *
     * @return $this
     */
    public function setRecommended($recommended)
    {
        $this->container['recommended'] = $recommended;

        return $this;
    }

    /**
     * Gets custom
     *
     * @return \Domainrobot\Model\DomainStudioSourceCustom
     */
    public function getCustom()
    {
        return $this->container['custom'];
    }

    /**
     * Sets custom
     *
     * @param \Domainrobot\Model\DomainStudioSourceCustom $custom The configuration for the custom source
     *
     * @return $this
     */
    public function setCustom($custom)
    {
        $this->container['custom'] = $custom;

        return $this;
    }

    /**
     * Gets onlinePresence
     *
     * @return \Domainrobot\Model\DomainStudioSourceOnlinePresence
     */
    public function getOnlinePresence()
    {
        return $this->container['onlinePresence'];
    }

    /**
     * Sets onlinePresence
     *
     * @param \Domainrobot\Model\DomainStudioSourceOnlinePresence $onlinePresence The configuration for the online presence source
     *
     * @return $this
     */
    public function setOnlinePresence($onlinePresence)
    {
        $this->container['onlinePresence'] = $onlinePresence;

        return $this;
    }

    /**
     * Gets personalNames
     *
     * @return \Domainrobot\Model\DomainStudioSourcePersonalNames
     */
    public function getPersonalNames()
    {
        return $this->container['personalNames'];
    }

    /**
     * Sets personalNames
     *
     * @param \Domainrobot\Model\DomainStudioSourcePersonalNames $personalNames The configuration for the personal names source
     *
     * @return $this
     */
    public function setPersonalNames($personalNames)
    {
        $this->container['personalNames'] = $personalNames;

        return $this;
    }

    /**
     * Gets spinWord
     *
     * @return \Domainrobot\Model\DomainStudioSourceSpinWord
     */
    public function getSpinWord()
    {
        return $this->container['spinWord'];
    }

    /**
     * Sets spinWord
     *
     * @param \Domainrobot\Model\DomainStudioSourceSpinWord $spinWord The configuration for the spin word source
     *
     * @return $this
     */
    public function setSpinWord($spinWord)
    {
        $this->container['spinWord'] = $spinWord;

        return $this;
    }

    /**
     * Gets upcoming
     *
     * @return \Domainrobot\Model\DomainStudioSourceUpcoming
     */
    public function getUpcoming()
    {
        return $this->container['upcoming'];
    }

    /**
     * Sets upcoming
     *
     * @param \Domainrobot\Model\DomainStudioSourceUpcoming $upcoming The configuration for the upcoming source
     *
     * @return $this
     */
    public function setUpcoming($upcoming)
    {
        $this->container['upcoming'] = $upcoming;

        return $this;
    }

    /**
     * Gets prefixSuffix
     *
     * @return \Domainrobot\Model\DomainStudioSourcePrefixSuffix
     */
    public function getPrefixSuffix()
    {
        return $this->container['prefixSuffix'];
    }

    /**
     * Sets prefixSuffix
     *
     * @param \Domainrobot\Model\DomainStudioSourcePrefixSuffix $prefixSuffix The configuration for the prefix suffix source
     *
     * @return $this
     */
    public function setPrefixSuffix($prefixSuffix)
    {
        $this->container['prefixSuffix'] = $prefixSuffix;

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


