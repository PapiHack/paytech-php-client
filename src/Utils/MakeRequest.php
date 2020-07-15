<?php

namespace PayTech\Utils;

use Requests;

/**
 * 
 * @author PapiHack
 * @since 07/2020
 * 
 */
abstract class MakeRequest 
{

    private static $headers = [];

    private static $timeout = 15;

    public static function getHeaders() 
    {
        return self::$headers;
    }

    public static function getTimeout() 
    {
        return self::$timeout;
    }

    public static function setHeaders($headers) 
    {
        self::$headers = $headers;
    }


    public static function setTimeout($timeout) 
    {
        self::$timeout = $timeout;
    }

    public static function json($url, $data = []) 
    {
        self::setHeaders([
            'Accept'      => 'application/json',
            'PAYTECH-ENV' => \PayTech\Config::getEnv(),
            'User-Agent'  => \PayTech\PayTech::VERSION_NAME
        ]);

        $jsonPayload = json_encode($data);

        $response = Requests::post($url, self::$headers, $jsonPayload, ['timeout' => self::$timeout]);

        return json_decode($response, true);
    }

    public static function post($url, $data = []) 
    {
        self::setHeaders([
            'Accept'      => 'application/x-www-form-urlencoded',
            'PAYTECH-ENV' => \PayTech\Config::getEnv(),
            'User-Agent'  => \PayTech\PayTech::VERSION_NAME
        ]);

        $response = Requests::post($url, self::$headers, $data, ['timeout' => self::$timeout]);

        return json_decode($response, true);
    }

    public static function get($url) 
    {
        self::setHeaders([
            'PAYTECH-ENV' => \PayTech\Config::getEnv(),
            'User-Agent'  => \PayTech\PayTech::VERSION_NAME
        ]);

        $response = Requests::post($url, self::$headers, ['timeout' => self::$timeout]);

        return json_decode($response, true);
    }
    
}