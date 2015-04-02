<?php

namespace Spekkionu\PropertyAccess;

use OutOfBoundsException;

trait PropertyAccessTrait
{

    /**
     * Magic Getter
     *
     * @param string $name
     *
     * @return mixed
     */
    public function __get($name)
    {
        if (!property_exists($this, $name)) {
            throw new OutOfBoundsException("Property {$name} does not exist");
        }
        return $this->_getValue($name);
    }

    /**
     * Returns the value of a property
     *
     * @param string $name
     *
     * @return mixed
     */
    private function _getValue($name)
    {
        $getter = $this->getGetterMethod($name);
        if (method_exists($this, $getter)) {
            return $this->$getter();
        } else {
            return $this->$name;
        }
    }

    /**
     * Magic setter
     *
     * @param string $name
     * @param mixed $value
     */
    public function __set($name, $value)
    {
        if (!property_exists($this, $name)) {
            throw new OutOfBoundsException("Property {$name} does not exist");
        }
        $this->_setValue($name, $value);
    }

    /**
     * Sets the value of a property
     *
     * @param string $name
     * @param mixed $value
     */
    private function _setValue($name, $value)
    {
        $setter = $this->getSetterMethod($name);
        if (method_exists($this, $setter)) {
            $this->$setter($value);
        } else {
            $this->$name = $value;
        }
    }

    /**
     * Sets properties from array
     *
     * @param array $values
     */
    public function fill(array $values)
    {
        foreach ($values as $name => $value) {
            if (property_exists($this, $name)) {
                $this->_setValue($name, $value);
            }
        }
    }

    /**
     * Returns estimated getter method
     *
     * @param string $name
     *
     * @return string
     */
    protected function getSetterMethod($name)
    {
        return 'set' . $this->studly($name);
    }

    /**
     * Returns estimated setter method
     *
     * @param string $name
     *
     * @return string
     */
    protected function getGetterMethod($name)
    {
        return 'get' . $this->studly($name);
    }

    /**
     * Convert a value to studly caps case.
     *
     * @param  string  $value
     *
     * @return string
     */
    private function studly($value)
    {
        $value = ucwords(str_replace(array('-', '_'), ' ', $value));
        return str_replace(' ', '', $value);
    }
}
