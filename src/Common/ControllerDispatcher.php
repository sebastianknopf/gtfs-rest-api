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

/**
 * Controller dispatcher class - Dispatches a resource (found in the route) to its corresponding controller.
 *
 * @package App\Common
 */
class ControllerDispatcher
{

    /**
     * @var Container The applications dependency container
     */
    private $container;

    /**
     * Constructor method.
     *
     * @param Container $container
     */
    public function __construct(Container $container) {
        $this->container = $container;
    }

    /**
     * Invoke method - Called by the applications router.
     *
     * @param ServerRequest $request The server request instance
     * @param Response $response The response instance
     * @param $args The route arguments
     * @return Response The final response
     */
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

    /**
     * Returns the controller name to a specific resource name.
     *
     * @param string $resource The resource name
     * @return string Valid controller class name
     */
    private function getResourceControllerName($resource) {
        $resource = ucfirst($resource);
        $resource = 'App\\Controller\\' . $resource;

        if (substr($resource, -1) == 's') {
            $resource = substr($resource, 0, strlen($resource) - 1);
        }

        return $resource . 'Controller';
    }

}