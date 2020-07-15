<?php

namespace PayTech\Exceptions;

use Exception;

/**
 * 
 * @author PapiHack
 * @since 07/2020
 * 
 */
class CurrencyException extends Exception
{
    const authorizeCurrency = [
        'XOF',
        'USD',
        'CAD',
        'GBP',
        'MAD'
    ];
}
