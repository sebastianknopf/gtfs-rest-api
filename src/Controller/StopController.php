<?php

namespace App\Controller;

use App\Data\Stop\Stop;
use DI\Container;
use Slim\Http\ServerRequest;

class StopController extends BaseController
{

    protected $orm;

    public function __construct(Container $container) {
        $this->orm = $container->get('orm');
    }

    protected function all(ServerRequest $request) {
        $result = $this->orm->select(Stop::class)->fetchRecords();
        return $this->jsonResponse($result);
    }

    protected function jsonResponse($resultData) {
        return [
            'stops' => $resultData
        ];
    }

}