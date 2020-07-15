<?php

namespace PayTech;

/**
 * 
 * @author PapiHack
 * @since 07/2020
 * 
 */
abstract class Config extends PayTech
{
    const ROOT_URL_BASE         = "https://paytech.sn";
    const PAYMENT_REQUEST_PATH  = '/api/payment/request-payment';
    const PAYMENT_REDIRECT_PATH = '/payment/checkout/';
    const MOBILE_CANCEL_URL     = "https://paytech.sn/mobile/cancel";
    const MOBILE_SUCCESS_URL    = "https://paytech.sn/mobile/success";

    private static  $apiKey;
    private static  $apiSecret;

    private static $query = [];
    private static $params = [];
    private static $customeField = [];

    private static $liveMode = true;
    private static $testMode = false;

    private static $isMobile = false;

    private static $currency = Currency::XOF;
    
    private static $refCommand = '';

    private static $notificationUrl = [];

    public static function getApiKey() 
    {
        return self::$apiKey;
    }

    public static function getApiSecret() 
    {
        return self::$apiSecret;
    }

    public static function getCustomField() 
    {
        return self::$customeField;
    }

    public static function getLiveMode() 
    {
        return self::$liveMode;
    }

    public static function getTestMode() 
    {
        return self::$testMode;
    }

    public static function getIsMobile() 
    {
        return self::$isMobile;
    }

    public static function getCurrency() 
    {
        return self::$currency;
    }

    public static function getNotificationUrl() 
    {
        return self::$notificationUrl;
    }

    public static function setApiKey($apiKey) 
    {
        self::$apiKey = $apiKey;
    }

    public static function setApiSecret($apiSecret) 
    {
        self::$apiSecret = $apiSecret;
    }

    public static function setCustomField($customeField) 
    {
        self::$customeField = $customeField;
    }

    public static function setLiveMode($liveMode) 
    {
        self::$liveMode = $liveMode;
        self::$testMode = !$liveMode;
    }

    public static function setTestMode($testMode) 
    {
        self::$testMode = $testMode;
        self::$liveMode = !$testMode;
    }

    public static function setIsMobile($isMobile) 
    {
        self::$isMobile = $isMobile;
    }

    public static function setCurrency($currency) 
    {
        self::$currency = strtolower($currency);
    }

    public static function setNotificationUrl($notificationUrl) 
    {
        self::$notificationUrl = $notificationUrl;
    }

}