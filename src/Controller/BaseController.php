<?php

namespace App\Controller;

use Slim\Http\Response;
use Slim\Http\ServerRequest;

abstract class BaseController {

    private static $DEFAULT_SELECTOR = 'all';

    public function __invoke(ServerRequest $request, Response $response, $args) {
        $selector = isset($args['selector']) ? $args['selector'] : self::$DEFAULT_SELECTOR;

        if (method_exists($this, $selector)) {
            $result = $this->$selector($request);
            $response = $response->withJson($result);
        } else {
            throw new \RuntimeException('selector method ' . $selector . ' does not exist!');
        }

        return $response;
    }

    protected abstract function all(ServerRequest $request);
}