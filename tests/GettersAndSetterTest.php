<?php

namespace Spekkionu\PropertyAccess\Test;

use PHPUnit_Framework_TestCase;
use Spekkionu\PropertyAccess\PropertyAccessTrait;
use OutOfBoundsException;

require_once dirname(__DIR__) . '/src/PropertyAccessTrait.php';
require_once __DIR__ . '/classes/ExampleClass.php';


class PropertyAccessTraitTest extends PHPUnit_Framework_TestCase
{
    /**
     * Test magic getter
     *
     * @test
     */
    public function test_getter()
    {
        $class = new ExampleClass();
        $name = $class->name;
        $this->assertEquals('Bob', $name);
    }

    /**
     * Tests getting a property that doesn't exist
     *
     * @test
     * @expectedException OutOfBoundsException
     */
    public function test_getter_without_property()
    {
        $this->setExpectedException('OutOfBoundsException');
        $class = new ExampleClass();
        $value = $class->does_not_exist;
    }

    /**
     * Test getter for property with custom getter method
     *
     * @test
     */
    public function test_getter_with_method()
    {
        $class = new ExampleClass();
        $class->name = 'bob';
        $name = $class->name;
        $this->assertEquals('Bob', $name);
    }

    /**
     * Test magic setter
     *
     * @test
     */
    public function test_setter()
    {
        $class = new ExampleClass();
        $class->name = 'Steve';
        $name = $class->name;
        $this->assertEquals('Steve', $name);
    }

    /**
     * Test setter with custom setter method
     *
     * @test
     */
    public function test_setter_with_method()
    {
        $class = new ExampleClass();
        $class->email = 'BOB@example.com';
        $email = $class->email;
        $this->assertEquals('bob@example.com', $email);
    }

    /**
     * Tests setting a property that doesn't exist
     *
     * @test
     * @expectedException \OutOfBoundsException
     */
    public function test_setter_without_property()
    {
        $this->setExpectedException('OutOfBoundsException');
        $class = new ExampleClass();
        $class->does_not_exist = 'value';
    }

    /**
     * Test fill method for multiple properties
     *
     * @test
     */
    public function test_fill_method()
    {
        $class = new ExampleClass();
        $class->fill(array(
            'name' => 'Carl',
            'email' => 'carl@example.com'
        ));
        $this->assertEquals('Carl', $class->name);
        $this->assertEquals('carl@example.com', $class->email);
    }
}
