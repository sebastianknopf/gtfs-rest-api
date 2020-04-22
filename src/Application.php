<?php
/**
 * This file remains to the GTFS-REST-API - Copyright (c) 2020.
 *
 * @author Sebastian Knopf
 * @license http://opensource.org/licenses/MIT MIT
 */

use App\Common\ControllerDispatcher;
use App\Common\QueryLogger;
use Atlas\Orm\Atlas;
use DI\Container;
use Slim\Factory\AppFactory;
use Slim\Routing\RouteCollectorProxy;

if (APP_DEBUG) {
    error_reporting(E_ALL);
} else {
    error_reporting(0);
}

require dirname(__FILE__) . '/../vendor/autoload.php';

// read configure file
$config = include(dirname(__FILE__) . '/../config/config.php');

// build dependency container
$container = new Container();
$container->set('orm', function () use ($container, $config) {
    $databaseName = $config['config']['orm']['database'];
    if (!file_exists($databaseName)) {
        exit('could not find database!');
    }

    $orm = Atlas::new('sqlite:' . $databaseName);

    if (APP_DEBUG) {
        $orm->setQueryLogger(new QueryLogger());
        $orm->logQueries();
    }

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
    $group->get('/{resource}/[{selector}]', ControllerDispatcher::class);
    $group->post('/{resource}/{selector}', ControllerDispatcher::class);
});

// run application
$app->run();

