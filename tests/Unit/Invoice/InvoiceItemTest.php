<?php

namespace Tests\Unit\Invoice;

use PayTech\Invoice\InvoiceItem;
use PHPUnit\Framework\TestFailure;

use function PHPUnit\Framework\assertNotEquals;

/**
 * 
 * @author PapiHack
 * @since 07/2020
 * 
 */

it('Should have name attribute', function () {
    $this->assertClassHasAttribute('name', InvoiceItem::class);
});

it('Should have price attribute', function () {
    $this->assertClassHasAttribute('price', InvoiceItem::class);
});

it('Should have command name attribute', function () {
    $this->assertClassHasAttribute('commandName', InvoiceItem::class);
});

it('Should have reference command attribute', function () {
    $this->assertClassHasAttribute('refCommand', InvoiceItem::class);
});

it('Should instantiate InvoiceItem class', function () {
    $invoiceItem = new InvoiceItem('PS4', 225000, 'command-test', 'ref-command');
    $this->assertInstanceOf(InvoiceItem::class, $invoiceItem);
});

it('Should be string for name, command name and ref name', function () {
    $invoiceItem = new InvoiceItem('PS4', 225000, 'command-test', 'ref-command');
    $this->assertIsString($invoiceItem->getName());
    $this->assertIsString($invoiceItem->getCommandName());
    $this->assertIsString($invoiceItem->getRefCommand());
});

it('Should change price', function () {
    $invoiceItem = new InvoiceItem('PS4', 225000, 'command-test', 'ref-command');
    $this->assertIsInt($invoiceItem->getPrice());
    $invoiceItem->setPrice(250000);
    $this->assertNotEquals(225000, $invoiceItem->getPrice());
});

it('Should raise an exception when price is not a number', function () {
    $this->expectException(\Exception::class);
    $invoiceItem = new InvoiceItem('PS4', '225000', 'command-test', 'ref-command');
});
