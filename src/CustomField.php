<?php

namespace PayTech;

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
        return self::$data[$name];
    }

    public static function retrieve()
    {
        return self::$data;
    }
}