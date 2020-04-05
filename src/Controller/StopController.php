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
        $requestOffset = $request->getParam('offset', 0);

        $query = $this->orm
            ->select(Stop::class)
            ->with([
                'level'
            ])
            ->limit($this->requestLimit)
            ->offset($this->requestOffset);

        if ($requestOffset > 0) {
            $query->offset($requestOffset);
        }

        return $query->fetchRecords();
    }

    /**
     * Selects a single stop by its stopId.
     *
     * @param ServerRequest $request The server request instance
     * @return mixed Array with matching stop object(s)
     */
    protected function findByStopId(ServerRequest $request) {
        $requestStopId = $request->getParam('stopId', null);

        if ($requestStopId == null) {
            throw new \RuntimeException('missing parameter stopId!');
        }

        $query = $this->orm
            ->select(Stop::class)
            ->with([
                'level',
                'transfers',
                'pathways',
                'child_stops' => function ($select) {
                    $select->with([
                        'level',
                        'transfers',
                        'pathways'
                    ]);
                }
            ])
            ->where('stop_id = ', $requestStopId)
            ->limit($this->requestLimit)
            ->offset($this->requestOffset);

        return [$query->fetchRecord()];
    }

    /**
     * Selects stations by their lat/lon and a distance.
     *
     * @param ServerRequest $request The server request instance
     * @return mixed Array with matching stop object(s)
     */
    protected function findByLatLon(ServerRequest $request) {
        $requestStopLat = $request->getParam('stopLat', 0);
        $requestStopLon = $request->getParam('stopLon', 0);

        $requestStopDistance = $request->getParam('stopDistance', 10);

        if ($requestStopLat == 0 || !is_numeric($requestStopLat)) {
            throw new \RuntimeException('missing parameter stopLat!');
        }

        if ($requestStopLon == 0 || !is_numeric($requestStopLon)) {
            throw new \RuntimeException('missing parameter stopLon!');
        }

        $query = $this->orm
            ->select(Stop::class)
            ->with([
                'level'
            ])
            ->where('location_type = ', '1')
            ->limit($this->requestLimit)
            ->offset($this->requestOffset);

        $resultStops = [];
        foreach($query->fetchRecordSet() as $queryResult) {
            $distance = $this->distanceBetween(doubleval($requestStopLat), doubleval($requestStopLon), doubleval($queryResult->stop_lat), doubleval($queryResult->stop_lon));
            if (doubleval($requestStopDistance) > $distance) {
                $resultStops[] = $queryResult;
            }
        }

        return $resultStops;
    }

    /**
     * Selects stops by its stopName.
     *
     * @param ServerRequest $request The server request instance
     * @return mixed Array with matching stop object(s)
     */
    protected function findByStopName(ServerRequest $request) {
        $requestStopName = $request->getParam('stopName', null);

        if ($requestStopName == null) {
            throw new \RuntimeException('missing parameter stopName!');
        }

        $query = $this->orm
            ->select(Stop::class)
            ->with([
                'level',
                'transfers',
                'pathways',
                'child_stops' => function ($select) {
                    $select->with([
                        'level',
                        'transfers',
                        'pathways'
                    ]);
                }
            ])
            ->where('stop_name LIKE ', '%' . $requestStopName . '%')
            ->andWhere('location_type = ', '1')
            ->limit($this->requestLimit)
            ->offset($this->requestOffset);

        return $query->fetchRecords();
    }

    /**
     * Calculates the distance in kilometers between two geo coordinates.
     *
     * @param double $latA The first latitude
     * @param double $lonA The first longitude
     * @param double $latB The second latitude
     * @param double $lonB The second longitude
     * @return float|int The distance in kilometers
     */
    private function distanceBetween($latA, $lonA, $latB, $lonB) {
        if (($latA == $latB) && ($lonA == $lonB)) {
            return 0;
        } else {
            $theta = $lonA - $lonB;
            $dist = sin(deg2rad($latA)) * sin(deg2rad($latB)) +  cos(deg2rad($latA)) * cos(deg2rad($latB)) * cos(deg2rad($theta));
            $dist = acos($dist);
            $dist = rad2deg($dist);
            $miles = $dist * 60 * 1.1515;

            return ($miles * 1.609344);
        }
    }

}