<?php

namespace PayTech;

/**
 * 
 * @author PapiHack
 * @since 07/2020
 * 
 */
abstract class ApiResponse extends PayTech
{
    private static $success;
    private static $token;
    private static $errors;
    private static $redirectUrl;

    public static function getSuccess() 
    {
        return self::$success;
    }

    public function getToken() 
    {
        return self::$token;
    }

    public function getErrors() 
    {
        return self::$errors;
    }

    public function getRedirectUrl() 
    {
        return self::$redirectUrl;
    }

    public static function setSuccess($success) 
    {
        self::$success = $success;
    }

    public static function setToken($token) 
    {
        self::$token = $token;
    }

    public static function setErrors($errors) 
    {
        self::$errors = $errors;
    }

    public static function setRedirectUrl($redirectUrl) 
    {
        self::$redirectUrl = $redirectUrl;
    }
} 