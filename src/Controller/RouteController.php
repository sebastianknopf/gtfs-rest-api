<?php
/**
 * This file remains to the GTFS-REST-API - Copyright (c) 2020.
 *
 * @author Sebastian Knopf
 * @license http://opensource.org/licenses/MIT MIT
 */

namespace App\Controller;

use App\Google\Transit\Route\Route;
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
        $query = $this->orm
            ->select(Route::class)
            ->with([
                'agency'
            ])
            ->limit($this->requestLimit)
            ->offset($this->requestOffset);

        return $query->fetchRecords();
    }

    /**
     * Selects a single route by its routeId.
     *
     * @param ServerRequest $request The server request instance
     * @return mixed Array with matching route object(s)
     */
    protected function findByRouteId(ServerRequest $request) {
        $requestRouteId = $request->getParam('routeId', null);

        if ($requestRouteId == null) {
            throw new \RuntimeException('missing parameter routeId!');
        }

        $query = $this->orm
            ->select(Route::class)
            ->with([
                'agency'
            ])
            ->where('route_id = ', $requestRouteId);

        return [$query->fetchRecord()];
    }

    /**
     * Selects routes by their routeShortName or routeLongName.
     *
     * @param ServerRequest $request The server request instance
     * @return mixed Array with matching route object(s)
     */
    protected function findByRouteName(ServerRequest $request) {
        $requestRouteName = $request->getParam('routeName', null);

        if ($requestRouteName == null) {
            throw new \RuntimeException('missing parameter routeName!');
        }

        $query = $this->orm
            ->select(Route::class)
            ->with([
                'agency'
            ])
            ->limit($this->requestLimit)
            ->offset($this->requestOffset);

        // need cascading try/catch blocks here, because route_short_name and route_long_name are conditionally required.
        // thus one of these fields might be missing and fire an exception during the query.
        try {
            $query->where('route_short_name LIKE ', '%' . $requestRouteName . '%')
                ->orWhere('route_long_name LIKE ', '%' . $requestRouteName . '%');
        } catch(\Exception $eb) {
            try {
                $query->where('route_short_name LIKE ', '%' . $requestRouteName . '%');
            } catch(\Exception $es) {
                $query->where('route_long_name LIKE ', '%' . $requestRouteName . '%');
            }
        }

        return $query->fetchRecords();
    }

}