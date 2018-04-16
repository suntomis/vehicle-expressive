<?php
declare(strict_types = 1);
namespace Isedc\Api\Application\Exception;

class InvalidRequest extends \RuntimeException implements ApiException
{
    use ApiExceptionTrait;

    public static function create(string $title, string $description, array $additionalData = []): ApiException
    {
        $e = new self($description, 400);
        $e->statusCode = 400;
        $e->title = $title;
        $e->description = $description;
        $e->additionalData = $additionalData;
        
        return $e;
    }

    public function getType(): string
    {
        return 'https://example.com/api/problems/invalid-request';
    }
}
