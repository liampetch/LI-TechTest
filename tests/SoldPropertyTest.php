<?php

namespace App\Tests;


use App\Model\MaxProvider;
use PHPUnit\Framework\TestCase;

class MaxProviderTest extends TestCase
{
    public function testItUpdatesWhenNewValueIsHigher()
    {
        $maxProvider = new MaxProvider();
        $maxProvider->challengeMax(5);

        self::assertEquals(5, $maxProvider->getMax());
    }

    public function testItDoesNotUpdateWhenValueIsLower()
    {
        $maxProvider = new MaxProvider();
        $maxProvider->challengeMax(10);

        $maxProvider->challengeMax(8);

        self::assertEquals(10, $maxProvider->getMax());
    }
}
