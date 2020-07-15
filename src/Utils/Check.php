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

    const authorizeCurrency = [
        'XOF',
        'USD',
        'CAD',
        'GBP',
        'MAD'
    ];

    public static function isCurrencyAllowed($currency) 
    {
        return array_search($currency, self::authorizeCurrency);
    }
}