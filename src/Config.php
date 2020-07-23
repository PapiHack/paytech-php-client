<?php

namespace PayTech;

use PayTech\Enums\Currency;
use PayTech\Enums\Environment;
use PayTech\Utils\Check;
use PayTech\Exceptions\CurrencyException;

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

    private static $apiKey;
    private static $apiSecret;

    private static $currency = Currency::XOF;

    private static $liveMode = true;
    private static $testMode = false;

    private static $isMobile = false;

    private static $ipnUrl;
    private static $successUrl;
    private static $cancelUrl;

    private static $env = Environment::PROD;

    public static function getApiKey() 
    {
        return self::$apiKey;
    }

    public static function getApiSecret() 
    {
        return self::$apiSecret;
    }

    public static function getCurrency() 
    {
        return strtolower(self::$currency);
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

    public static function getIpnUrl() 
    {
        return self::$ipnUrl;
    }

    public static function getSuccessUrl() 
    {
        return self::$successUrl;
    }

    public static function getCancelUrl() 
    {
        return self::$cancelUrl;
    }

    public static function getEnv() 
    {
        return strtolower(self::$env);
    }

    public static function setApiKey($apiKey) 
    {
        self::$apiKey = $apiKey;
    }

    public static function setApiSecret($apiSecret) 
    {
        self::$apiSecret = $apiSecret;
    }

    public static function setCurrency($currency)
    {
        if (Check::isCurrencyAllowed($currency)) 
        {
            self::$currency = $currency;
        }
        else 
        {
            throw new CurrencyException("That Currency is not allowed for the moment... Sorry :(", -99);
        }

    }

    // @codeCoverageIgnoreStart
    private static function setLiveMode($liveMode) 
    {
        self::$liveMode = $liveMode;
        self::$testMode = !$liveMode;
    }
    // @codeCoverageIgnoreEnd
    
    private static function setTestMode($testMode) 
    {
        self::$testMode = $testMode;
        self::$liveMode = !$testMode;
    }

    public static function setIsMobile($isMobile) 
    {
        self::$isMobile = $isMobile;
    }

    public static function setIpnUrl($ipnUrl) 
    {
        self::$ipnUrl = $ipnUrl;
    }

    public static function setSuccessUrl($successUrl) 
    {
        self::$successUrl = $successUrl;
    }

    public static function setCancelUrl($cancelUrl) 
    {
        self::$cancelUrl = $cancelUrl;
    }
    
    public static function setEnv($env) 
    {
        if (Check::isEnvAllowed($env))
        {
            self::$env = strtolower($env);
            self::setApproriateLiveAndTestMode();
        }
        else
        {
            throw new \Exception('The '. $env. ' is not allowed. Please chose between test or prod !');
        }
    }

    // @codeCoverageIgnoreStart
    private static function setApproriateLiveAndTestMode() 
    {
        switch (self::getEnv()) 
        {
            case 'test': 
                self::setTestMode(true);
            break;
            case 'prod':
                self::setLiveMode(true);
            break;
        }
    }
    // @codeCoverageIgnoreEnd

}