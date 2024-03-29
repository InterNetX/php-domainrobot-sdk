<?php
/**
 * ACLRestriction
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
 * ACLRestriction Class Doc Comment
 *
 * @category Class
 * @package  Domainrobot
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class ACLRestriction
{
    /**
     * Possible values of this enum
     */
    const USER_LOCKED = 'USER_LOCKED';
    const CHILDREN_LOCKED = 'CHILDREN_LOCKED';
    const PARENT_LOCK = 'PARENT_LOCK';
    const NOT_LOCKED = 'NOT_LOCKED';
    
    /**
     * Gets allowable values of the enum
     * @return string[]
     */
    public static function getAllowableEnumValues()
    {
        return [
            self::USER_LOCKED,
            self::CHILDREN_LOCKED,
            self::PARENT_LOCK,
            self::NOT_LOCKED,
        ];
    }
}


