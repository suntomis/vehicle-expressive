<?php

namespace App\Entity;

interface InterfaceVehicleTrait
{
    const CAN_SWIM = 'canSwim';
    const CAN_DRIVE = 'canDrive';
    const CAN_PLAY_RADIO = 'canPlayRadio';

    const list = [
        self::CAN_SWIM => self::CAN_SWIM,
        self::CAN_DRIVE => self::CAN_DRIVE,
        self::CAN_PLAY_RADIO => self::CAN_PLAY_RADIO,
    ];
}