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

-   run `php vendor/bin/phpunit tests/ExampleTest.php`
-   run `php vendor/bin/phpunit tests/ExampleTest.php --colors`
-   run `php vendor/bin/phpunit tests/ExampleTest.php --colors --testdox`
-   running all test cases in `tests` directory `php vendor/bin/phpunit tests/`

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

###Autoloading

-   Add below object in `composer.json`
-   Then run `composer dump-autoload`

```json
    "autoload": {
        "psr-4": {
            "TestNamespace\\": "src/"
        }
    }
```

-   Now you can add namespace into your classes like `namespace TestNamespace\WithDependencies;`

###Mockery

####installation

-   composer require --dev mockery/mockery

####Stubs,Mocks and Spy

####Stubs

-   A Stub is used to provide canned responses to method calls. It doesn't record any interactions with the object.
-   This is useful when you want to control the behavior of the dependency in order to isolate the code you're testing.
-   Use when you want to provide a controlled response from a dependency to test the behavior of the unit you're testing.

####Mocks

-   A Mock is used to verify interactions with the object being tested. It records method calls and their parameters for later verification.
-   In your test, you would set up expectations on this mock object, such as "I expect the find method to be called with the argument 1".
-   Use when you want to verify that certain interactions with the dependency occur (e.g., method calls, arguments passed).

####Spy

-   A Spy is similar to a Mock, but it records interactions for later verification while also allowing the real implementation to be called.
-   This allows you to verify interactions later, but also test the real behavior.
-   Use when you want to verify interactions but also want to allow the real implementation to be executed.
