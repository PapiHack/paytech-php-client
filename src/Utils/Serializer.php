<?php

namespace PayTech\Utils;

/**
 * 
 * @author PapiHack
 * @since 07/2020
 * 
 */
Class Serializer 
{
    private  $data = [];

    public function __construct(Array $data)
    {
        $this->setData($data);
    }

    public function getData() 
    {
        return $this->data;
    }

    public function setData(Array $data) 
    {
        $this->data = $data;
    }

    public function toJSONString()
    {
        return json_encode($this->data);
    }

    public function toXMLString()
    {
        return $this->arrayToXml($this->data, '<custom_fields/>');
    }

    public function toQueryString()
    {
        return http_build_query($this->data);
    }

    // @codeCoverageIgnoreStart
    private function arrayToXml($array, $rootElement = null, $xml = null) { 
        $xmlDocument = $xml; 

        if ($xmlDocument === null) 
        { 
            $xmlDocument = new \SimpleXMLElement($rootElement !== null ? $rootElement : '<root/>'); 
        }

        foreach ($array as $key => $value) 
        {
            is_array($value) ? $this->arrayToXml($value, $key, $xmlDocument->addChild($key)) : $xmlDocument->addChild($key, $value);
        } 
          
        return $xmlDocument->asXML(); 
    }
    // @codeCoverageIgnoreEnd
}