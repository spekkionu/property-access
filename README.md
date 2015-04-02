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

    private $name;

    private $email;

}
```

```php

$example = new ExampleClass();

$example->name = 'Bob';
$example->email = 'bob@example.com';

echo $example->name; // Bob

$example->fill(array(
    'name' => 'Steve',
    'email' => 'steve@example.com'
));

echo $example->email; // steve@example.com
```

## Getters and Setters will be called

### You can even use Value Objects

```php
use use Spekkionu\PropertyAccess\PropertyAccessTrait;

class ExampleClass
{
    use PropertyAccessTrait;

    private $name;

    private $email;

    public function setEmail(EmailAddress $email){
        $this->email = $email;
    }

}

// Value Object
class EmailAddress
{
    private $email;
}

// Usage
$example = new ExampleClass();
$example->email = new EmailAddress('bob#example.com');

```
