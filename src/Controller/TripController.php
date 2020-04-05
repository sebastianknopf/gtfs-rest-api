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
use App\Google\Transit\Stop\Stop;
use App\Google\Transit\StopTime\StopTimeTable;
use App\Google\Transit\Trip\Trip;
use App\Google\Transit\Trip\TripRecord;
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
                'stop_times' => function ($select) {
                    $select->with(['stop'])->orderBy('stop_sequence');
                },
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
                'stop_times' =>  function ($select) {
                    $select->with(['stop'])->orderBy('stop_sequence');
                }
            ])
            ->where('route_id = ', $requestRouteId)
            ->limit($this->requestLimit)
            ->offset($this->requestOffset);

        if ($requestDate != null) {
            $query->whereEquals([
                'service_id' => $this->getServiceIds($requestDate)
            ]);
        }

        $resultTrips = [];
        if ($requestTime != null) {
            foreach($query->fetchRecordSet() as $tripRecord) {
                if (strtotime($requestTime) <= strtotime($tripRecord->stop_times[0]->departure_time)) {
                    $resultTrips[] = $tripRecord;
                }
            }
        } else {
            $resultTrips = $query->fetchRecords();
        }

        usort($resultTrips, function ($a, $b) {
            return strtotime($a->stop_times[0]->departure_time) > strtotime($b->stop_times[0]->departure_time);
        });

        return $resultTrips;
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
            ->where('block_id = ', $requestBlockId)
            ->limit($this->requestLimit)
            ->offset($this->requestOffset);

        if ($requestDate != null) {
            $query->whereEquals([
                'service_id' => $this->getServiceIds($requestDate)
            ]);
        }

        $resultTrips = [];
        if ($requestTime != null) {
            foreach($query->fetchRecordSet() as $tripRecord) {
                if (strtotime($requestTime) <= strtotime($tripRecord->stop_times[0]->departure_time)) {
                    $resultTrips[] = $tripRecord;
                }
            }
        } else {
            $resultTrips = $query->fetchRecords();
        }

        usort($resultTrips, function ($a, $b) {
            return strtotime($a->stop_times[0]->departure_time) > strtotime($b->stop_times[0]->departure_time);
        });

        return $resultTrips;
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

        $subordinateStopIds = $this->getSubordinateStopIds($requestStopId);

        $query = $this->orm->select(Trip::class);
        $query->with([
           'route' => [
               'agency'
           ],
           'stop_times' => function ($select) {
                $select->with(['stop'])->orderBy('stop_sequence');
            }
        ])->where(
            'trip_id IN ',
            $query->subSelect()
                ->columns('trip_id')
                ->from(StopTimeTable::NAME)
                ->whereEquals([
                    'stop_id' => $subordinateStopIds
                ])

        )
        ->limit($this->requestLimit)
        ->offset($this->requestOffset);

        if ($requestDate != null) {
            $query->whereEquals([
                'service_id' => $this->getServiceIds($requestDate)
            ]);
        }

        $resultTrips = [];
        if ($requestTime != null) {
            foreach($query->fetchRecordSet() as $tripRecord) {
                if (strtotime($requestTime) <= strtotime($tripRecord->stop_times[0]->departure_time)) {
                    $resultTrips[] = $tripRecord;
                }
            }
        } else {
            $resultTrips = $query->fetchRecords();
        }

        usort($resultTrips, function ($a, $b) use ($subordinateStopIds) {
            $stopTimeIndexA = $this->getStopTimeIndex($a, $subordinateStopIds);
            $stopTimeIndexB = $this->getStopTimeIndex($b, $subordinateStopIds);

            return strtotime($a->stop_times[$stopTimeIndexA]->departure_time) > strtotime($b->stop_times[$stopTimeIndexB]->departure_time);
        });

        return $resultTrips;
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
     * Returns all subordinate stop IDs for a desired stop ID.
     *
     * @param $stopId The reference stop ID
     * @return array  All subordinate stop IDs
     */
    private function getSubordinateStopIds($stopId) {
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

    /**
     * Returns the first index of a stop time that appears in the stop times
     * of the desired trip record.
     *
     * @param TripRecord $tripRecord The trip to search
     * @param array $stopIds Stop IDs to lookup
     * @return int The result stop time index
     */
    private function getStopTimeIndex(TripRecord $tripRecord, array $stopIds) {
        for ($i = 0; $i < count($tripRecord->stop_times); $i++) {
            if (in_array($tripRecord->stop_times[$i]->stop_id, $stopIds)) {
                return $i;
            }
        }

        return 0;
    }

}