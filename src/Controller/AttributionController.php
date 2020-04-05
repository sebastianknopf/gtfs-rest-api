<?php
/**
 * This file remains to the GTFS-REST-API - Copyright (c) 2020.
 *
 * @author Sebastian Knopf
 * @license http://opensource.org/licenses/MIT MIT
 */

namespace App\Controller;

use App\Google\Transit\Attribution\Attribution;
use Slim\Http\ServerRequest;

/**
 * Attribution controller for all request regarding to the attributions resource.
 *
 * @package App\Controller
 */
class AttributionController extends BaseController
{

    /**
     * Default selector method - Returns all fare objects in the database.
     *
     * @param ServerRequest $request The server request instance
     * @return mixed Array with all fares
     */
    protected function findAll(ServerRequest $request) {
        $query = $this->orm
            ->select(Attribution::class)
            ->limit($this->requestLimit)
            ->offset($this->requestOffset);

        return $query->fetchRecords();
    }

    /**
     * Selects attributions by their agency ID.
     *
     * @param ServerRequest $request The server request instance
     * @return mixed Array with matching attribution object(s)
     */
    protected function findByAgencyId(ServerRequest $request) {
        $requestAgencyId = $request->getParam('agencyId', null);

        if ($requestAgencyId == null) {
            throw new \RuntimeException('missing parameter agencyId!');
        }

        $query = $this->orm
            ->select(Attribution::class)
            ->where('agency_id = ', $requestAgencyId)
            ->limit($this->requestLimit)
            ->offset($this->requestOffset);

        return $query->fetchRecords();
    }

    /**
     * Selects attributions by their route ID.
     *
     * @param ServerRequest $request The server request instance
     * @return mixed Array with matching attribution object(s)
     */
    protected function findByRouteId(ServerRequest $request) {
        $requestRouteId = $request->getParam('routeId', null);

        if ($requestRouteId == null) {
            throw new \RuntimeException('missing parameter routeId!');
        }

        $query = $this->orm
            ->select(Attribution::class)
            ->where('route_id = ', $requestRouteId)
            ->limit($this->requestLimit)
            ->offset($this->requestOffset);

        return $query->fetchRecords();
    }

    /**
     * Selects attributions by their trip ID.
     *
     * @param ServerRequest $request The server request instance
     * @return mixed Array with matching attribution object(s)
     */
    protected function findByTripId(ServerRequest $request) {
        $requestTripId = $request->getParam('tripId', null);

        if ($requestTripId == null) {
            throw new \RuntimeException('missing parameter tripId!');
        }

        $query = $this->orm
            ->select(Attribution::class)
            ->where('trip_id = ', $requestTripId)
            ->limit($this->requestLimit)
            ->offset($this->requestOffset);

        return $query->fetchRecords();
    }
}