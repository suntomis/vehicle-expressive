<?php

namespace Isedc\AppServer\Container\Model\Vehicle;

use Isedc\AppServer\Model\Vehicle\Vehicle;

use Zend\ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;

use App\Entity\TraitsManager;
use App\Entity\TraitsRepository;
use App\Entity\TraitsDirector;

class VehicleFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, ?array $options = null)
    {
        //return new Vehicle($options['name'], $this->buildTraitsByType($options['name']));
        
        $a = new \Isedc\AppServer\Repository\TraitsRepository(null);
        return new Vehicle($options['name'], $a);
        
        
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
