<?php

namespace App\Traits;

use App\Entity\InterfaceVehicleTrait;

class CanSwim implements InterfaceVehicleTrait
{

    public function __invoke($name, ...$argv)
    {
        echo __CLASS__ . ' | ' . $name;
    }


}