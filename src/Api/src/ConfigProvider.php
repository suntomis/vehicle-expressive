<?php
namespace Isedc\Api;

/**
 * The configuration provider for the Api module
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
            'templates' => $this->getTemplates(),
            'routes' => $this->getRoutes()
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
            'invokables' => [],
            'factories' => []
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
            'paths' => [ // 'app' => [__DIR__ . '/../templates/app'],
                             // 'error' => [__DIR__ . '/../templates/error'],
                             // 'layout' => [__DIR__ . '/../templates/layout'],
            ]
        ];
    }

    public function getRoutes(): array
    {
        return [
            [
                'name' => 'api.vehicles',
                'path' => '/api/vehicles',
                'middleware' => [
                    //\Isedc\Api\Middleware\ProblemDetailsMiddleware::class,
                    \Isedc\Api\Action\Vehicle\ListAction::class
                ],
                'allowed_methods' => [
                    'GET'
                ]
            ]
            // [
            // 'path' => '/api/books',
            // 'middleware' => Action\CreateBook::class,
            // 'allowed_methods' => [
            // 'POST'
            // ]
            // ],
            // [
            // 'name' => 'book',
            // 'path' => '/api/books/{id:\d+}',
            // 'middleware' => Action\DisplayBook::class,
            // 'allowed_methods' => [
            // 'GET'
            // ]
            // ],
            // [
            // 'path' => '/api/books/{id:\d+}',
            // 'middleware' => Action\UpdateBook::class,
            // 'allowed_methods' => [
            // 'PATCH'
            // ]
            // ],
            // [
            // 'path' => '/api/books/{id:\d+}',
            // 'middleware' => Action\DeleteBook::class,
            // 'allowed_methods' => [
            // 'DELETE'
            // ]
            // ]
        ];
    }
}
