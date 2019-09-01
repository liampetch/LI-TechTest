<?php

namespace App\Tests;


use App\Model\MaxProvider;
use App\Model\SoldProperty;
use PHPUnit\Framework\TestCase;

class SoldPropertyTest extends TestCase
{
    private $maxProvider;

    public function setUp() : void
    {
        $this->maxProvider = new MaxProvider(100);
    }

    public function testItAssignsCatagory1()
    {
        $soldProperty = new SoldProperty(1, 1,4, $this->maxProvider);
        self::assertEquals(1, $soldProperty->getPriceCategory());
    }

    public function testItAssignsCatagory2()
    {
        $soldProperty = new SoldProperty(1, 1,20, $this->maxProvider);
        self::assertEquals(2, $soldProperty->getPriceCategory());
    }

    public function testItAssignsCatagory3()
    {
        $soldProperty = new SoldProperty(1, 1,50, $this->maxProvider);
        self::assertEquals(3, $soldProperty->getPriceCategory());
    }

    public function testItAssignsCatagory4()
    {
        $soldProperty = new SoldProperty(1, 1,80, $this->maxProvider);
        self::assertEquals(4, $soldProperty->getPriceCategory());
    }

    public function testItAssignsCatagory5()
    {
        $soldProperty = new SoldProperty(1, 1,96, $this->maxProvider);
        self::assertEquals(5, $soldProperty->getPriceCategory());
    }
}
