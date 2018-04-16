<?php

namespace Isedc\AppServer\Container\Model\Vehicle;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\DelegatorFactoryInterface;

use Zend\EventManager\EventManager;

use Isedc\AppServer\Model\Vehicle\VehicleEventDelegator;
use Isedc\AppServer\Model\Vehicle\Vehicle;

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
