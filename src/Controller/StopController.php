<?php
/**
 * This file remains to the GTFS-REST-API - Copyright (c) 2020.
 *
 * @author Sebastian Knopf
 * @license http://opensource.org/licenses/MIT MIT
 */

namespace App\Controller;

use App\Data\Stop\Stop;
use Slim\Http\ServerRequest;

/**
 * Stop controller class for every request according to the stops resource.
 *
 * @package App\Controller
 */
class StopController extends BaseController
{

    /**
     * Default selector method - Returns all stop objects in the database.
     *
     * @param ServerRequest $request The server request instance
     * @return mixed Array with all stops
     */
    protected function findAll(ServerRequest $request) {
        $result = $this->orm->select(Stop::class)->fetchRecords();
        return $result;
    }

}