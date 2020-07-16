<?php

namespace PayTech\Invoice;

/**
 * 
 * @author PapiHack
 * @since 07/2020
 * 
 */
class InvoiceItem 
{

    private $name;
    private $price;
    private $commandName;
    private $refCommand;

    public function __construct($name, $price, $commandName, $refCommand)
    {
        $this->setName($name);
        $this->setPrice($price);
        $this->setCommandName($commandName);
        $this->setRefCommand($refCommand);
    }

    public function getName()
    {
        return $this->name;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getCommandName()
    {
        return $this->commandName;
    }

    public function getRefCommand()
    {
        return $this->refCommand;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function setCommandName($commandName)
    {
        $this->commandName = $commandName;
    }

    public function setRefCommand($refCommand)
    {
        $this->refCommand = $refCommand;
    }
} 