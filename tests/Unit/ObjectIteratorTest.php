<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Brand;
use App\Email;
use App\Phone;
use App\PhoneCollection;
use App\ObjectIterator;

class ObjectIteratorTest extends TestCase
{
    private $iterator;

    public function setUp()
    {
        $this->iterator = new ObjectIterator();
    }
    /**
     * @test
     */
    public function itIteratesAnObjectAndReturnsAnArray() {
        $phone1 = new Phone(1, '96513119');
        $phone2 = new Phone(2, '96513111');
        $phones = new PhoneCollection($phone1, $phone2);
        $email = new Email(1, 'anEmail@em.com');
        $brand = new Brand(1, 'em', $email, $phones);
        $actual = $this->iterator->iterate($brand);
        $this->assertInternalType('array', $actual);
        $expected = [
            'id'=>1, 
            'name'=>'No Access',
            'email' => [
                'id' => 1,
                'email' => 'No Access'
            ],
            'phones' => [
                ['id'=>1, 'phone'=>'No Access'],
                ['id'=>2, 'phone'=>'No Access']
            ]
        ];        
        $this->assertEquals($expected, $actual);
    }


}