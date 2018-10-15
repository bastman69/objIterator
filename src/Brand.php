<?php

namespace App;

class Brand 
{
    private $id;
    private $name;
    private $email;
    private $phones;

    public function __construct($id, $name, Email $email, PhoneCollection $phones)
    {
       $this->id = $id;
       $this->name = $name;
       $this->email = $email;
       $this->phones = $phones;
    }

    public function getId()
    {
        return $this->id;
    }
    public function getName()
    {
        return $this->name;
    }
    
    public function getEmail()
    {
        return $this->email;
    }
   
    public function getPhones()
    {
        return $this->phones;
    }
}
