<?php
use Zend\Expressive\Application;
use Zend\Expressive\Container;
use Zend\Expressive\Delegate;
use Zend\Expressive\Helper;
use Zend\Expressive\Middleware;

use Zend\Log\Logger;

return [
    // Provides application-wide services.
    // We recommend using fully-qualified class names whenever possible as
    // service names.
    'dependencies' => [
        // Use 'aliases' to alias a service name to another service. The
        // key is the alias name, the value is the service to which it points.
        'aliases' => [
            'Zend\Expressive\Delegate\DefaultDelegate' => Delegate\NotFoundDelegate::class,
            'configuration' => 'config'
        ],
        // Use 'invokables' for constructor-less services, or services that do
        // not require arguments to the constructor. Map a service name to the
        // class name.
        'invokables' => [
            // Fully\Qualified\InterfaceName::class => Fully\Qualified\ClassName::class,
            Helper\ServerUrlHelper::class => Helper\ServerUrlHelper::class
        ],
        // Use 'factories' for services provided by callbacks/factory classes.
        'factories' => [
            Application::class => Container\ApplicationFactory::class,
            Delegate\NotFoundDelegate::class => Container\NotFoundDelegateFactory::class,
            Helper\ServerUrlMiddleware::class => Helper\ServerUrlMiddlewareFactory::class,
            Helper\UrlHelper::class => Helper\UrlHelperFactory::class,
            Helper\UrlHelperMiddleware::class => Helper\UrlHelperMiddlewareFactory::class,
            
            Zend\Stratigility\Middleware\ErrorHandler::class => Container\ErrorHandlerFactory::class,
            Middleware\ErrorResponseGenerator::class => Container\ErrorResponseGeneratorFactory::class,
            Middleware\NotFoundHandler::class => Container\NotFoundHandlerFactory::class,
            
            // Model
            // \Codeliner\CargoBackend\Model\Cargo\CargoRepositoryInterface::class => \Codeliner\CargoBackend\Infrastructure\Container\Infrastructure\DoctrineCargoRepositoryFactory::class,
            // \Codeliner\CargoBackend\Model\Routing\RoutingServiceInterface::class => \Codeliner\CargoBackend\Infrastructure\Container\Infrastructure\ExternalRoutingServiceFactory::class,
            
            // Infrastructure
            'doctrine.entitymanager.orm_default' => \Isedc\AppServer\Container\Infrastructure\DoctrineEntityManagerFactory::class,
            \Doctrine\ORM\Mapping\UnderscoreNamingStrategy::class => \Zend\ServiceManager\Factory\InvokableFactory::class
            // \Codeliner\CargoBackend\Application\TransactionManager::class => \Codeliner\CargoBackend\Infrastructure\Container\Infrastructure\TransactionManagerFactory::class,
        
        ]
    ]
];
