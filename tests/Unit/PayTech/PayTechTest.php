<?php

namespace Tests\Unit\PayTech;

use PayTech\ApiResponse;
use PayTech\PayTech;

/**
 * 
 * @author PapiHack
 * @since 07/2020
 * 
 */

 it('Should send data', function () {
     PayTech::send(new \PayTech\Invoice\InvoiceItem('HP Pavillon 15', 260000, 'commande n°1', 'test-ref'));
     $this->assertIsNumeric(\PayTech\ApiResponse::getSuccess());
 });

 it('Should have response after sending data', function () {
    $this->assertIsInt(\PayTech\ApiResponse::getSuccess());
 });