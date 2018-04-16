<?php
namespace Isedc\Api\Application\Exception;

/**
 * ApiExceptionTrait
 *
 * @package Isedc\API\Exception
 * @author Alexander S. <contact@p.de>
 */
trait ApiExceptionTrait
{
    private $statusCode;

    private $title;

    private $description;

    private $additionalData = [];

    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getAdditionalData(): array
    {
        return $this->additionalData;
    }
}
 