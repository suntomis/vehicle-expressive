<?php

namespace Isedc\AppServer\Model\Vehicle;

use Zend\Log\Logger;

use Isedc\AppServer\Model\Vehicle\Vehicle;

use Isedc\AppServer\Repository\TraitsRepository;


class VehicleLogDelegator extends Vehicle
{
    private $vehicle;
    private $logger;

    public function __construct(Vehicle $vehicle, Logger $logger)
    {
        $this->vehicle = $vehicle;
        $this->logger = $logger;
    }

    public function getName()
    {
        return $this->getVehicle()->getName();
    }

    protected function log(...$argv)
    {
        $this->getLogger()->info(...$argv);
    }

    protected function getTraitsRepository(): ?TraitsRepository
    {
        return $this->getVehicle()->getTraitsRepository();
    }

    private function getLogger()
    {
        return $this->logger;
    }

    private function getVehicle()
    {
        return $this->vehicle;
    }

}
