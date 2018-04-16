<?php
namespace Isedc\Api\Application\Exception;

/**
 * Interface ApiException
 *
 * @package Isedc\API\Exception
 * @author Alexander S. <contact@prh.de>
 */
interface ApiException
{

    public static function create(string $title, string $description, array $additionalData = []): ApiException;

    public function getStatusCode(): int;

    public function getType(): string;

    public function getTitle(): string;

    public function getDescription(): string;

    public function getAdditionalData(): array;
}
 