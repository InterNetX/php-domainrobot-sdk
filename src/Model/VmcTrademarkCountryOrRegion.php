<?php
/**
 * VmcTrademarkCountryOrRegion
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
 * VmcTrademarkCountryOrRegion Class Doc Comment
 *
 * @category Class
 * @package  Domainrobot
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class VmcTrademarkCountryOrRegion
{
    /**
     * Possible values of this enum
     */
    const US = 'US';
    const CA = 'CA';
    const EM = 'EM';
    const GB = 'GB';
    const DE = 'DE';
    const JP = 'JP';
    const AU = 'AU';
    const ES = 'ES';
    const IN = 'IN';
    const KR = 'KR';
    const BR = 'BR';
    
    /**
     * Gets allowable values of the enum
     * @return string[]
     */
    public static function getAllowableEnumValues()
    {
        return [
            self::US,
            self::CA,
            self::EM,
            self::GB,
            self::DE,
            self::JP,
            self::AU,
            self::ES,
            self::IN,
            self::KR,
            self::BR,
        ];
    }
}


