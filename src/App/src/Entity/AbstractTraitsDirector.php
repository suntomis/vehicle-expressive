<?php

namespace App\Entity;

abstract class AbstractTraitsDirector
{
    abstract function __construct(AbstractTraitsBuilder $builder);
    abstract function buildTraits();
    abstract function getTraits();
}