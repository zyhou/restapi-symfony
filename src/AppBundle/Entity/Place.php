<?php

namespace  AppBundle\Entity;

class Place
{
    public $name;
    public $address;

    public  function __construct($name, $adress)
    {
        $this->name = $name;
        $this->address = $adress;
    }

}