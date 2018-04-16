<?php

namespace Isedc\AppServer\Container\Model\Vehicle;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\DelegatorFactoryInterface;

use Isedc\AppServer\Model\Vehicle\VehicleLogDelegator;
use Zend\Log\Logger;

class VehicleLogDelegatorFactory implements DelegatorFactoryInterface
{
    public function __invoke(ContainerInterface $container, $name, callable $callback, array $options = null)
    {
        //$wrappedVehicle   = call_user_func($callback);
        $wrappedService   = $callback();
        //$wrappedVehicle   = $callback(...$options);
        $logger = $container->get(Logger::class);

        // $eventManager->attach('buzz', function () {
        //     echo "Stare at the art!\n";
        // });

        return new VehicleLogDelegator($wrappedService, $logger);
    }
}
