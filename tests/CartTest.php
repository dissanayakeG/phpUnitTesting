<?php

use PHPUnit\Framework\TestCase;

class CartTest extends TestCase
{
    protected $cart;

    protected function setUp(): void
    {
        require './src/Cart.php';
        $this->cart = new Cart();
    }

    public function testNetPriceIsCalculatedCorrectly()
    {
        //setup
        //setUp() method called automatically
        $this->cart->price = 10;
        
        //do something
        $netPrice = $this->cart->getNetPrice();

        //assertion
        $this->assertEquals(12, $netPrice);
    }
}
