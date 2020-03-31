<?php
/**
 * This file remains to the GTFS-REST-API - Copyright (c) 2020.
 *
 * @author Sebastian Knopf
 * @license http://opensource.org/licenses/MIT MIT
 */

namespace App\Controller;

use App\Data\Route\Route;
use Slim\Http\ServerRequest;

/**
 * Route controller class for every request according to the routes resource.
 *
 * @package App\Controller
 */
class RouteController extends BaseController
{

    /**
     * Default selector method - Returns all route objects in the database.
     *
     * @param ServerRequest $request The server request instance
     * @return mixed Array with all routes
     */
    protected function findAll(ServerRequest $request) {
        $result = $this->orm->select(Route::class)->fetchRecords();
        return $result;
    }

}