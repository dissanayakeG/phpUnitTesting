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

run `php vendor/bin/phpunit tests/ExampleTest.php`