<?php

namespace Tests\Unit\Utils;

use \PayTech\Utils\Check;

/**
 * 
 * @author PapiHack
 * @since 07/2020
 * 
 */

 it('Should not allow Euro currency', function() {
    $this->assertFalse(Check::isCurrencyAllowed('EUR'));
 });

 it('Should allow XOF currency', function() {
    $this->assertIsInt(Check::isCurrencyAllowed('XOF'));
 });