<?php

namespace App\Entity;

// use App\Entity\AbstractTraitsDirector;
// use App\Entity\AbstractTraitsBuilder;

class TraitsBuilderSelector 
{
    const BMW = 'BMW';
    const BOAT = 'BOAT';

    const TYPES = [
        self::BMW => self::BMW,
        self::BOAT => self::BOAT
    ];

    private $builder;

    public function __invoke($type, $traits)
    {
        //validation
        if (!isset(self::TYPES[$type])) {
            throw new \Exception('Wrong vehicle type: ' . $type);
        }

        switch ($type) {
            case self::BMW:
                $this->builder = new TraitsBuilderBmw($traits);
                # code...
                break;

            default:
                # code...
                break;
        }

        //validation
        if (empty($this->builder)) {
            throw new \Exception('builder not selected.');
        }

        return $this->builder;
    }

}
