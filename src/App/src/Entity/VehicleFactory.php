<?php

namespace App\Entity;

use App\Entity\Vehicle;

use Zend\ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;

use App\Entity\TraitsManager;
use App\Entity\TraitsRepository;
use App\Entity\TraitsDirector;

class VehicleFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, ?array $options = null)
    {
        return new Vehicle($options['name'], $this->buildTraitsByType($options['name']));
    }

    public function buildTraitsByType(string $name)
    {
        $traits = new TraitsRepository(new TraitsManager());

        $buildSelector = new TraitsBuilderSelector();
        $builder = $buildSelector($name, $traits);

        $director = new TraitsDirector($builder);

        $director->buildTraits();
        
        return $director->getTraits();
    }
}
