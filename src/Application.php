<?php
/**
 * This file remains to the GTFS-REST-API - Copyright (c) 2020.
 *
 * @author Sebastian Knopf
 * @license http://opensource.org/licenses/MIT MIT
 */

use Atlas\Orm\Atlas;
use DI\Container;
use Slim\Factory\AppFactory;
use Slim\Routing\RouteCollectorProxy;

require __DIR__ . '/../vendor/autoload.php';

// build dependency container
$container = new Container();
$container->set('orm', function () use ($container) {
    $databaseName = dirname(__FILE__) . '/../data/' . APP_DATABASE . '.db3';
    if (!file_exists($databaseName)) {
        exit('could not find database!');
    }

    $orm = Atlas::new('sqlite:' . $databaseName);
    return $orm;
});

AppFactory::setContainer($container);

// create application instance
$app = AppFactory::create();

$app->setBasePath(APP_BASE);

// add required middlewares
$app->addRoutingMiddleware();
$app->addErrorMiddleware(
    APP_DEBUG ? true : false,
    APP_DEBUG ? true : false,
    APP_DEBUG ? true : false
);

// add endpoint routes
$app->group('/api/v1', function (RouteCollectorProxy $group) {
    // stops
    $group->group('/stops', function (RouteCollectorProxy $stopsGroup) {
       $stopsGroup->get('/[{selector}]', \App\Controller\StopController::class);
    });

    // routes
    $group->group('/routes', function (RouteCollectorProxy $stopsGroup) {
       $stopsGroup->get('/[{selector}]', \App\Controller\RouteController::class);
    });

    // trips
    $group->group('/trips', function (RouteCollectorProxy $stopsGroup) {
       $stopsGroup->get('/[{selector}]', \App\Controller\TripController::class);
    });
});

// run application
$app->run();

