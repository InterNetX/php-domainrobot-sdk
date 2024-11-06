<?php
/**
 * ExternalAccounting
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
 * ExternalAccounting Class Doc Comment
 *
 * @category Class
 * @package  Domainrobot
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class ExternalAccounting implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'ExternalAccounting';

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
        'provider' => '\Domainrobot\Model\ProviderEntity',
        'label' => 'string',
        'reportTo' => 'string',
        'priceType' => '\Domainrobot\Model\PriceTypeConstants',
        'priceMarkupType' => '\Domainrobot\Model\PriceMarkupType',
        'priceMarkup' => 'double',
        'priceRounding' => '\Domainrobot\Model\PriceRoundingConstants',
        'enablePromoPrice' => 'bool',
        'currency' => 'string',
        'country' => 'string',
        'creditorIdentifier' => 'string',
        'customerNumberMin' => 'int',
        'customerNumberMax' => 'int',
        'creditLimit' => 'double',
        'priceListSyncStatus' => '\Domainrobot\Model\GenericStatusConstants',
        'priceListSync' => '\DateTime'
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
        'provider' => null,
        'label' => null,
        'reportTo' => null,
        'priceType' => null,
        'priceMarkupType' => null,
        'priceMarkup' => 'double',
        'priceRounding' => null,
        'enablePromoPrice' => null,
        'currency' => null,
        'country' => null,
        'creditorIdentifier' => null,
        'customerNumberMin' => 'int64',
        'customerNumberMax' => 'int64',
        'creditLimit' => 'double',
        'priceListSyncStatus' => null,
        'priceListSync' => 'date-time'
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
        'provider' => 'provider',
        'label' => 'label',
        'reportTo' => 'reportTo',
        'priceType' => 'priceType',
        'priceMarkupType' => 'priceMarkupType',
        'priceMarkup' => 'priceMarkup',
        'priceRounding' => 'priceRounding',
        'enablePromoPrice' => 'enablePromoPrice',
        'currency' => 'currency',
        'country' => 'country',
        'creditorIdentifier' => 'creditorIdentifier',
        'customerNumberMin' => 'customerNumberMin',
        'customerNumberMax' => 'customerNumberMax',
        'creditLimit' => 'creditLimit',
        'priceListSyncStatus' => 'priceListSyncStatus',
        'priceListSync' => 'priceListSync'
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
        'provider' => 'setProvider',
        'label' => 'setLabel',
        'reportTo' => 'setReportTo',
        'priceType' => 'setPriceType',
        'priceMarkupType' => 'setPriceMarkupType',
        'priceMarkup' => 'setPriceMarkup',
        'priceRounding' => 'setPriceRounding',
        'enablePromoPrice' => 'setEnablePromoPrice',
        'currency' => 'setCurrency',
        'country' => 'setCountry',
        'creditorIdentifier' => 'setCreditorIdentifier',
        'customerNumberMin' => 'setCustomerNumberMin',
        'customerNumberMax' => 'setCustomerNumberMax',
        'creditLimit' => 'setCreditLimit',
        'priceListSyncStatus' => 'setPriceListSyncStatus',
        'priceListSync' => 'setPriceListSync'
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
        'provider' => 'getProvider',
        'label' => 'getLabel',
        'reportTo' => 'getReportTo',
        'priceType' => 'getPriceType',
        'priceMarkupType' => 'getPriceMarkupType',
        'priceMarkup' => 'getPriceMarkup',
        'priceRounding' => 'getPriceRounding',
        'enablePromoPrice' => 'getEnablePromoPrice',
        'currency' => 'getCurrency',
        'country' => 'getCountry',
        'creditorIdentifier' => 'getCreditorIdentifier',
        'customerNumberMin' => 'getCustomerNumberMin',
        'customerNumberMax' => 'getCustomerNumberMax',
        'creditLimit' => 'getCreditLimit',
        'priceListSyncStatus' => 'getPriceListSyncStatus',
        'priceListSync' => 'getPriceListSync'
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
        $this->container['provider'] = isset($data['provider']) ? $this->createData($data['provider'], 'provider')  : null;
        $this->container['label'] = isset($data['label']) ? $this->createData($data['label'], 'label')  : null;
        $this->container['reportTo'] = isset($data['reportTo']) ? $this->createData($data['reportTo'], 'reportTo')  : null;
        $this->container['priceType'] = isset($data['priceType']) ? $this->createData($data['priceType'], 'priceType')  : null;
        $this->container['priceMarkupType'] = isset($data['priceMarkupType']) ? $this->createData($data['priceMarkupType'], 'priceMarkupType')  : null;
        $this->container['priceMarkup'] = isset($data['priceMarkup']) ? $this->createData($data['priceMarkup'], 'priceMarkup')  : null;
        $this->container['priceRounding'] = isset($data['priceRounding']) ? $this->createData($data['priceRounding'], 'priceRounding')  : null;
        $this->container['enablePromoPrice'] = isset($data['enablePromoPrice']) ? $this->createData($data['enablePromoPrice'], 'enablePromoPrice')  : null;
        $this->container['currency'] = isset($data['currency']) ? $this->createData($data['currency'], 'currency')  : null;
        $this->container['country'] = isset($data['country']) ? $this->createData($data['country'], 'country')  : null;
        $this->container['creditorIdentifier'] = isset($data['creditorIdentifier']) ? $this->createData($data['creditorIdentifier'], 'creditorIdentifier')  : null;
        $this->container['customerNumberMin'] = isset($data['customerNumberMin']) ? $this->createData($data['customerNumberMin'], 'customerNumberMin')  : null;
        $this->container['customerNumberMax'] = isset($data['customerNumberMax']) ? $this->createData($data['customerNumberMax'], 'customerNumberMax')  : null;
        $this->container['creditLimit'] = isset($data['creditLimit']) ? $this->createData($data['creditLimit'], 'creditLimit')  : null;
        $this->container['priceListSyncStatus'] = isset($data['priceListSyncStatus']) ? $this->createData($data['priceListSyncStatus'], 'priceListSyncStatus')  : null;
        $this->container['priceListSync'] = isset($data['priceListSync']) ? $this->createData($data['priceListSync'], 'priceListSync')  : null;
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

        if (!is_null($this->container['priceMarkup']) && ($this->container['priceMarkup'] > 10000)) {
            $invalidProperties[] = "invalid value for 'priceMarkup', must be smaller than or equal to 10000.";
        }

        if (!is_null($this->container['priceMarkup']) && ($this->container['priceMarkup'] < 0)) {
            $invalidProperties[] = "invalid value for 'priceMarkup', must be bigger than or equal to 0.";
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
     * Gets provider
     *
     * @return \Domainrobot\Model\ProviderEntity
     */
    public function getProvider()
    {
        return $this->container['provider'];
    }

    /**
     * Sets provider
     *
     * @param \Domainrobot\Model\ProviderEntity $provider The provider of the external_accounting
     *
     * @return $this
     */
    public function setProvider($provider)
    {
        $this->container['provider'] = $provider;

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
     * @param string $label The label to identify the provider
     *
     * @return $this
     */
    public function setLabel($label)
    {
        $this->container['label'] = $label;

        return $this;
    }

    /**
     * Gets reportTo
     *
     * @return string
     */
    public function getReportTo()
    {
        return $this->container['reportTo'];
    }

    /**
     * Sets reportTo
     *
     * @param string $reportTo The email address for reporting
     *
     * @return $this
     */
    public function setReportTo($reportTo)
    {
        $this->container['reportTo'] = $reportTo;

        return $this;
    }

    /**
     * Gets priceType
     *
     * @return \Domainrobot\Model\PriceTypeConstants
     */
    public function getPriceType()
    {
        return $this->container['priceType'];
    }

    /**
     * Sets priceType
     *
     * @param \Domainrobot\Model\PriceTypeConstants $priceType The price type
     *
     * @return $this
     */
    public function setPriceType($priceType)
    {
        $this->container['priceType'] = $priceType;

        return $this;
    }

    /**
     * Gets priceMarkupType
     *
     * @return \Domainrobot\Model\PriceMarkupType
     */
    public function getPriceMarkupType()
    {
        return $this->container['priceMarkupType'];
    }

    /**
     * Sets priceMarkupType
     *
     * @param \Domainrobot\Model\PriceMarkupType $priceMarkupType The type of markup
     *
     * @return $this
     */
    public function setPriceMarkupType($priceMarkupType)
    {
        $this->container['priceMarkupType'] = $priceMarkupType;

        return $this;
    }

    /**
     * Gets priceMarkup
     *
     * @return double
     */
    public function getPriceMarkup()
    {
        return $this->container['priceMarkup'];
    }

    /**
     * Sets priceMarkup
     *
     * @param double $priceMarkup markup value in percent or absolute
     *
     * @return $this
     */
    public function setPriceMarkup($priceMarkup)
    {

        if (!is_null($priceMarkup) && ($priceMarkup > 10000)) {
            throw new \InvalidArgumentException('invalid value for $priceMarkup when calling ExternalAccounting., must be smaller than or equal to 10000.');
        }
        if (!is_null($priceMarkup) && ($priceMarkup < 0)) {
            throw new \InvalidArgumentException('invalid value for $priceMarkup when calling ExternalAccounting., must be bigger than or equal to 0.');
        }

        $this->container['priceMarkup'] = $priceMarkup;

        return $this;
    }

    /**
     * Gets priceRounding
     *
     * @return \Domainrobot\Model\PriceRoundingConstants
     */
    public function getPriceRounding()
    {
        return $this->container['priceRounding'];
    }

    /**
     * Sets priceRounding
     *
     * @param \Domainrobot\Model\PriceRoundingConstants $priceRounding The type of rounding
     *
     * @return $this
     */
    public function setPriceRounding($priceRounding)
    {
        $this->container['priceRounding'] = $priceRounding;

        return $this;
    }

    /**
     * Gets enablePromoPrice
     *
     * @return bool
     */
    public function getEnablePromoPrice()
    {
        return $this->container['enablePromoPrice'];
    }

    /**
     * Sets enablePromoPrice
     *
     * @param bool $enablePromoPrice Enables promo prices syncronization
     *
     * @return $this
     */
    public function setEnablePromoPrice($enablePromoPrice)
    {
        $this->container['enablePromoPrice'] = $enablePromoPrice;

        return $this;
    }

    /**
     * Gets currency
     *
     * @return string
     */
    public function getCurrency()
    {
        return $this->container['currency'];
    }

    /**
     * Sets currency
     *
     * @param string $currency Used currency
     *
     * @return $this
     */
    public function setCurrency($currency)
    {
        $this->container['currency'] = $currency;

        return $this;
    }

    /**
     * Gets country
     *
     * @return string
     */
    public function getCountry()
    {
        return $this->container['country'];
    }

    /**
     * Sets country
     *
     * @param string $country Used country. Needed for calculation of taxes
     *
     * @return $this
     */
    public function setCountry($country)
    {
        $this->container['country'] = $country;

        return $this;
    }

    /**
     * Gets creditorIdentifier
     *
     * @return string
     */
    public function getCreditorIdentifier()
    {
        return $this->container['creditorIdentifier'];
    }

    /**
     * Sets creditorIdentifier
     *
     * @param string $creditorIdentifier The creditor identifier
     *
     * @return $this
     */
    public function setCreditorIdentifier($creditorIdentifier)
    {
        $this->container['creditorIdentifier'] = $creditorIdentifier;

        return $this;
    }

    /**
     * Gets customerNumberMin
     *
     * @return int
     */
    public function getCustomerNumberMin()
    {
        return $this->container['customerNumberMin'];
    }

    /**
     * Sets customerNumberMin
     *
     * @param int $customerNumberMin The lower end of the generated customer group numbers
     *
     * @return $this
     */
    public function setCustomerNumberMin($customerNumberMin)
    {
        $this->container['customerNumberMin'] = $customerNumberMin;

        return $this;
    }

    /**
     * Gets customerNumberMax
     *
     * @return int
     */
    public function getCustomerNumberMax()
    {
        return $this->container['customerNumberMax'];
    }

    /**
     * Sets customerNumberMax
     *
     * @param int $customerNumberMax The upper end of the generated customer group numbers
     *
     * @return $this
     */
    public function setCustomerNumberMax($customerNumberMax)
    {
        $this->container['customerNumberMax'] = $customerNumberMax;

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
     * @param double $creditLimit The creditLimit for the customer of the accounting
     *
     * @return $this
     */
    public function setCreditLimit($creditLimit)
    {
        $this->container['creditLimit'] = $creditLimit;

        return $this;
    }

    /**
     * Gets priceListSyncStatus
     *
     * @return \Domainrobot\Model\GenericStatusConstants
     */
    public function getPriceListSyncStatus()
    {
        return $this->container['priceListSyncStatus'];
    }

    /**
     * Sets priceListSyncStatus
     *
     * @param \Domainrobot\Model\GenericStatusConstants $priceListSyncStatus The status of the pricelist sync
     *
     * @return $this
     */
    public function setPriceListSyncStatus($priceListSyncStatus)
    {
        $this->container['priceListSyncStatus'] = $priceListSyncStatus;

        return $this;
    }

    /**
     * Gets priceListSync
     *
     * @return \DateTime
     */
    public function getPriceListSync()
    {
        return $this->container['priceListSync'];
    }

    /**
     * Sets priceListSync
     *
     * @param \DateTime $priceListSync The date when the last pricelist sync finished
     *
     * @return $this
     */
    public function setPriceListSync($priceListSync)
    {
        $this->container['priceListSync'] = $priceListSync;

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


