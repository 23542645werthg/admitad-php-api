<?php

namespace Admitad\Api;

class ArrayObject extends \ArrayObject
{
    public function __construct($data = array())
    {
        if (is_array($data)) {
            foreach ($data as $key => $value) {
                if (is_array($value)) {
                    $value = new ArrayObject($value);
                }
                $this[$key] = $value;
            }
        }
    }
    public function __get($key)
    {
        return $this[$key];
    }

    public function offsetGet($key)
    {
        return $this->offsetExists($key) ? parent::offsetGet($key) : null;
    }
}
