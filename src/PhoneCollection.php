<?php

namespace App;

class PhoneCollection
{   
    private $phones;

    public function __construct(Phone ...$phone)
    {        
        $this->phones = $phone;
    }   
   
    public function getPhones()
    {
        return $this->phones;
    }
}