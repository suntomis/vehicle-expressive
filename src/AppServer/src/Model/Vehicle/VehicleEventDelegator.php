<?php

namespace Isedc\AppServer\Model\Vehicle;

use Zend\EventManager\EventManagerInterface;
use Zend\EventManager\EventManager;
use Zend\EventManager\EventManagerAwareInterface;

use Isedc\AppServer\Model\Vehicle\Vehicle;

use Isedc\AppServer\Repository\TraitsRepository;

class VehicleEventDelegator extends Vehicle
{
    private $vehicle;
    private $events;

    public function __construct(Vehicle $vehicle, EventManagerInterface $events)
    {
        $this->vehicle = $vehicle;
        $this->events = $events;
    }

    public function getName()
    {
        return $this->vehicle->getName();
    }

    public function buzz()
    {
        $this->notify('buzz', $this);

        $this->log(__CLASS__ . ' has been executed');

        return $this->getVehicle()->buzz();
    }

    protected function notify(...$argv)
    {
        return $this->getEventManager()->trigger(...$argv);
    }

    private function getEventManager()
    {
        return $this->events;
    }

    private function getVehicle()
    {
        return $this->vehicle;
    }

    protected function log(...$argv)
    {
        $this->getVehicle()->log(...$argv);
    }

    protected function getTraitsRepository(): ?TraitsRepository
    {
        return $this->getVehicle()->getTraitsRepository();
    }

    // public function setEventManager(EventManagerInterface $events)
    // {
    //     $events->setIdentifiers([
    //     __CLASS__,
    //     get_called_class(),
    //     ]);
    //     $this->events = $events;
    //     return $this;
    // }
}
