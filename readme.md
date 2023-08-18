crete an empty directory

open with text editor or with IDE

goto `https://packagist.org`

search `phpunit` (https://packagist.org/packages/phpunit/phpunit)

run `composer require --dev phpunit/phpunit`

create a test file `tests\ExampleTest.php`

NOTE: test file names should prefixed with 'Test' and test cases names should start with 'test'


```php
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
```

- run `php vendor/bin/phpunit tests/ExampleTest.php`
- run `php vendor/bin/phpunit tests/ExampleTest.php --colors`
- run `php vendor/bin/phpunit tests/ExampleTest.php --colors --testdox`
- running all test cases in `tests` directory `php vendor/bin/phpunit tests/`

there are 3 part of a test case

```php

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
```