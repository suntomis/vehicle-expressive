<?php

declare(strict_types = 1);

namespace Isedc\AppServer\Model\Vehicle;

use Isedc\AppServer\Repository\TraitsRepository;

class Vehicle
{
    private $name;

    private $traitsRepository;

    public function __construct(string $name, ?TraitsRepository $traitsRepository = null)
    {
        $this->setName($name);
        $this->setTraitsRepository($traitsRepository);
    }

    private function setTraitsRepository(?TraitsRepository $traitsRepository)
    {
        $this->traitsRepository = $traitsRepository;
    }

    protected function getTraitsRepository(): ?TraitsRepository
    {
        return $this->traitsRepository;
    }

    public function __call($methodName, $argv)
    {
        if (!empty($this->getTraitsRepository()->get($methodName) )) {
            $closure = $this->getTraitsRepository()->get($methodName);
            
            //lazy initialization of Trait object
            $trait = $closure();

            //trait is invokable object
            return $trait($this->getName(), ...$argv);
        }

        throw new \BadMethodCallException;
    }

    public function getName()
    {
        return $this->name;
    }

    public function buzz()
    {
        echo 'this is buzz method';
    }

    protected function log(...$argv)
    {
        //do nothing; it's a template method
    }

    protected function notify(...$argv)
    {
        //do nothing; it's a template method
    }

    private function setName($name)
    {
        $this->name = $name;
    }
}
