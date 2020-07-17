<?php

namespace Tests\Unit\Exceptions;

use function PHPUnit\Framework\assertIsScalar;

/**
 * 
 * @author PapiHack
 * @since 07/2020
 * 
 */

 it('Shoud be an instance of CurrencyException', function () {
    $this->expectException(\PayTech\Exceptions\CurrencyException::class);
    throw new \PayTech\Exceptions\CurrencyException('Test currecny exception', 999);
 });

 test('Instance of CurrencyException should have a message', function () {
     $this->assertIsString((new \PayTech\Exceptions\CurrencyException('Test currecny exception', 999))->__toString());
 });