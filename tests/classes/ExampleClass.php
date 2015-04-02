<?php
namespace Spekkionu\PropertyAccess\Test;

use Spekkionu\PropertyAccess\PropertyAccessTrait;

class ExampleClass
{
    use PropertyAccessTrait;

    protected $name = 'Bob';

    protected $email = 'bob@example.com';

    public function getName()
    {
        return ucwords($this->name);
    }

    public function setEmail($email)
    {
        $this->email = strtolower($email);
    }
}
