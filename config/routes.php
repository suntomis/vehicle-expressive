<?php
/**
 * Setup routes with a single request method:
 *
 * $app->get('/', App\Action\HomePageAction::class, 'home');
 * $app->post('/album', App\Action\AlbumCreateAction::class, 'album.create');
 * $app->put('/album/:id', App\Action\AlbumUpdateAction::class, 'album.put');
 * $app->patch('/album/:id', App\Action\AlbumUpdateAction::class, 'album.patch');
 * $app->delete('/album/:id', App\Action\AlbumDeleteAction::class, 'album.delete');
 *
 * Or with multiple request methods:
 *
 * $app->route('/contact', App\Action\ContactAction::class, ['GET', 'POST', ...], 'contact');
 *
 * Or handling all request methods:
 *
 * $app->route('/contact', App\Action\ContactAction::class)->setName('contact');
 *
 * or:
 *
 * $app->route(
 *     '/contact',
 *     App\Action\ContactAction::class,
 *     Zend\Expressive\Router\Route::HTTP_METHOD_ANY,
 *     'contact'
 * );
 */
$app->get('/', App\Action\HomePageAction::class, 'home');
$app->get('/api/ping', App\Action\PingAction::class, 'api.ping');

$app->get('/appserver/ping', Isedc\AppServer\Action\PingAction::class, 'appserver.ping');

// Api
$app->injectRoutesFromConfig((new Isedc\Api\ConfigProvider())());

// $app->get('/api/vehicles', [
//     Isedc\Api\Middleware\ProblemDetailsMiddleware::class,
//     Isedc\Api\Action\Vehicle\ListAction::class
// ], 'api.vehicles');

// $app->post('/api/books', Acme\Api\CreateBookMiddleware::class);
// $app->get('/api/books/{book_id:\d+}', Acme\Api\BookMiddleware::class, 'api.book');
// $app->patch('/api/books/{book_id:\d+}', Acme\Api\UpdateBookMiddleware::class);
// $app->delete('/api/books/{book_id:\d+}', Acme\Api\DeleteBookMiddleware::class);








