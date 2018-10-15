<?php

namespace App;

class Phone 
{
    private $id;
    private $phone;

    public function __construct($id, $phone)
    {
        $this->id = $id;
        $this->phone = $phone;
    }
    
    public function getId()
    {
        return $this->id;
    }
   
    public function getPhone()
    {
        return $this->phone;
    }
}
