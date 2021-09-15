<?php

namespace Benjafield\Rackspace\Objects;

class BaseObject
{
    /**
     * Create a new Base Object instance.
     *
     * @param  array|null  $attributes
     * @return void
     */
    public function __construct(array $attributes = null)
    {
        if(! empty($attributes)) $this->fill($attributes);
    }

    /**
     * Fill the object's public properties with the provided data in the attributes array.
     *
     * @param  array  $attributes
     * @return void
     */
    public function fill(array $attributes = [])
    {
        foreach($attributes as $key => $value) {
            if(property_exists($this, $key)) {
                $this->$key = $value;
            }
        }
    }
}