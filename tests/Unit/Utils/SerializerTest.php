<?php

namespace Tests\Unit\Utils;

use \PayTech\Utils\Serializer;

/**
 * 
 * @author PapiHack
 * @since 07/2020
 * 
 */

it('Should return a String', function() {
    $this->assertIsString((new Serializer(['nom' => 'papi', 'job' => 'coder']))->toQueryString());
 });

 it('Should return a JSON', function() {
    $this->assertJsonStringEqualsJsonString(json_encode(['nom' => 'papi', 'job' => 'coder']), (new Serializer(['nom' => 'papi', 'job' => 'coder']))->toJSONString());
 });

 it('Should return a XML', function() {
    $this->assertXmlStringEqualsXmlString("<custom_fields><nom>papi</nom><job>coder</job></custom_fields>", 
    (new Serializer(['nom' => 'papi', 'job' => 'coder']))->toXMLString());
 });