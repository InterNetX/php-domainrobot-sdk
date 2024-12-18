<?php
/**
 * TmchMark
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
 * TmchMark Class Doc Comment
 *
 * @category Class
 * @package  Domainrobot
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class TmchMark implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'TmchMark';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'created' => '\DateTime',
        'updated' => '\DateTime',
        'owner' => '\Domainrobot\Model\BasicUser',
        'updater' => '\Domainrobot\Model\BasicUser',
        'id' => 'int',
        'type' => '\Domainrobot\Model\TmchMarkTypeConstants',
        'name' => 'string',
        'reference' => 'string',
        'holder' => '\Domainrobot\Model\TmchContact',
        'description' => 'string',
        'period' => '\Domainrobot\Model\TimePeriod',
        'documents' => '\Domainrobot\Model\TmchMarkDocument[]',
        'labels' => 'string[]',
        'comments' => '\Domainrobot\Model\TmchMarkComment[]',
        'renew' => '\Domainrobot\Model\RenewStatusConstants',
        'status' => '\Domainrobot\Model\TmchMarkStatusConstants',
        'payable' => '\DateTime',
        'sent' => 'bool',
        'smdInclusion' => 'bool',
        'claimsNotify' => 'bool',
        'orderComplete' => 'bool',
        'claimsNotifyExtended' => 'bool',
        'extension' => '\Domainrobot\Model\TmchMarkAddon',
        'smdFile' => 'string'
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
        'type' => null,
        'name' => null,
        'reference' => null,
        'holder' => null,
        'description' => null,
        'period' => null,
        'documents' => null,
        'labels' => null,
        'comments' => null,
        'renew' => null,
        'status' => null,
        'payable' => 'date-time',
        'sent' => null,
        'smdInclusion' => null,
        'claimsNotify' => null,
        'orderComplete' => null,
        'claimsNotifyExtended' => null,
        'extension' => null,
        'smdFile' => null
    ];

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function swaggerTypes(): array
    {
        return self::$swaggerTypes;
    }

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function swaggerFormats(): array
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
        'type' => 'type',
        'name' => 'name',
        'reference' => 'reference',
        'holder' => 'holder',
        'description' => 'description',
        'period' => 'period',
        'documents' => 'documents',
        'labels' => 'labels',
        'comments' => 'comments',
        'renew' => 'renew',
        'status' => 'status',
        'payable' => 'payable',
        'sent' => 'sent',
        'smdInclusion' => 'smdInclusion',
        'claimsNotify' => 'claimsNotify',
        'orderComplete' => 'orderComplete',
        'claimsNotifyExtended' => 'claimsNotifyExtended',
        'extension' => 'extension',
        'smdFile' => 'smdFile'
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
        'type' => 'setType',
        'name' => 'setName',
        'reference' => 'setReference',
        'holder' => 'setHolder',
        'description' => 'setDescription',
        'period' => 'setPeriod',
        'documents' => 'setDocuments',
        'labels' => 'setLabels',
        'comments' => 'setComments',
        'renew' => 'setRenew',
        'status' => 'setStatus',
        'payable' => 'setPayable',
        'sent' => 'setSent',
        'smdInclusion' => 'setSmdInclusion',
        'claimsNotify' => 'setClaimsNotify',
        'orderComplete' => 'setOrderComplete',
        'claimsNotifyExtended' => 'setClaimsNotifyExtended',
        'extension' => 'setExtension',
        'smdFile' => 'setSmdFile'
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
        'type' => 'getType',
        'name' => 'getName',
        'reference' => 'getReference',
        'holder' => 'getHolder',
        'description' => 'getDescription',
        'period' => 'getPeriod',
        'documents' => 'getDocuments',
        'labels' => 'getLabels',
        'comments' => 'getComments',
        'renew' => 'getRenew',
        'status' => 'getStatus',
        'payable' => 'getPayable',
        'sent' => 'getSent',
        'smdInclusion' => 'getSmdInclusion',
        'claimsNotify' => 'getClaimsNotify',
        'orderComplete' => 'getOrderComplete',
        'claimsNotifyExtended' => 'getClaimsNotifyExtended',
        'extension' => 'getExtension',
        'smdFile' => 'getSmdFile'
    ];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @return array
     */
    public static function attributeMap(): array
    {
        return self::$attributeMap;
    }

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @return array
     */
    public static function setters(): array
    {
        return self::$setters;
    }

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @return array
     */
    public static function getters(): array
    {
        return self::$getters;
    }

    /**
     * The original name of the model.
     *
     * @return string
     */
    public function getModelName(): string
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
    public function __construct(?array $data = null)
    {
        $this->container['created'] = isset($data['created']) ? $this->createData($data['created'], 'created')  : null;
        $this->container['updated'] = isset($data['updated']) ? $this->createData($data['updated'], 'updated')  : null;
        $this->container['owner'] = isset($data['owner']) ? $this->createData($data['owner'], 'owner')  : null;
        $this->container['updater'] = isset($data['updater']) ? $this->createData($data['updater'], 'updater')  : null;
        $this->container['id'] = isset($data['id']) ? $this->createData($data['id'], 'id')  : null;
        $this->container['type'] = isset($data['type']) ? $this->createData($data['type'], 'type')  : null;
        $this->container['name'] = isset($data['name']) ? $this->createData($data['name'], 'name')  : null;
        $this->container['reference'] = isset($data['reference']) ? $this->createData($data['reference'], 'reference')  : null;
        $this->container['holder'] = isset($data['holder']) ? $this->createData($data['holder'], 'holder')  : null;
        $this->container['description'] = isset($data['description']) ? $this->createData($data['description'], 'description')  : null;
        $this->container['period'] = isset($data['period']) ? $this->createData($data['period'], 'period')  : null;
        $this->container['documents'] = isset($data['documents']) ? $this->createData($data['documents'], 'documents')  : null;
        $this->container['labels'] = isset($data['labels']) ? $this->createData($data['labels'], 'labels')  : null;
        $this->container['comments'] = isset($data['comments']) ? $this->createData($data['comments'], 'comments')  : null;
        $this->container['renew'] = isset($data['renew']) ? $this->createData($data['renew'], 'renew')  : null;
        $this->container['status'] = isset($data['status']) ? $this->createData($data['status'], 'status')  : null;
        $this->container['payable'] = isset($data['payable']) ? $this->createData($data['payable'], 'payable')  : null;
        $this->container['sent'] = isset($data['sent']) ? $this->createData($data['sent'], 'sent')  : null;
        $this->container['smdInclusion'] = isset($data['smdInclusion']) ? $this->createData($data['smdInclusion'], 'smdInclusion')  : null;
        $this->container['claimsNotify'] = isset($data['claimsNotify']) ? $this->createData($data['claimsNotify'], 'claimsNotify')  : null;
        $this->container['orderComplete'] = isset($data['orderComplete']) ? $this->createData($data['orderComplete'], 'orderComplete')  : null;
        $this->container['claimsNotifyExtended'] = isset($data['claimsNotifyExtended']) ? $this->createData($data['claimsNotifyExtended'], 'claimsNotifyExtended')  : null;
        $this->container['extension'] = isset($data['extension']) ? $this->createData($data['extension'], 'extension')  : null;
        $this->container['smdFile'] = isset($data['smdFile']) ? $this->createData($data['smdFile'], 'smdFile')  : null;
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
    public function createData($data = null, $property = null): mixed
    {
        if ($data === null || $property === null) {
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
    public function listInvalidProperties(): array
    {
        $invalidProperties = [];

        if ($this->container['type'] === null) {
            $invalidProperties[] = "'type' can't be null";
        }
        if ($this->container['name'] === null) {
            $invalidProperties[] = "'name' can't be null";
        }
        if ($this->container['reference'] === null) {
            $invalidProperties[] = "'reference' can't be null";
        }
        if ($this->container['description'] === null) {
            $invalidProperties[] = "'description' can't be null";
        }
        if ($this->container['period'] === null) {
            $invalidProperties[] = "'period' can't be null";
        }
        if ($this->container['payable'] === null) {
            $invalidProperties[] = "'payable' can't be null";
        }
        if ($this->container['smdInclusion'] === null) {
            $invalidProperties[] = "'smdInclusion' can't be null";
        }
        if ($this->container['claimsNotify'] === null) {
            $invalidProperties[] = "'claimsNotify' can't be null";
        }
        return $invalidProperties;
    }

    /**
     * Validate all the properties in the 
     * return true if all passed
     *
     * @return bool True if all properties are valid
     */
    public function valid(): bool
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
     * @return \Domainrobot\Model\BasicUser
     */
    public function getOwner()
    {
        return $this->container['owner'];
    }

    /**
     * Sets owner
     *
     * @param \Domainrobot\Model\BasicUser $owner The object owner.
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
     * @return \Domainrobot\Model\BasicUser
     */
    public function getUpdater()
    {
        return $this->container['updater'];
    }

    /**
     * Sets updater
     *
     * @param \Domainrobot\Model\BasicUser $updater User who performed the last update.
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
     * @param int $id id
     *
     * @return $this
     */
    public function setId($id)
    {
        $this->container['id'] = $id;

        return $this;
    }

    /**
     * Gets type
     *
     * @return \Domainrobot\Model\TmchMarkTypeConstants
     */
    public function getType()
    {
        return $this->container['type'];
    }

    /**
     * Sets type
     *
     * @param \Domainrobot\Model\TmchMarkTypeConstants $type type
     *
     * @return $this
     */
    public function setType($type)
    {
        $this->container['type'] = $type;

        return $this;
    }

    /**
     * Gets name
     *
     * @return string
     */
    public function getName()
    {
        return $this->container['name'];
    }

    /**
     * Sets name
     *
     * @param string $name name
     *
     * @return $this
     */
    public function setName($name)
    {
        $this->container['name'] = $name;

        return $this;
    }

    /**
     * Gets reference
     *
     * @return string
     */
    public function getReference()
    {
        return $this->container['reference'];
    }

    /**
     * Sets reference
     *
     * @param string $reference reference
     *
     * @return $this
     */
    public function setReference($reference)
    {
        $this->container['reference'] = $reference;

        return $this;
    }

    /**
     * Gets holder
     *
     * @return \Domainrobot\Model\TmchContact
     */
    public function getHolder()
    {
        return $this->container['holder'];
    }

    /**
     * Sets holder
     *
     * @param \Domainrobot\Model\TmchContact $holder holder
     *
     * @return $this
     */
    public function setHolder($holder)
    {
        $this->container['holder'] = $holder;

        return $this;
    }

    /**
     * Gets description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->container['description'];
    }

    /**
     * Sets description
     *
     * @param string $description description
     *
     * @return $this
     */
    public function setDescription($description)
    {
        $this->container['description'] = $description;

        return $this;
    }

    /**
     * Gets period
     *
     * @return \Domainrobot\Model\TimePeriod
     */
    public function getPeriod()
    {
        return $this->container['period'];
    }

    /**
     * Sets period
     *
     * @param \Domainrobot\Model\TimePeriod $period period
     *
     * @return $this
     */
    public function setPeriod($period)
    {
        $this->container['period'] = $period;

        return $this;
    }

    /**
     * Gets documents
     *
     * @return \Domainrobot\Model\TmchMarkDocument[]
     */
    public function getDocuments()
    {
        return $this->container['documents'];
    }

    /**
     * Sets documents
     *
     * @param \Domainrobot\Model\TmchMarkDocument[] $documents documents
     *
     * @return $this
     */
    public function setDocuments($documents)
    {
        $this->container['documents'] = $documents;

        return $this;
    }

    /**
     * Gets labels
     *
     * @return string[]
     */
    public function getLabels()
    {
        return $this->container['labels'];
    }

    /**
     * Sets labels
     *
     * @param string[] $labels labels
     *
     * @return $this
     */
    public function setLabels($labels)
    {
        $this->container['labels'] = $labels;

        return $this;
    }

    /**
     * Gets comments
     *
     * @return \Domainrobot\Model\TmchMarkComment[]
     */
    public function getComments()
    {
        return $this->container['comments'];
    }

    /**
     * Sets comments
     *
     * @param \Domainrobot\Model\TmchMarkComment[] $comments comments
     *
     * @return $this
     */
    public function setComments($comments)
    {
        $this->container['comments'] = $comments;

        return $this;
    }

    /**
     * Gets renew
     *
     * @return \Domainrobot\Model\RenewStatusConstants
     */
    public function getRenew()
    {
        return $this->container['renew'];
    }

    /**
     * Sets renew
     *
     * @param \Domainrobot\Model\RenewStatusConstants $renew renew
     *
     * @return $this
     */
    public function setRenew($renew)
    {
        $this->container['renew'] = $renew;

        return $this;
    }

    /**
     * Gets status
     *
     * @return \Domainrobot\Model\TmchMarkStatusConstants
     */
    public function getStatus()
    {
        return $this->container['status'];
    }

    /**
     * Sets status
     *
     * @param \Domainrobot\Model\TmchMarkStatusConstants $status status
     *
     * @return $this
     */
    public function setStatus($status)
    {
        $this->container['status'] = $status;

        return $this;
    }

    /**
     * Gets payable
     *
     * @return \DateTime
     */
    public function getPayable()
    {
        return $this->container['payable'];
    }

    /**
     * Sets payable
     *
     * @param \DateTime $payable payable
     *
     * @return $this
     */
    public function setPayable($payable)
    {
        $this->container['payable'] = $payable;

        return $this;
    }

    /**
     * Gets sent
     *
     * @return bool
     */
    public function getSent()
    {
        return $this->container['sent'];
    }

    /**
     * Sets sent
     *
     * @param bool $sent sent
     *
     * @return $this
     */
    public function setSent($sent)
    {
        $this->container['sent'] = $sent;

        return $this;
    }

    /**
     * Gets smdInclusion
     *
     * @return bool
     */
    public function getSmdInclusion()
    {
        return $this->container['smdInclusion'];
    }

    /**
     * Sets smdInclusion
     *
     * @param bool $smdInclusion smdInclusion
     *
     * @return $this
     */
    public function setSmdInclusion($smdInclusion)
    {
        $this->container['smdInclusion'] = $smdInclusion;

        return $this;
    }

    /**
     * Gets claimsNotify
     *
     * @return bool
     */
    public function getClaimsNotify()
    {
        return $this->container['claimsNotify'];
    }

    /**
     * Sets claimsNotify
     *
     * @param bool $claimsNotify claimsNotify
     *
     * @return $this
     */
    public function setClaimsNotify($claimsNotify)
    {
        $this->container['claimsNotify'] = $claimsNotify;

        return $this;
    }

    /**
     * Gets orderComplete
     *
     * @return bool
     */
    public function getOrderComplete()
    {
        return $this->container['orderComplete'];
    }

    /**
     * Sets orderComplete
     *
     * @param bool $orderComplete orderComplete
     *
     * @return $this
     */
    public function setOrderComplete($orderComplete)
    {
        $this->container['orderComplete'] = $orderComplete;

        return $this;
    }

    /**
     * Gets claimsNotifyExtended
     *
     * @return bool
     */
    public function getClaimsNotifyExtended()
    {
        return $this->container['claimsNotifyExtended'];
    }

    /**
     * Sets claimsNotifyExtended
     *
     * @param bool $claimsNotifyExtended claimsNotifyExtended
     *
     * @return $this
     */
    public function setClaimsNotifyExtended($claimsNotifyExtended)
    {
        $this->container['claimsNotifyExtended'] = $claimsNotifyExtended;

        return $this;
    }

    /**
     * Gets extension
     *
     * @return \Domainrobot\Model\TmchMarkAddon
     */
    public function getExtension()
    {
        return $this->container['extension'];
    }

    /**
     * Sets extension
     *
     * @param \Domainrobot\Model\TmchMarkAddon $extension extension
     *
     * @return $this
     */
    public function setExtension($extension)
    {
        $this->container['extension'] = $extension;

        return $this;
    }

    /**
     * Gets smdFile
     *
     * @return string
     */
    public function getSmdFile()
    {
        return $this->container['smdFile'];
    }

    /**
     * Sets smdFile
     *
     * @param string $smdFile smdFile
     *
     * @return $this
     */
    public function setSmdFile($smdFile)
    {
        $this->container['smdFile'] = $smdFile;

        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param integer $offset Offset
     *
     * @return boolean
     */
    public function offsetExists($offset): bool
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
    public function offsetGet($offset): mixed
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
    public function offsetSet($offset, $value): void
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
    public function offsetUnset($offset): void
    {
        unset($this->container[$offset]);
    }

    /**
     * Gets the string presentation of the object
     *
     * @return string
     */
    public function __toString(): string
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
    public function toArray($retrieveAllValues = false): array
    {
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


