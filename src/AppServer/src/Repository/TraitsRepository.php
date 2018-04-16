<?php

namespace Isedc\AppServer\Repository;

class TraitsRepository
{
    private $collection = [];

    private $traitsManager;

    public function __construct($traitsManager)
    {
        $this->traitsManager = $traitsManager;
    }

    public function add($key)
    {
        $this->collection[$key] = $this->getTraitsManager()->get($key);
    }

    private function getTraitsManager()
    {
        return $this->traitsManager;
    }

    public function get(string $key):?callable
    {
        if (empty($this->collection[$key])) {
            //throw new \Exception('Trait with name ' . $key . ' not found in collection.');
            
            return null;
        }

        return $this->collection[$key];
    }
}
