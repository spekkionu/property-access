# Property Access Trait

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