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