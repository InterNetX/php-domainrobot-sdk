<?php
/**
 * Claims
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
 * Claims Class Doc Comment
 *
 * @category Class
 * @package  Domainrobot
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class Claims implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'claims';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'name' => 'string',
        'givenName' => 'string',
        'familyName' => 'string',
        'middleName' => 'string',
        'nickname' => 'string',
        'preferredUsername' => 'string',
        'profile' => '\Domainrobot\Model\UrlEntity',
        'picture' => '\Domainrobot\Model\UrlEntity',
        'website' => '\Domainrobot\Model\UrlEntity',
        'email' => 'string',
        'emailVerified' => 'bool',
        'gender' => '\Domainrobot\Model\GenderConstants',
        'birthdate' => '\DateTime',
        'zoneinfo' => 'string',
        'language' => 'string',
        'phoneNumber' => '\Domainrobot\Model\Phone',
        'phoneNumberVerified' => 'bool',
        'address' => '\Domainrobot\Model\AddressClaim',
        'organization' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'name' => null,
        'givenName' => null,
        'familyName' => null,
        'middleName' => null,
        'nickname' => null,
        'preferredUsername' => null,
        'profile' => null,
        'picture' => null,
        'website' => null,
        'email' => null,
        'emailVerified' => null,
        'gender' => null,
        'birthdate' => 'date-time',
        'zoneinfo' => null,
        'language' => null,
        'phoneNumber' => null,
        'phoneNumberVerified' => null,
        'address' => null,
        'organization' => null
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
        'name' => 'name',
        'givenName' => 'given_name',
        'familyName' => 'family_name',
        'middleName' => 'middle_name',
        'nickname' => 'nickname',
        'preferredUsername' => 'preferred_username',
        'profile' => 'profile',
        'picture' => 'picture',
        'website' => 'website',
        'email' => 'email',
        'emailVerified' => 'email_verified',
        'gender' => 'gender',
        'birthdate' => 'birthdate',
        'zoneinfo' => 'zoneinfo',
        'language' => 'language',
        'phoneNumber' => 'phone_number',
        'phoneNumberVerified' => 'phone_number_verified',
        'address' => 'address',
        'organization' => 'organization'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'name' => 'setName',
        'givenName' => 'setGivenName',
        'familyName' => 'setFamilyName',
        'middleName' => 'setMiddleName',
        'nickname' => 'setNickname',
        'preferredUsername' => 'setPreferredUsername',
        'profile' => 'setProfile',
        'picture' => 'setPicture',
        'website' => 'setWebsite',
        'email' => 'setEmail',
        'emailVerified' => 'setEmailVerified',
        'gender' => 'setGender',
        'birthdate' => 'setBirthdate',
        'zoneinfo' => 'setZoneinfo',
        'language' => 'setLanguage',
        'phoneNumber' => 'setPhoneNumber',
        'phoneNumberVerified' => 'setPhoneNumberVerified',
        'address' => 'setAddress',
        'organization' => 'setOrganization'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'name' => 'getName',
        'givenName' => 'getGivenName',
        'familyName' => 'getFamilyName',
        'middleName' => 'getMiddleName',
        'nickname' => 'getNickname',
        'preferredUsername' => 'getPreferredUsername',
        'profile' => 'getProfile',
        'picture' => 'getPicture',
        'website' => 'getWebsite',
        'email' => 'getEmail',
        'emailVerified' => 'getEmailVerified',
        'gender' => 'getGender',
        'birthdate' => 'getBirthdate',
        'zoneinfo' => 'getZoneinfo',
        'language' => 'getLanguage',
        'phoneNumber' => 'getPhoneNumber',
        'phoneNumberVerified' => 'getPhoneNumberVerified',
        'address' => 'getAddress',
        'organization' => 'getOrganization'
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
        $this->container['name'] = isset($data['name']) ? $this->createData($data['name'], 'name')  : null;
        $this->container['givenName'] = isset($data['givenName']) ? $this->createData($data['givenName'], 'givenName')  : null;
        $this->container['familyName'] = isset($data['familyName']) ? $this->createData($data['familyName'], 'familyName')  : null;
        $this->container['middleName'] = isset($data['middleName']) ? $this->createData($data['middleName'], 'middleName')  : null;
        $this->container['nickname'] = isset($data['nickname']) ? $this->createData($data['nickname'], 'nickname')  : null;
        $this->container['preferredUsername'] = isset($data['preferredUsername']) ? $this->createData($data['preferredUsername'], 'preferredUsername')  : null;
        $this->container['profile'] = isset($data['profile']) ? $this->createData($data['profile'], 'profile')  : null;
        $this->container['picture'] = isset($data['picture']) ? $this->createData($data['picture'], 'picture')  : null;
        $this->container['website'] = isset($data['website']) ? $this->createData($data['website'], 'website')  : null;
        $this->container['email'] = isset($data['email']) ? $this->createData($data['email'], 'email')  : null;
        $this->container['emailVerified'] = isset($data['emailVerified']) ? $this->createData($data['emailVerified'], 'emailVerified')  : null;
        $this->container['gender'] = isset($data['gender']) ? $this->createData($data['gender'], 'gender')  : null;
        $this->container['birthdate'] = isset($data['birthdate']) ? $this->createData($data['birthdate'], 'birthdate')  : null;
        $this->container['zoneinfo'] = isset($data['zoneinfo']) ? $this->createData($data['zoneinfo'], 'zoneinfo')  : null;
        $this->container['language'] = isset($data['language']) ? $this->createData($data['language'], 'language')  : null;
        $this->container['phoneNumber'] = isset($data['phoneNumber']) ? $this->createData($data['phoneNumber'], 'phoneNumber')  : null;
        $this->container['phoneNumberVerified'] = isset($data['phoneNumberVerified']) ? $this->createData($data['phoneNumberVerified'], 'phoneNumberVerified')  : null;
        $this->container['address'] = isset($data['address']) ? $this->createData($data['address'], 'address')  : null;
        $this->container['organization'] = isset($data['organization']) ? $this->createData($data['organization'], 'organization')  : null;
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
     * @param string $name End-User's full name in displayable form including all name parts, possibly including titles and suffixes, ordered according to the End-User's locale and preferences.
     *
     * @return $this
     */
    public function setName($name)
    {
        $this->container['name'] = $name;

        return $this;
    }

    /**
     * Gets givenName
     *
     * @return string
     */
    public function getGivenName()
    {
        return $this->container['givenName'];
    }

    /**
     * Sets givenName
     *
     * @param string $givenName Given name(s) or first name(s) of the End-User. Note that in some cultures, people can have multiple given names; all can be present, with the names being separated by space characters.
     *
     * @return $this
     */
    public function setGivenName($givenName)
    {
        $this->container['givenName'] = $givenName;

        return $this;
    }

    /**
     * Gets familyName
     *
     * @return string
     */
    public function getFamilyName()
    {
        return $this->container['familyName'];
    }

    /**
     * Sets familyName
     *
     * @param string $familyName Surname(s) or last name(s) of the End-User. Note that in some cultures, people can have multiple family names or no family name; all can be present, with the names being separated by space characters
     *
     * @return $this
     */
    public function setFamilyName($familyName)
    {
        $this->container['familyName'] = $familyName;

        return $this;
    }

    /**
     * Gets middleName
     *
     * @return string
     */
    public function getMiddleName()
    {
        return $this->container['middleName'];
    }

    /**
     * Sets middleName
     *
     * @param string $middleName Middle name(s) of the End-User. Note that in some cultures, people can have multiple middle names; all can be present, with the names being separated by space characters. Also note that in some cultures, middle names are not used.
     *
     * @return $this
     */
    public function setMiddleName($middleName)
    {
        $this->container['middleName'] = $middleName;

        return $this;
    }

    /**
     * Gets nickname
     *
     * @return string
     */
    public function getNickname()
    {
        return $this->container['nickname'];
    }

    /**
     * Sets nickname
     *
     * @param string $nickname Casual name of the End-User that may or may not be the same as the given_name. For instance, a nickname value of Mike might be returned alongside a given_name value of Michael.
     *
     * @return $this
     */
    public function setNickname($nickname)
    {
        $this->container['nickname'] = $nickname;

        return $this;
    }

    /**
     * Gets preferredUsername
     *
     * @return string
     */
    public function getPreferredUsername()
    {
        return $this->container['preferredUsername'];
    }

    /**
     * Sets preferredUsername
     *
     * @param string $preferredUsername Shorthand name by which the End-User wishes to be referred to at the RP, such as janedoe or j.doe. This value MAY be any valid JSON string including special characters such as @, /, or whitespace
     *
     * @return $this
     */
    public function setPreferredUsername($preferredUsername)
    {
        $this->container['preferredUsername'] = $preferredUsername;

        return $this;
    }

    /**
     * Gets profile
     *
     * @return \Domainrobot\Model\UrlEntity
     */
    public function getProfile()
    {
        return $this->container['profile'];
    }

    /**
     * Sets profile
     *
     * @param \Domainrobot\Model\UrlEntity $profile URL of the End-User's profile page. The contents of this Web page SHOULD be about the End-User.
     *
     * @return $this
     */
    public function setProfile($profile)
    {
        $this->container['profile'] = $profile;

        return $this;
    }

    /**
     * Gets picture
     *
     * @return \Domainrobot\Model\UrlEntity
     */
    public function getPicture()
    {
        return $this->container['picture'];
    }

    /**
     * Sets picture
     *
     * @param \Domainrobot\Model\UrlEntity $picture URL of the End-User's profile picture.
     *
     * @return $this
     */
    public function setPicture($picture)
    {
        $this->container['picture'] = $picture;

        return $this;
    }

    /**
     * Gets website
     *
     * @return \Domainrobot\Model\UrlEntity
     */
    public function getWebsite()
    {
        return $this->container['website'];
    }

    /**
     * Sets website
     *
     * @param \Domainrobot\Model\UrlEntity $website URL of the End-User's Web page or blog. This Web page SHOULD contain information published by the End-User or an organization that the End-User is affiliated with.
     *
     * @return $this
     */
    public function setWebsite($website)
    {
        $this->container['website'] = $website;

        return $this;
    }

    /**
     * Gets email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->container['email'];
    }

    /**
     * Sets email
     *
     * @param string $email End-user's preferred email address
     *
     * @return $this
     */
    public function setEmail($email)
    {
        $this->container['email'] = $email;

        return $this;
    }

    /**
     * Gets emailVerified
     *
     * @return bool
     */
    public function getEmailVerified()
    {
        return $this->container['emailVerified'];
    }

    /**
     * Sets emailVerified
     *
     * @param bool $emailVerified True if the End-User's e-mail address has been verified; otherwise false.
     *
     * @return $this
     */
    public function setEmailVerified($emailVerified)
    {
        $this->container['emailVerified'] = $emailVerified;

        return $this;
    }

    /**
     * Gets gender
     *
     * @return \Domainrobot\Model\GenderConstants
     */
    public function getGender()
    {
        return $this->container['gender'];
    }

    /**
     * Sets gender
     *
     * @param \Domainrobot\Model\GenderConstants $gender URL of the End-User's profile picture.
     *
     * @return $this
     */
    public function setGender($gender)
    {
        $this->container['gender'] = $gender;

        return $this;
    }

    /**
     * Gets birthdate
     *
     * @return \DateTime
     */
    public function getBirthdate()
    {
        return $this->container['birthdate'];
    }

    /**
     * Sets birthdate
     *
     * @param \DateTime $birthdate End-user's birth date, ISO 8601:2004 (YYYY-MM-DD)
     *
     * @return $this
     */
    public function setBirthdate($birthdate)
    {
        $this->container['birthdate'] = $birthdate;

        return $this;
    }

    /**
     * Gets zoneinfo
     *
     * @return string
     */
    public function getZoneinfo()
    {
        return $this->container['zoneinfo'];
    }

    /**
     * Sets zoneinfo
     *
     * @param string $zoneinfo End-User's zoneinfo.
     *
     * @return $this
     */
    public function setZoneinfo($zoneinfo)
    {
        $this->container['zoneinfo'] = $zoneinfo;

        return $this;
    }

    /**
     * Gets language
     *
     * @return string
     */
    public function getLanguage()
    {
        return $this->container['language'];
    }

    /**
     * Sets language
     *
     * @param string $language The language.
     *
     * @return $this
     */
    public function setLanguage($language)
    {
        $this->container['language'] = $language;

        return $this;
    }

    /**
     * Gets phoneNumber
     *
     * @return \Domainrobot\Model\Phone
     */
    public function getPhoneNumber()
    {
        return $this->container['phoneNumber'];
    }

    /**
     * Sets phoneNumber
     *
     * @param \Domainrobot\Model\Phone $phoneNumber End-User's preferred telephone number. E.164 [E.164] is RECOMMENDED as the format of this Claim, for example, +1 (425) 555-1212 or +56 (2) 687 2400. .
     *
     * @return $this
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->container['phoneNumber'] = $phoneNumber;

        return $this;
    }

    /**
     * Gets phoneNumberVerified
     *
     * @return bool
     */
    public function getPhoneNumberVerified()
    {
        return $this->container['phoneNumberVerified'];
    }

    /**
     * Sets phoneNumberVerified
     *
     * @param bool $phoneNumberVerified True if the End-User's phne number has been verified; otherwise false.
     *
     * @return $this
     */
    public function setPhoneNumberVerified($phoneNumberVerified)
    {
        $this->container['phoneNumberVerified'] = $phoneNumberVerified;

        return $this;
    }

    /**
     * Gets address
     *
     * @return \Domainrobot\Model\AddressClaim
     */
    public function getAddress()
    {
        return $this->container['address'];
    }

    /**
     * Sets address
     *
     * @param \Domainrobot\Model\AddressClaim $address End-user's address
     *
     * @return $this
     */
    public function setAddress($address)
    {
        $this->container['address'] = $address;

        return $this;
    }

    /**
     * Gets organization
     *
     * @return string
     */
    public function getOrganization()
    {
        return $this->container['organization'];
    }

    /**
     * Sets organization
     *
     * @param string $organization End-user's organization
     *
     * @return $this
     */
    public function setOrganization($organization)
    {
        $this->container['organization'] = $organization;

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


