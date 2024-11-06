<?php
/**
 * AuEligibilityIdTypeConstants
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
 * AuEligibilityIdTypeConstants Class Doc Comment
 *
 * @category Class
 * @package  Domainrobot
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class AuEligibilityIdTypeConstants
{
    /**
     * Possible values of this enum
     */
    const ACN = 'ACN';
    const ABN = 'ABN';
    const VIC = 'VIC';
    const NSW = 'NSW';
    const SA = 'SA';
    const NT = 'NT';
    const WA = 'WA';
    const TAS = 'TAS';
    const ACT = 'ACT';
    const QLD = 'QLD';
    const TM = 'TM';
    const OTHER = 'OTHER';
    const ASL = 'ASL';
    const ACECQA = 'ACECQA';
    const CRICOS = 'CRICOS';
    const RTO = 'RTO';
    const TEQSA = 'TEQSA';
    
    /**
     * Gets allowable values of the enum
     * @return string[]
     */
    public static function getAllowableEnumValues()
    {
        return [
            self::ACN,
            self::ABN,
            self::VIC,
            self::NSW,
            self::SA,
            self::NT,
            self::WA,
            self::TAS,
            self::ACT,
            self::QLD,
            self::TM,
            self::OTHER,
            self::ASL,
            self::ACECQA,
            self::CRICOS,
            self::RTO,
            self::TEQSA,
        ];
    }
}


