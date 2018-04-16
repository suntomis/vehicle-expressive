<?php

namespace App\Action;

use Interop\Http\ServerMiddleware\DelegateInterface;
use Interop\Http\ServerMiddleware\MiddlewareInterface as ServerMiddlewareInterface;
use Zend\Diactoros\Response\TextResponse;
use Psr\Http\Message\ServerRequestInterface;

use Zend\Expressive\Router;
use Zend\Expressive\Template;

use Interop\Container\ContainerInterface;

use App\Entity\Vehicle;

class PingAction implements ServerMiddlewareInterface
{
    private $router;

    private $template;

    private $container;

    public function __construct(ContainerInterface $container, Router\RouterInterface $router, Template\TemplateRendererInterface $template = null)
    {
        $this->router   = $router;
        $this->template = $template;

        $this->container = $container;
    }

    public function process(ServerRequestInterface $request, DelegateInterface $delegate)
    {
        $vehicle = $this->container->build(Vehicle::class, ['name' => 'BMW']);

        echo $vehicle->canDrive(); exit;

        //echo $vehicle->getName(); exit;


        




        return new TextResponse($name);

        //return new JsonResponse(['ack' => time()]);
    }
}
