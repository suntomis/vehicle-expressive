<?php

namespace App\Entity;

class TraitsManager
{
    private $cache = [];

    public function get($key)
    {
        //validation
        if (!isset(InterfaceVehicleTrait::list[$key])) {
            throw new \Exception('Wrong trait name ' . $key);
        }

        //simple logic of class initialization
        $class = '\\App\Traits\\' . ucfirst($key);

        //lazy initialization logic with closure
        $closure = function () use ($key, $class) {

            if (!empty($this->cache[$key])) {
                return $this->cache[$key];
            }

            $obj = new $class();
            $this->cache[$key] = $obj;

            return $obj;
        };

        return $closure;
    }
}
