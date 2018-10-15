<?php

namespace App;

class ObjectIterator
{
    public function iterate($obj)
    {
        $objArray = [];
        $newObj = new \ReflectionObject($obj);
        foreach ($newObj->getProperties() as $prop)
        {            
            $prop->setAccessible(true);
            $name = $prop->getName();
            $value = $prop->getValue($obj);
            $userHasPermission = $this->userHasPermission($value);

            if(\is_object($value)) {                
                $objArray[$name] = $this->iterate($value);                                
            } elseif(\is_array($value)) {                
                for($i=0; $i < count($value); $i++) {
                    if(\is_object($value[$i])) {
                        $objArray[] = $this->iterate($value[$i]); 
                    }
                }
            }else {    
                if(!$userHasPermission && is_string($value)) {
                    $objArray[$name]= 'No Access';
                } else {
                    $objArray[$name]= $value;
                } 
            }            
        }
        return $objArray;
    }
    private function userHasPermission($obj)
    {
        if(is_object($obj)) {
            //do stuff
        }
        return false;
    }
}
