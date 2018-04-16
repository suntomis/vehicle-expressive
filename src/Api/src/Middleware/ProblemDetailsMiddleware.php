<?php
namespace Isedc\Api\Middleware;

use Interop\Http\ServerMiddleware\DelegateInterface;
use Interop\Http\ServerMiddleware\MiddlewareInterface;
use Psr\Http\Message\ServerRequestInterface;
use Throwable;
use Zend\Diactoros\Response\JsonResponse;
use Isedc\Api\Application\Exception\ApiException;

class ProblemDetailsMiddleware implements MiddlewareInterface
{

    public function process(ServerRequestInterface $request, DelegateInterface $delegate)
    {
        try {
            $response = $delegate->process($request);
            return $response;
        } catch (ApiException $e) {
            // caught; we'll handle it following the try/catch block
        } catch (Throwable $e) {
            throw $e;
        }
        $problem = [
            'type' => $e->getType(),
            'title' => $e->getTitle(),
            'detail' => $e->getDescription()
        ];
        $problem = array_merge($e->getAdditionalData(), $problem);
        return new JsonResponse($problem, $e->getStatusCode(), [
            'Content-Type' => 'application/problem+json'
        ]);
    }
}
