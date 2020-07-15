<?php

namespace PayTech;

/**
 * 
 * @author PapiHack
 * @since 07/2020
 * 
 */
class CustomField 
{
    private $data = [];

    public function __construct(Array $data = [])
    {
        $this->data = $data;
    }

    public function push($data = [])
    {
        $this->data = $data;
    }

    public function set($name, $value)
    {
        $this->data[$name] = $value;
    }

    public function find($name)
    {
        return $this->data[$name];
    }

    public function retrieve()
    {
        return $this->data;
    }
}