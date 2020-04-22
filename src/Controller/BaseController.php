<?php
/**
 * This file remains to the GTFS-REST-API - Copyright (c) 2020.
 *
 * @author Sebastian Knopf
 * @license http://opensource.org/licenses/MIT MIT
 */

namespace App\Controller;

use DI\Container;
use Slim\Http\Response;
use Slim\Http\ServerRequest;

/**
 * Base class for all REST API controllers.
 *
 * @package App\Controller
 */
abstract class BaseController {

    /**
     * @var string The default selector method.
     */
    private static $DEFAULT_SELECTOR = 'all';

    /**
     * @var object The database orm reference.
     */
    protected $orm;

    /**
     * @var integer The default limit for database queries
     */
    protected $requestLimit;

    /**
     * @var integer The default offset for database queries
     */
    protected $requestOffset;

    /**
     * Constructor method.
     *
     * @param Container $container The applications dependency container
     * @throws \DI\DependencyException
     * @throws \DI\NotFoundException
     */
    public function __construct(Container $container) {
        $this->orm = $container->get('orm');
    }

    /**
     * Invoke method - Always called by the framework when a route is requested by the client.
     *
     * @param ServerRequest $request The server request instance
     * @param Response $response The response instance
     * @param array $args The route arguments passed
     * @return \Psr\Http\Message\ResponseInterface|Response The final response object
     */
    public function __invoke(ServerRequest $request, Response $response, $args) {
        $selector = isset($args['selector']) ? $args['selector'] : self::$DEFAULT_SELECTOR;
        $selectorMethod = 'find' . $selector;
        $postMethod = 'post' . $selector;

        if (method_exists($this, $selectorMethod) && $request->isGet()) {
            $this->requestLimit = $request->getParam('limit', 100);
            $this->requestOffset = $request->getParam('offset', 0);

            $result = $this->jsonResponse($this->$selectorMethod($request));
            $response = $response->withJson($result);
        } elseif (method_exists($this, $postMethod) && $request->isPost()) {
            $this->$postMethod($request);
        } else {
            throw new \RuntimeException('controller method ' . $selector . ' does not exist!');
        }

        return $response;
    }

    /**
     * Adds a result type to the result of any selector method.
     *
     * @param $result The result from the selector method
     * @return array The result object for response
     */
    protected function jsonResponse($result) {
        $resultType = $this->getResultType();

        return [
            'result' => [
                $resultType => $result
            ]
        ];
    }

    /**
     * Determines the result type from the called controller.
     *
     * @return string The result type
     */
    private function getResultType() {
        $className = explode('\\', get_called_class());
        $typeName = end($className);
        $typeName = str_replace('Controller', '', $typeName);
        $typeName = strtolower($typeName);

        if (substr($typeName, strlen($typeName) - 2, 1) != 's') {
            $typeName .= 's';
        }

        return $typeName;
    }

    /**
     * Default selector method - Must be overridden by all subclasses of BaseController.
     *
     * @param ServerRequest $request The server request instance
     * @return mixed Selector result data
     */
    protected abstract function findAll(ServerRequest $request);

}