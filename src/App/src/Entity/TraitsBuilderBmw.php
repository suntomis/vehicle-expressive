<?php

namespace App\Entity;

use App\Entity\TraitsRepository;

use App\Entity\InterfaceVehicleTrait;

class TraitsBuilderBmw extends AbstractTraitsBuilder
{
    private $traits;

    public function __construct(TraitsRepository $traits)
    {
        $this->traits = $traits;
    }

    public function getTraits(): TraitsRepository
    {
        return $this->traits;
    }

    public function compose()
    {
        $traits = $this->getTraits();

        $traits->add(InterfaceVehicleTrait::CAN_DRIVE);
        $traits->add(InterfaceVehicleTrait::CAN_PLAY_RADIO);
    }
}
