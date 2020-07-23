<?php

namespace PayTech\Utils;

use PayTech\Enums\Currency;
use PayTech\Enums\Environment;

/**
 * 
 * @author PapiHack
 * @since 07/2020
 * 
 */
abstract class Check
{ 
    public static function isCurrencyAllowed($currency) 
    {
        return defined(Currency::class .'::'. strtoupper($currency));
    }

    public static function isEnvAllowed($env)
    {
        return defined(Environment::class .'::'. strtoupper($env));
    }
}