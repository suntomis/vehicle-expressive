<?php

declare(strict_types = 1);
namespace Isedc\Api\Application\Exception;

//use Codeliner\CargoBackend\Model\Cargo\TrackingId;

/**
 * Class CargoNotFoundException
 *
 * @package CargoBackend\API\Exception
 * @author Alexander Miertsch <contact@prooph.de>
 */
// class CargoNotFoundException extends \RuntimeException implements ApiException
class VehicleNotFoundException extends \RuntimeException
{

    /**
     *
     * @param TrackingId $aTrackingId
     * @return VehicleNotFoundException
     */
    // public static function forTrackingId(TrackingId $aTrackingId): self
    public static function forTrackingId($aTrackingId): self
    {
        return new self(sprintf('Cargo with TrackingId -%s- can not be found.', $aTrackingId->toString()));
    }
}
