<?php

namespace Isedc\Api\Action\Vehicle;

use Interop\Http\ServerMiddleware\DelegateInterface;
use Interop\Http\ServerMiddleware\MiddlewareInterface;
use Psr\Http\Message\ServerRequestInterface;

use Zend\Diactoros\Response\TextResponse;


// use Zend\Expressive\Router;
// use Zend\Expressive\Template;

// use Interop\Container\ContainerInterface;

// use Isedc\AppServer\Model\Vehicle\Vehicle;


class ListAction implements MiddlewareInterface
{
    public function process(ServerRequestInterface $request, DelegateInterface $delegate)
    {
        //throw \Isedc\Api\Application\Exception\InvalidRequest::create('Test exp', 'some description');
        
        return new TextResponse('hello');
    }
}
