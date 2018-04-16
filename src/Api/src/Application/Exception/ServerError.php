<?php
declare(strict_types = 1);
namespace Isedc\Api\Application\Exception;

class ServerError extends \RuntimeException implements ApiException
{
    use ApiExceptionTrait;

    public static function create(string $title, string $description, array $additionalData = [])
    
    {
        $e = new self($description, 500);
        $e->statusCode = 500;
        $e->title = $title;
        $e->description = $description;
        $e->additionalData = $additionalData;
        
        return $e;
    }

    public function getType(): string
    {
        return 'https://example.com/api/problems/server-error';
    }
}
