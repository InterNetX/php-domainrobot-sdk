<?php
/**
 * NiccomSourceConstants
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
use \Domainrobot\ObjectSerializer;

/**
 * NiccomSourceConstants Class Doc Comment
 *
 * @category Class
 * @package  Domainrobot
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class NiccomSourceConstants
{
    /**
     * Possible values of this enum
     */
    const NIC_REQUEST = 'NIC_REQUEST';
    const NIC_RESPONSE = 'NIC_RESPONSE';
    const NIC_NOTIFY = 'NIC_NOTIFY';
    const A3_REQUEST = 'A3_REQUEST';
    const A3_RESPONSE = 'A3_RESPONSE';
    const LOG_OBJECTS = 'LOG_OBJECTS';
    
    /**
     * Gets allowable values of the enum
     * @return string[]
     */
    public static function getAllowableEnumValues()
    {
        return [
            self::NIC_REQUEST,
            self::NIC_RESPONSE,
            self::NIC_NOTIFY,
            self::A3_REQUEST,
            self::A3_RESPONSE,
            self::LOG_OBJECTS,
        ];
    }
}


