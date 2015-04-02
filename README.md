# Property Access Trait

[![Build Status](https://travis-ci.org/spekkionu/property-access.svg?branch=master)](https://travis-ci.org/spekkionu/property-access)
[![Code Coverage](https://scrutinizer-ci.com/g/spekkionu/property-access/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/spekkionu/property-access/?branch=master)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/spekkionu/property-access/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/spekkionu/property-access/?branch=master)
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/f01daa7f-b46d-4575-aeb8-7be3885d4967/mini.png)](https://insight.sensiolabs.com/projects/f01daa7f-b46d-4575-aeb8-7be3885d4967)

Trait that automatically calls getters and setters for property access.


```php
use use Spekkionu\PropertyAccess\PropertyAccessTrait;

class ExampleClass
{
    use PropertyAccessTrait;

    protected $name;

    protected $email;

}
```
