<?php

namespace Isedc\AppServer;

//use Zend\ServiceManager\Factory\InvokableFactory;

/**
 * The configuration provider for the VehicleBackend module
 *
 * @see https://docs.zendframework.com/zend-component-installer/
 */
class ConfigProvider
{
    /**
     * Returns the configuration array
     *
     * To add a bit of a structure, each section is defined in a separate
     * method which returns an array with its configuration.
     *
     * @return array
     */
    public function __invoke()
    {
        return [
            'dependencies' => $this->getDependencies(),
            'templates'    => $this->getTemplates(),
        ];
    }

    /**
     * Returns the container dependencies
     *
     * @return array
     */
    public function getDependencies()
    {
        return [
            'invokables' => [
            ],
            'factories'  => [
                Action\PingAction::class => Container\Action\PingFactory::class,
                Model\Vehicle\Vehicle::class => Container\Model\Vehicle\VehicleFactory::class, //InvokableFactory::class
            ],
            'delegators' => [
                Model\Vehicle\Vehicle::class => [
                    \Isedc\AppServer\Container\Model\Vehicle\VehicleLogDelegatorFactory::class,
                    \Isedc\AppServer\Container\Model\Vehicle\VehicleEventDelegatorFactory::class,
                ],
            ],
        ];
    }

    /**
     * Returns the templates configuration
     *
     * @return array
     */
    public function getTemplates()
    {
        return [
            'paths' => [
                //'app'    => [__DIR__ . '/../templates/app'],
                //'error'  => [__DIR__ . '/../templates/error'],
                //'layout' => [__DIR__ . '/../templates/layout'],
            ],
        ];
    }
}
