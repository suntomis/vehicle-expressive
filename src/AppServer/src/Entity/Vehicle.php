<?php
namespace Isedc\AppServer\Entity;

use Doctrine\ORM\Mapping as ORM;
// use ApiPlatform\Core\Annotation\ApiResource;
// use Symfony\Component\Validator\Constraints as Assert;
// use AppBundle\Contracts\vehicle\Vehicle as VehicleInterface;
// use AppBundle\Traits\vehicle\VehicleTrait;
// use AppBundle\Domain\vehicle\VehicleComposer;

/**
 * Vehicle entity
 *
 * @ApiResource
 * @ORM\Entity
 *
 * @ORM\InheritanceType("SINGLE_TABLE")
 * @ORM\DiscriminatorColumn(name="discr", type="string")
 * @ORM\DiscriminatorMap({"vehicle" = "Vehicle", "truck" = "Truck"})
 */
class Vehicle
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $name;

    /**
     * Constructor
     *
     * @param string $name
     *
     */
//     public function __construct(string $name = null)
//     {
//         $this->name = $name;
//     }

    /**
     * Factory
     *
     * @param mixed $params
     * @return $this
     */
    // public static function getVehicle(...$params)
    // {
    // return new static(...$params);
    // }
    
    /**
     * Sets name.
     *
     * @param string $name
     *
     * @return $this
     */
    public function setName(string $name)
    {
        $this->name = $name;
        
        return $this;
    }

    /**
     * Gets name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

/**
 *
 * @return mixed result of method call
 */
    // public function __call($method, $arguments)
    // {
    // if (empty($this->_prototype)) {
    // $this->_prototype = VehicleComposer::getPrototype($this->name);
    // }
    // return $this->_prototype->$method(...$arguments);
    
    // // $closure = VehicleComposer::compose($this, $method);
    // // return $closure(...$arguments);
    // }
}
