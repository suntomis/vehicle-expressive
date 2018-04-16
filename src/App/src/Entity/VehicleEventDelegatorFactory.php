<?php

namespace App\Entity;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\DelegatorFactoryInterface;

use Zend\EventManager\EventManager;

use App\Entity\VehicleEventDelegator;
use App\Entity\Vehicle;

//use Zend\Log\Logger;

class VehicleEventDelegatorFactory implements DelegatorFactoryInterface
{
    public function __invoke(ContainerInterface $container, $name, callable $callback, array $options = null)
    {
        $wrapped   = $callback();

        $eventManager = new EventManager();
        $eventManager->setIdentifiers([
            Vehicle::class,
            // __CLASS__,
            // get_called_class(),
        ]);

        $eventManager->attach('buzz', function () {
            echo "Stare at the art!\n";
        });

        return new VehicleEventDelegator($wrapped, $eventManager);
    }
}
