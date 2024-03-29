<?php
/**
 * RegistryStatusConstants
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
use \Domainrobot\ObjectSerializer;

/**
 * RegistryStatusConstants Class Doc Comment
 *
 * @category Class
 * @package  Domainrobot
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class RegistryStatusConstants
{
    /**
     * Possible values of this enum
     */
    const ACTIVE = 'ACTIVE';
    const HOLD = 'HOLD';
    const LOCK = 'LOCK';
    const HOLD_LOCK = 'HOLD_LOCK';
    const AUTO = 'AUTO';
    const LOCK_OWNER = 'LOCK_OWNER';
    const LOCK_UPDATE = 'LOCK_UPDATE';
    const PENDING = 'PENDING';
    const NONE = 'NONE';
    
    /**
     * Gets allowable values of the enum
     * @return string[]
     */
    public static function getAllowableEnumValues()
    {
        return [
            self::ACTIVE,
            self::HOLD,
            self::LOCK,
            self::HOLD_LOCK,
            self::AUTO,
            self::LOCK_OWNER,
            self::LOCK_UPDATE,
            self::PENDING,
            self::NONE,
        ];
    }
}


