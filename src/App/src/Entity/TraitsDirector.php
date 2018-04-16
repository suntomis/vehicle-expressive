<?php

namespace App\Entity;

use App\Entity\AbstractTraitsDirector;
use App\Entity\AbstractTraitsBuilder;

class TraitsDirector extends AbstractTraitsDirector
{
    private $builder;

    public function __construct(AbstractTraitsBuilder $builder)
    {
        $this->builder = $builder;
    }

    public function buildTraits()
    {
        $this->builder->compose();
    }

    public function getTraits()
    {
        return $this->builder->getTraits();
    }
}
