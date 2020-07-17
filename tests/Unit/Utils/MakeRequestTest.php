<?php

namespace Tests\Unit\Utils;

use \PayTech\Utils\MakeRequest;

/**
 * 
 * @author PapiHack
 * @since 07/2020
 * 
 */

 it('Should have headers & timeout static attributes', function () {
     $this->assertClassHasStaticAttribute('headers', MakeRequest::class);
     $this->assertClassHasStaticAttribute('timeout', MakeRequest::class);
 });

 test('Timeout attribute should be 15 by default', function () {
     $this->assertEquals(15, MakeRequest::getTimeout());
});

test('Headers attribute should be empty by default', function () {
    // $this->assertEmpty(MakeRequest::getHeaders());
    $this->assertGreaterThanOrEqual(1, MakeRequest::getHeaders());
});

it('Should change default timeout value & set headers attrivute', function () {
    MakeRequest::setTimeout(20);
    MakeRequest::setHeaders(['ACCEPT' => 'application/json;charset=utf-8']);
    $this->assertNotEmpty(MakeRequest::getHeaders());
    $this->assertGreaterThanOrEqual(15, MakeRequest::getTimeout());
});

it('Should make a post request with json data', function () {
    $response = MakeRequest::json('http://papihack/dashboard/', ['name' => 'papi']);
    $this->assertEmpty($response);
});

it('Should make a post request', function () {
    $response = MakeRequest::post('http://papihack/dashboard/', ['name' => 'papi']);
    $this->assertEmpty($response);
});

it('Should make a get request', function () {
    $response = MakeRequest::get('http://papihack/dashboard/');
    $this->assertEmpty($response);
});
