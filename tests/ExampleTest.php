<?php

use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    public function testTwoStringsAreTheSame()
    {
        $string1 = 'Hello';
        $string2 = 'Hello';
        $this->assertSame($string1, $string2);
    }

    public function testProduct()
    {
        require './src/ExampleFunction.php';
        $product = product(10, 2);
        $this->assertEquals(20, $product);
    }
}
