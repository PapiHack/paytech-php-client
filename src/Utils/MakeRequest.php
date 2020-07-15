<?php

namespace PayTech\Utils;

/**
 * 
 * @author PapiHack
 * @since 07/2020
 * 
 */
abstract class MakeRequest 
{

    private static $headers = [];

    public static function getHeaders() 
    {
        return self::$headers;
    }

    public static function setHeaders($headers) 
    {
        self::$headers = $headers;
    }

    public static function json($url, $data = []) 
    {
        self::setHeaders([
            'Accept'      => 'application/json',
            'PAYTECH-ENV' => \PayTech\Config::getEnv(),
            'User-Agent'  => \PayTech\PayTech::VERSION_NAME
        ]);
    }

    public static function post($url, $data = []) 
    {
        self::setHeaders([
            'Accept'      => 'application/x-www-form-urlencoded',
            'PAYTECH-ENV' => \PayTech\Config::getEnv(),
            'User-Agent'  => \PayTech\PayTech::VERSION_NAME
        ]);
    }

    public static function get($url) 
    {
        self::setHeaders([
            'PAYTECH-ENV' => \PayTech\Config::getEnv(),
            'User-Agent'  => \PayTech\PayTech::VERSION_NAME
        ]);
    }
    
}