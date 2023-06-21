<?php

use PHPUnit\Framework\TestCase;

class CartTest extends TestCase
{
    public function testNetPriceIsCalculatedCorrectly()
    {
        //setup
        require './src/Cart.php';
        $cart = new Cart();
        $cart->price = 10;

        //do something
        $netPrice = $cart->getNetPrice();

        //assertion
        $this->assertEquals(12, $netPrice);
    }
}
