<?php

namespace Tests\Unit\Utils;

use \PayTech\Utils\Check;

/**
 * 
 * @author PapiHack
 * @since 07/2020
 * 
 */

 it('Should allow Euro currency', function() {
    $this->assertTrue(Check::isCurrencyAllowed('EUR'));
 });

 it('Should allow XOF currency', function() {
    $this->assertTrue(Check::isCurrencyAllowed('xof'));
 });

 it('Should not allow dummy currency', function() {
    $this->assertFalse(Check::isCurrencyAllowed('dummyCurrency'));
 });

 it('Should allow Test Env', function() {
   $this->assertTrue(Check::isEnvAllowed('test'));
});

it('Should allow PROD Env', function() {
  $this->assertTrue(Check::isEnvAllowed('PrOD'));
});

it('Should not allow dummy env', function() {
   $this->assertFalse(Check::isEnvAllowed('dummyEnv'));
});