<?php

namespace PayTech\Utils;

/**
 * 
 * @author PapiHack
 * @since 07/2020
 * 
 */
abstract class Check 
{

    const authorizedCurrency = [
        'XOF',
        'USD',
        'CAD',
        'GBP',
        'MAD'
    ];

    const autorizedEnv = [
        'TEST',
        'PROD'
    ];

    public static function isCurrencyAllowed($currency) 
    {
        return array_search(strtoupper($currency), self::authorizedCurrency);
    }

    public static function isEnvAllowed($env) 
    {
        return array_search(strtoupper($env), self::autorizedEnv);
    }
}