<?php
/**
 * This file remains to the GTFS-REST-API - Copyright (c) 2020.
 *
 * @author Sebastian Knopf
 * @license http://opensource.org/licenses/MIT MIT
 */

namespace App\Controller;

use App\Google\Transit\Calendar\Calendar;
use App\Google\Transit\CalendarDate\CalendarDate;
use App\Google\Transit\RealtimeTripUpdate\RealtimeTripUpdate;
use App\Google\Transit\Stop\Stop;
use App\Google\Transit\StopTime\StopTimeTable;
use App\Google\Transit\Trip\Trip;
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
            ->join('LEFT', StopTimeTable::NAME, 'trips.trip_id = stop_times.trip_id')
            ->where('stop_times.stop_sequence =', '1')
            ->groupBy('trips.trip_id')
            ->orderBy('stop_times.departure_time')
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
                'stop_times' => function ($select) {
                    $select->with(['stop'])->orderBy('stop_sequence');
                },
                'calendar' => [
                    'calendar_dates'
                ],
                'frequencies',
                'shape_points' => function ($select) {
                    $select->orderBy('shape_pt_sequence');
                }
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
                'stop_times' =>  function ($select) {
                    $select->with(['stop'])->orderBy('stop_sequence');
                }
            ])
            ->join('LEFT', StopTimeTable::NAME, 'trips.trip_id = stop_times.trip_id')
            ->where('stop_times.stop_sequence =', '1')
            ->andWhere('route_id = ', $requestRouteId)
            ->groupBy('trips.trip_id')
            ->orderBy('stop_times.departure_time')
            ->limit($this->requestLimit)
            ->offset($this->requestOffset);

        if ($requestDate != null) {
            $query->whereEquals([
                'service_id' => $this->getServiceIds($requestDate)
            ]);
        }

        if ($requestTime != null) {
            $query->where('stop_times.departure_time >=', $requestTime);
        }

        return $query->fetchRecords();
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
                'stop_times' =>  function ($select) {
                    $select->with(['stop'])->orderBy('stop_sequence');
                }
            ])
            ->join('LEFT', StopTimeTable::NAME, 'trips.trip_id = stop_times.trip_id')
            ->where('stop_times.stop_sequence =', '1')
            ->andWhere('block_id = ', $requestBlockId)
            ->groupBy('trips.trip_id')
            ->orderBy('stop_times.departure_time')
            ->limit($this->requestLimit)
            ->offset($this->requestOffset);

        if ($requestDate != null) {
            $query->whereEquals([
                'service_id' => $this->getServiceIds($requestDate)
            ]);
        }

        if ($requestTime != null) {
            $query->where('stop_times.departure_time >=', $requestTime);
        }

        return $query->fetchRecords();
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

        $subordinateStopIds = $this->getChildStopIds($requestStopId);

        $query = $this->orm->select(Trip::class);
        $query->with([
           'route' => [
               'agency'
           ],
           'stop_times' => function ($select) {
                $select->with(['stop'])->orderBy('stop_sequence');
            }
        ])
        ->join('LEFT', StopTimeTable::NAME, 'trips.trip_id = stop_times.trip_id')
        ->where('stop_times.stop_id IN', $subordinateStopIds)
        ->groupBy('trips.trip_id')
        ->orderBy('stop_times.departure_time')
        ->limit($this->requestLimit)
        ->offset($this->requestOffset);

        if ($requestDate != null) {
            $query->whereEquals([
                'service_id' => $this->getServiceIds($requestDate)
            ]);
        }

        if ($requestTime != null) {
            $query->where('stop_times.departure_time >=', $requestTime);
        }

        return $query->fetchRecords();
    }

    /**
     * Selects a single trip by its serving vehicle ID. This selector is only available
     * when GTFS-realtime data are updated!
     *
     * @param ServerRequest $request The server request instance
     * @return mixed Array with matching trip object(s)
     */
    protected function findByVehicleId(ServerRequest $request) {
        $requestVehicleId = $request->getParam('vehicleId', null);

        if ($requestVehicleId == null) {
            throw new \RuntimeException('missing parameter vehicleId!');
        }

        // request trip id by vehicle from realtime data
        $realtimeRecord = $this->orm
            ->select(RealtimeTripUpdate::class)
            ->where('vehicle_id =', $requestVehicleId)
            ->fetchRecord();

        if ($realtimeRecord == null) {
            return [];
        }

        $tripId = $realtimeRecord->trip_id;

        $query = $this->orm
            ->select(Trip::class)
            ->with([
                'route' => [
                    'agency'
                ],
                'stop_times' => function ($select) {
                    $select->with(['stop'])->orderBy('stop_sequence');
                },
                'calendar' => [
                    'calendar_dates'
                ],
                'frequencies',
                'shape_points' => function ($select) {
                    $select->orderBy('shape_pt_sequence');
                }
            ])
            ->where('trip_id = ', $tripId);

        return [$query->fetchRecord()];
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

    /**
     * Returns all child stop IDs for a desired stop ID.
     *
     * @param $stopId The reference stop ID
     * @return array  All subordinate stop IDs
     */
    private function getChildStopIds($stopId) {
        $query = $this->orm
            ->select(Stop::class)
            ->columns('stop_id')
            ->where('parent_station = ', $stopId)
            ->orWhere('stop_id = ', $stopId);

        $resultStopIds = [];
        foreach ($query->fetchRecordSet() as $stopRecord) {
            $resultStopIds[] = $stopRecord->stop_id;
        }

        return $resultStopIds;
    }

}