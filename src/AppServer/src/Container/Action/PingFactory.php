<?php

namespace Isedc\AppServer\Container\Action;

use Interop\Container\ContainerInterface;
use Zend\Expressive\Router\RouterInterface;
use Zend\Expressive\Template\TemplateRendererInterface;

use Isedc\AppServer\Action\PingAction;
//use App\Entity\Vehicle;

class PingFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $router   = $container->get(RouterInterface::class);
        $template = $container->has(TemplateRendererInterface::class)
            ? $container->get(TemplateRendererInterface::class)
            : null;

        return new PingAction($container, $router, $template);
    }
}
