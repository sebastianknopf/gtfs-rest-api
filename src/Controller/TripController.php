<?php

namespace App\Controller;

use App\Data\Trip\Trip;
use DI\Container;
use Slim\Http\ServerRequest;

class TripController extends BaseController
{

    protected $orm;

    public function __construct(Container $container) {
        $this->orm = $container->get('orm');
    }

    protected function all(ServerRequest $request) {
        $result = $this->orm->select(Trip::class)->fetchRecords();
        return $result;
    }

    protected function jsonResponse($resultData) {
        return [
            'trips' => $resultData
        ];
    }

}