<?php
/**
 * This file remains to the GTFS-REST-API - Copyright (c) 2020.
 *
 * @author Sebastian Knopf
 * @license http://opensource.org/licenses/MIT MIT
 */

namespace App\Common;

use DI\Container;
use Slim\Http\Response;
use Slim\Http\ServerRequest;

class ControllerDispatcher
{

    private $container;

    public function __construct(Container $container) {
        $this->container = $container;
    }

    public function __invoke(ServerRequest $request, Response $response, $args) {
        $requestResource = isset($args['resource']) ? $args['resource'] : null;

        if ($requestResource != null) {
            $resourceController = $this->getResourceControllerName($requestResource);

            if (class_exists($resourceController)) {
                $controller = new $resourceController($this->container);
                $response = $controller($request, $response, $args);

                return $response;
            } else {
                throw new \RuntimeException('controller ' . $resourceController . ' not found!');
            }
        }
    }

    private function getResourceControllerName($resource) {
        $resource = ucfirst($resource);
        $resource = 'App\\Controller\\' . $resource;

        if (substr($resource, -1) == 's') {
            $resource = substr($resource, 0, strlen($resource) - 1);
        }

        return $resource . 'Controller';
    }

}