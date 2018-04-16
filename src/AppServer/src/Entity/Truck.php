<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Isedc\AppServer\Entity\Vehicle;

// use ApiPlatform\Core\Annotation\ApiResource;
// use Symfony\Component\Validator\Constraints as Assert;
// use AppBundle\Traits\vehicle\{TruckTrait};

/**
 * Car entity
 *
 * @ApiResource
 * @ORM\Entity
 */
class Truck extends Vehicle
{
}
