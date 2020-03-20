<?php
/**
 * TransferStatusConstants
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
 * Swagger Codegen version: 2.4.12-SNAPSHOT
 */

/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace Domainrobot\Model;
use \Domainrobot\ObjectSerializer;

/**
 * TransferStatusConstants Class Doc Comment
 *
 * @category Class
 * @package  Domainrobot
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class TransferStatusConstants
{
    /**
     * Possible values of this enum
     */
    const NOT_SET = 'NOT_SET';
    const START = 'START';
    const FAILED = 'FAILED';
    const NACK = 'NACK';
    const ACK = 'ACK';
    const FOA1_SENT = 'FOA1_SENT';
    const AUTOUPDATE_SUCCESS = 'AUTOUPDATE_SUCCESS';
    const AUTOUPDATE_FAILED = 'AUTOUPDATE_FAILED';
    
    /**
     * Gets allowable values of the enum
     * @return string[]
     */
    public static function getAllowableEnumValues()
    {
        return [
            self::NOT_SET,
            self::START,
            self::FAILED,
            self::NACK,
            self::ACK,
            self::FOA1_SENT,
            self::AUTOUPDATE_SUCCESS,
            self::AUTOUPDATE_FAILED,
        ];
    }
}


