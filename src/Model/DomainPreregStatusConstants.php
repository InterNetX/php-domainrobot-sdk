<?php
/**
 * DomainPreregStatusConstants
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
 * DomainPreregStatusConstants Class Doc Comment
 *
 * @category Class
 * @package  Domainrobot
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class DomainPreregStatusConstants
{
    /**
     * Possible values of this enum
     */
    const PENDING = 'PENDING';
    const PENDING_SENT = 'PENDING_SENT';
    const PENDING_DOCUMENT_SENT = 'PENDING_DOCUMENT_SENT';
    const PENDING_PROGRESS = 'PENDING_PROGRESS';
    const PENDING_UPDATE = 'PENDING_UPDATE';
    const PENDING_SENT_UPDATE = 'PENDING_SENT_UPDATE';
    const TIMEOUT = 'TIMEOUT';
    const ACCEPT = 'ACCEPT';
    const DECLINE = 'DECLINE';
    const INVALID_NAME = 'INVALID_NAME';
    const FAILED = 'FAILED';
    const CANCEL = 'CANCEL';
    const AUTO_CANCEL = 'AUTO_CANCEL';
    const ACTIVE = 'ACTIVE';
    const SENT = 'SENT';
    const OPEN = 'OPEN';
    const TMCH_CLAIM = 'TMCH_CLAIM';
    const TMCH_CLAIM_CONFIRMED = 'TMCH_CLAIM_CONFIRMED';
    const TMCH_CLAIM_REJECTED = 'TMCH_CLAIM_REJECTED';
    const TMCH_CLAIM_EXPIRED = 'TMCH_CLAIM_EXPIRED';
    const TMCH_CLAIM_PENDING = 'TMCH_CLAIM_PENDING';
    const TMCH_CLAIM_FAILED = 'TMCH_CLAIM_FAILED';
    const FAILED_REF = 'FAILED_REF';
    
    /**
     * Gets allowable values of the enum
     * @return string[]
     */
    public static function getAllowableEnumValues()
    {
        return [
            self::PENDING,
            self::PENDING_SENT,
            self::PENDING_DOCUMENT_SENT,
            self::PENDING_PROGRESS,
            self::PENDING_UPDATE,
            self::PENDING_SENT_UPDATE,
            self::TIMEOUT,
            self::ACCEPT,
            self::DECLINE,
            self::INVALID_NAME,
            self::FAILED,
            self::CANCEL,
            self::AUTO_CANCEL,
            self::ACTIVE,
            self::SENT,
            self::OPEN,
            self::TMCH_CLAIM,
            self::TMCH_CLAIM_CONFIRMED,
            self::TMCH_CLAIM_REJECTED,
            self::TMCH_CLAIM_EXPIRED,
            self::TMCH_CLAIM_PENDING,
            self::TMCH_CLAIM_FAILED,
            self::FAILED_REF,
        ];
    }
}

