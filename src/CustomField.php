<?php

namespace PayTech;

use Exception;

/**
 * 
 * @author PapiHack
 * @since 07/2020
 * 
 */
abstract class CustomField 
{
    private static $data = [];

    public static function push($data = [])
    {
        self::$data = $data;
    }

    public static function set($name, $value)
    {
        self::$data[$name] = $value;
    }

    public static function find($name)
    {
        if (array_key_exists($name, self::$data)) 
        {
            return self::$data[$name];
        }
        else 
        {
            throw new Exception('The '.$name.' key doesn\'t exist !');
        }
    }

    public static function retrieve()
    {
        return self::$data;
    }
}