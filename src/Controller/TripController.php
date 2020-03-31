<?php
/**
 * This file remains to the GTFS-REST-API - Copyright (c) 2020.
 *
 * @author Sebastian Knopf
 * @license http://opensource.org/licenses/MIT MIT
 */

namespace App\Controller;

use App\Data\Trip\Trip;
use Slim\Http\ServerRequest;

/**
 * Trip controller class for every request according to the trips resource.
 *
 * @package App\Controller
 */
class TripController extends BaseController
{

    /**
     * Default selector method - Returns all trip objects in the database.
     *
     * @param ServerRequest $request The server request instance
     * @return mixed Array with all trips
     */
    protected function findAll(ServerRequest $request) {
        $result = $this->orm->select(Trip::class)->fetchRecords();
        return $result;
    }

}