<?php

namespace Tests\Unit\PayTech;

use \PayTech\Config;

/**
 * 
 * @author PapiHack
 * @since 07/2020
 * 
 */

 it('Should have XOF currency by default', function() {
     $this->assertSame(\PayTech\Enums\Currency::XOF, strtoupper(Config::getCurrency()));
 });

 test('LiveMode should be activate by default', function () {
     $this->assertTrue(Config::getLiveMode());
 });

 test('TestMode should be disable by default', function () {
     $this->assertFalse(Config::getTestMode());
 });

 test('Mobile config should be disable by default', function () {
     $this->assertFalse(Config::getIsMobile());
 });

 test('Notification Urls should be empty by default', function () {
     $this->assertEmpty(Config::getIpnUrl());
     $this->assertEmpty(Config::getSuccessUrl());
     $this->assertEmpty(Config::getCancelUrl());
 });

 it('Should set some Config attributes', function () {
     Config::setApiKey('saplspalsa4545s4a5s4');
     Config::setApiSecret('saplspalsa4545s4a5s4');
     Config::setCurrency(\PayTech\Enums\Currency::USD);
     Config::setLiveMode(false);
     Config::setTestMode(true);
     Config::setIsMobile(false);
     Config::setIpnUrl('http://papihack/dashboard/');
     Config::setSuccessUrl('http://papihack/dashboard/');
     Config::setCancelUrl('http://papihack/dashboard/');

     $this->assertIsString(Config::getApiKey());
     $this->assertIsString(Config::getApiSecret());
     $this->assertIsString(Config::getCurrency());
     $this->assertIsBool(Config::getLiveMode());
     $this->assertIsBool(Config::getTestMode());
     $this->assertIsBool(Config::getIsMobile());
     $this->assertIsString(Config::getIpnUrl());
     $this->assertIsString(Config::getSuccessUrl());
     $this->assertIsString(Config::getCancelUrl());
 });

 it('Should raise an CurrencyException when currency is not allowed', function () {
     $this->expectException(\PayTech\Exceptions\CurrencyException::class);
     Config::setCurrency('dummy currency');
 });

 it('Should raise an Exception when env is not allowed', function () {
     $this->expectException(\Exception::class);
     Config::setEnv('dummyEnv');
 });

 it('Should set Env when env is allowed', function () {
    Config::setEnv(\PayTech\Enums\Environment::TEST);
    $this->assertIsString(Config::getEnv());
});