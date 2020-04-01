<?php
/**
 * This file remains to the GTFS-REST-API - Copyright (c) 2020.
 *
 * @author Sebastian Knopf
 * @license http://opensource.org/licenses/MIT MIT
 */

namespace App\Controller;

use App\Data\Calendar\Calendar;
use App\Data\CalendarDate\CalendarDate;
use App\Data\Stop\StopTable;
use App\Data\StopTime\StopTimeTable;
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
        $query = $this->orm
            ->select(Trip::class)
            ->with([
                'route' => [
                    'agency'
                ],'stop_times' => [
                    'stop'
                ]
            ])
            ->limit($this->requestLimit)
            ->offset($this->requestOffset);

        return $query->fetchRecords();
    }

    /**
     * Selects a single trip by its tripId.
     *
     * @param ServerRequest $request The server request instance
     * @return mixed Array with matching trip object(s)
     */
    protected function findByTripId(ServerRequest $request) {
        $requestTripId = $request->getParam('tripId', null);

        if ($requestTripId == null) {
            throw new \RuntimeException('missing parameter tripId!');
        }

        $query = $this->orm
            ->select(Trip::class)
            ->with([
                'route' => [
                    'agency'
                ],
                'stop_times' => [
                    'stop'
                ],
                'calendar' => [
                    'calendar_dates'
                ],
                'frequencies',
                'shape'
            ])
            ->where('trip_id = ', $requestTripId);

        return [$query->fetchRecord()];
    }

    /**
     * Selects trips by their routeId.
     *
     * @param ServerRequest $request The server request instance
     * @return mixed Array with matching trip object(s)
     */
    protected function findByRouteId(ServerRequest $request) {
        $requestRouteId = $request->getParam('routeId', null);

        $requestDate = $request->getParam('date', null);
        $requestTime = $request->getParam('time', null);

        if ($requestRouteId == null) {
            throw new \RuntimeException('missing parameter routeId!');
        }

        $query = $this->orm
            ->select(Trip::class)
            ->with([
                'route' => [
                    'agency'
                ],
                'stop_times' => [
                    'stop'
                ]
            ])
            ->where('route_id = ', $requestRouteId)
            ->limit($this->requestLimit)
            ->offset($this->requestOffset);

        if ($requestDate != null) {
            $query->whereEquals([
                'service_id' => $this->getServiceIds($requestDate)
            ]);
        }

        if ($requestTime != null) {
            $resultTrips = [];
            foreach($query->fetchRecordSet() as $tripRecord) {
                if (strtotime($requestTime) <= strtotime($tripRecord->stop_times[0]->departure_time)) {
                    $resultTrips[] = $tripRecord;
                }
            }

            return $resultTrips;
        } else {
            return $query->fetchRecords();
        }
    }

    /**
     * Selects trips by their blockId.
     *
     * @param ServerRequest $request The server request instance
     * @return mixed Array with matching trip object(s)
     */
    protected function findByBlockId(ServerRequest $request) {
        $requestBlockId = $request->getParam('blockId', null);

        $requestDate = $request->getParam('date', null);
        $requestTime = $request->getParam('time', null);

        if ($requestBlockId == null) {
            throw new \RuntimeException('missing parameter blockId!');
        }

        $query = $this->orm
            ->select(Trip::class)
            ->with([
                'route' => [
                    'agency'
                ],
                'stop_times' => [
                    'stop'
                ]
            ])
            ->where('block_id = ', $requestBlockId)
            ->limit($this->requestLimit)
            ->offset($this->requestOffset);

        if ($requestDate != null) {
            $query->whereEquals([
                'service_id' => $this->getServiceIds($requestDate)
            ]);
        }

        if ($requestTime != null) {
            $resultTrips = [];
            foreach($query->fetchRecordSet() as $tripRecord) {
                if (strtotime($requestTime) <= strtotime($tripRecord->stop_times[0]->departure_time)) {
                    $resultTrips[] = $tripRecord;
                }
            }

            return $resultTrips;
        } else {
            return $query->fetchRecords();
        }
    }

    /**
     * Selects trips departing at a certain stopId.
     *
     * @param ServerRequest $request The server request instance
     * @return mixed Array with matching trip object(s)
     */
    protected function findByStopId(ServerRequest $request) {
        $requestStopId = $request->getParam('stopId', null);

        $requestDate = $request->getParam('date', null);
        $requestTime = $request->getParam('time', null);

        if ($requestStopId == null) {
            throw new \RuntimeException('missing parameter stopId!');
        }

        $query = $this->orm->select(Trip::class);

        $query->with([
           'route' => [
               'agency'
           ],
           'stop_times' => [
               'stop'
           ]
        ]);

        $query->where(
            'trip_id IN ',
            $query->subSelect()
                ->columns('trip_id')
                ->from(StopTimeTable::NAME)
                ->where(
                    'stop_id IN ',
                    $query->subSelect()
                        ->columns('stop_id')
                        ->from(StopTable::NAME)
                        ->where('parent_station = ', $requestStopId)
                        ->union()
                        ->columns('stop_id')
                        ->from(StopTable::NAME)
                        ->where('stop_id = ', $requestStopId)
                )

        )
        ->limit($this->requestLimit)
        ->offset($this->requestOffset);

        if ($requestDate != null) {
            $query->whereEquals([
                'service_id' => $this->getServiceIds($requestDate)
            ]);
        }

        if ($requestTime != null) {
            $resultTrips = [];
            foreach($query->fetchRecordSet() as $tripRecord) {
                if (strtotime($requestTime) <= strtotime($tripRecord->stop_times[0]->departure_time)) {
                    $resultTrips[] = $tripRecord;
                }
            }

            return $resultTrips;
        } else {
            return $query->fetchRecords();
        }
    }

    /**
     * Loads all service IDs running on a certain date.
     *
     * @param $dateString The date string in format yyyyMMdd
     * @return array An array of all matching service IDs
     */
    private function getServiceIds($dateString) {
        $query = $this->orm
            ->select(Calendar::class)
            ->columns('service_id')
            ->whereEquals([
                'start_date <= \'' . $dateString . '\'',
                'end_date >= \'' . $dateString . '\'',
                strtolower(date('l', strtotime($dateString))) => '1'
            ]);

        $baseServiceIds = [];
        foreach($query->fetchRecordSet() as $calendarRecord) {
            $baseServiceIds[] = $calendarRecord->service_id;
        }

        $query = $this->orm
            ->select(CalendarDate::class)
            ->columns('service_id', 'exception_type')
            ->where('date = ', $dateString);

        foreach($query->fetchRecordSet() as $calendarDateRecord) {
            if ($calendarDateRecord->exception_type == '2') {
                if (($key = array_search($calendarDateRecord->service_id, $baseServiceIds)) !== false) {
                    unset($baseServiceIds[$key]);
                }
            } else if ($calendarDateRecord->exception_type == '1' && !in_array($calendarDateRecord->service_id, $baseServiceIds)) {
                $baseServiceIds[] = $calendarDateRecord->service_id;
            }
        }

        return array_values($baseServiceIds);
    }

}