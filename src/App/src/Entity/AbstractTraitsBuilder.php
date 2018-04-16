<?php

namespace App\Entity;

abstract class AbstractTraitsBuilder
{
    abstract public function getTraits(): TraitsRepository;
}