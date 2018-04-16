<?php
/*
 * This file is part of the prooph/php-ddd-cargo-sample.
 * (c) Alexander Miertsch <contact@prooph.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * 
 * Date: 01.03.14 - 17:25
 */

namespace Codeliner\CargoBackend\Infrastructure\Persistence\Doctrine\Type;

use Codeliner\CargoBackend\Model\Cargo\Leg;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\ConversionException;
use Doctrine\DBAL\Types\TextType;

/**
 * Class LegsDoctrineType
 *
 * @package Codeliner\CargoBackend\Infrastructure\Persistence\Doctrine\Type
 * @author Alexander Miertsch <contact@prooph.de>
 */
final class LegsDoctrineType extends TextType
{
    /**
     * @return string
     */
    public function getName()
    {
        return 'cargo_itinerary_legs';
    }

    /**
     * @param string $value
     * @param AbstractPlatform $platform
     * @return Leg[]
     */
    public function convertToPhpValue($value, AbstractPlatform $platform): array
    {
        if (null === $value) {
            return [];
        }

        $legsData = json_decode($value, true);

        $legs = array();

        foreach($legsData as $legData) {
            $legs[] = new Leg(
                $legData['load_location'],
                $legData['unload_location'],
                \DateTimeImmutable::createFromFormat('Y-m-d H:i:s', $legData['load_time']),
                \DateTimeImmutable::createFromFormat('Y-m-d H:i:s', $legData['unload_time'])
            );
        }

        return $legs;
    }

    /**
     * @param Leg[]|null $value
     * @param AbstractPlatform $platform
     * @return string|null
     * @throws \Doctrine\DBAL\Types\ConversionException
     */
    public function convertToDatabaseValue($value, AbstractPlatform $platform): ?string
    {
        if (null === $value) {
            return null;
        }

        if (!is_array($value)) {
            throw ConversionException::conversionFailed($value, $this->getName());
        }

        $legsData = array();

        foreach($value as $leg) {
            if (!$leg instanceof Leg) {
                throw ConversionException::conversionFailed($value, $this->getName());
            }

            $legsData[] = array(
                'load_location'   => $leg->loadLocation(),
                'unload_location' => $leg->unloadLocation(),
                'load_time'       => $leg->loadTime()->format('Y-m-d H:i:s'),
                'unload_time'     => $leg->unloadTime()->format('Y-m-d H:i:s'),
            );
        }

        return json_encode($legsData);
    }
} 