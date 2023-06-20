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
}
