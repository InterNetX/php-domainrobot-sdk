<?php
/**
 * AuthenticationStep
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
 * AuthenticationStep Class Doc Comment
 *
 * @category Class
 * @package  Domainrobot
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class AuthenticationStep
{
    /**
     * Possible values of this enum
     */
    const DOMAIN_VERIFICATION = 'DOMAIN_VERIFICATION';
    const VERIFICATION_CALL = 'VERIFICATION_CALL';
    const ORGANIZATION_VERIFICATION = 'ORGANIZATION_VERIFICATION';
    const CONSUMER_AUTHENTICATION = 'CONSUMER_AUTHENTICATION';
    const CERTIFICATE = 'CERTIFICATE';
    const CONTACT_CONFIRMED = 'CONTACT_CONFIRMED';
    const VERIFICATION = 'VERIFICATION';
    const CSR_CHECK = 'CSR_CHECK';
    const DCV_CHECK = 'DCV_CHECK';
    const OV_CALLBACK = 'OV_CALLBACK';
    const FREE_DVUP = 'FREE_DVUP';
    const EV_CLICKTROUGH = 'EV_CLICKTROUGH';
    const EXTENDED_VERIFICATION = 'EXTENDED_VERIFICATION';
    
    /**
     * Gets allowable values of the enum
     * @return string[]
     */
    public static function getAllowableEnumValues()
    {
        return [
            self::DOMAIN_VERIFICATION,
            self::VERIFICATION_CALL,
            self::ORGANIZATION_VERIFICATION,
            self::CONSUMER_AUTHENTICATION,
            self::CERTIFICATE,
            self::CONTACT_CONFIRMED,
            self::VERIFICATION,
            self::CSR_CHECK,
            self::DCV_CHECK,
            self::OV_CALLBACK,
            self::FREE_DVUP,
            self::EV_CLICKTROUGH,
            self::EXTENDED_VERIFICATION,
        ];
    }
}


