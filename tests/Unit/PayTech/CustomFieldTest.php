<?php

namespace Tests\Unit\PayTech;

use \PayTech\CustomField;

/**
 * 
 * @author PapiHack
 * @since 07/2020
 * 
 */

 it('Shoud have a static property named data', function () {
     $this->assertClassHasStaticAttribute('data', CustomField::class);
});

test('The data property should be an empty Array', function () {
    $this->assertIsArray(CustomField::retrieve());
    $this->assertEmpty(CustomField::retrieve());
});

test('data property should be an empty Array', function () {
    CustomField::push(['test' => 'this is a test']);
    $this->assertNotEmpty(CustomField::retrieve());
});

it('Shoud have an entry named test', function () {
    CustomField::push(['test' => 'this is a test']);
    $this->assertTrue(array_key_exists('test', CustomField::retrieve()));
});

it('Shoud have an entry named test & price', function () {
    CustomField::push(['test' => 'this is a test']);
    CustomField::set('price', 500);
    $this->assertTrue(array_key_exists('test', CustomField::retrieve()));
    $this->assertTrue(array_key_exists('price', CustomField::retrieve()));
    $this->assertEquals(2, count(CustomField::retrieve()));
});

it('Shoud set an dummy entry', function () {
    CustomField::set('dummy', 'test');
    $this->assertTrue(array_key_exists('dummy', CustomField::retrieve()));
    $this->assertEquals(3, count(CustomField::retrieve()));
});

it('Shoud get dummy value', function () {
    $this->assertIsString(CustomField::find('dummy'));
});

it('Should raise an exception when an entry not exist', function () {
    $this->expectException(\Exception::class);
    CustomField::find('nothin');
});