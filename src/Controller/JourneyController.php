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
use CSA\Exception\RoutingException;
use CSA\Journey;
use CSA\Scanner;
use Slim\Http\ServerRequest;

class JourneyController
{
    /**
     * Default selector method - Throws an exception, because this selector does not really
     * make sense, since journeys are calculated for each call.
     *
     * @param ServerRequest $request The server request instance
     * @return mixed Array with all fares
     */
    protected function getAll(ServerRequest $request) {
        throw new \RuntimeException('invalid selector method for trip queries!');
    }

    protected function getByStopIds(ServerRequest $request) {
        $requestOriginStopId = $request->getParam('originStopId', null);
        $requestDestinationStopId = $request->getParam('destinationStopId', null);
        $requestDate = $request->getParam('date', null);
        $requestTime = $request->getParam('time', null);

        if ($requestOriginStopId == null) {
            throw new \RuntimeException('missing parameter originStopId!');
        }

        if ($requestDestinationStopId == null) {
            throw new \RuntimeException('missing parameter destinationStopId!');
        }

        if ($requestDate == null) {
            throw new \RuntimeException('missing parameter date!');
        }

        if ($requestTime == null) {
            throw new \RuntimeException('missing parameter time!');
        }

        $journey = $this->computeJourney($requestOriginStopId, $requestDestinationStopId, $requestDate, $requestTime);

        return [$journey];
    }

    private function computeJourney($requestOriginStopId, $requestDestinationStopId, $requestDate, $requestTime) {
        $originStopIds = $this->getChildStopIds($requestOriginStopId);
        $destinationStopIds = $this->getChildStopIds($requestDestinationStopId);

        $connectionsList = $this->getConnectionsList($requestDate, $requestTime);
        $transfersList = $this->getTransfersList();
        $journeyLegsList = [];

        $scanner = new Scanner($connectionsList);

        foreach ($originStopIds as $orginStopId) {
            foreach($destinationStopIds as $destinationStopId) {
                try {
                    $connectionsIndex = $scanner->computeConnections($orginStopId, $destinationStopId, $requestTime);
                    $journey = new Journey($connectionsIndex);

                    array_push($journeyLegsList, $journey->computeLegs($destinationStopId));
                } catch (RoutingException $e) {

                }
            }
        }

        // there's no valid journey found
        if (count($journeyLegsList) < 1) {
            return null;
        }

        // create comparable journeys
        $journeysList = [];
        foreach ($journeyLegsList as $journeyLegs) {
            $duration = strtotime($journeyLegs[count($journeyLegs) - 1]->getArrivalTime()) - strtotime($journeyLegs[0]->getDepartureTime());
            $interchanges = count($journeyLegs);

            $journey = [
                'durationSeconds' => $duration,
                'numInterchanges' => $interchanges,
                'legs' => $journeyLegs
            ];

            array_push($journeysList, $journey);
        }

        // find best journey based on duration
        $bestJourney = $journeysList[0];
        foreach ($journeysList as $journey) {
            if ($journey['durationSeconds'] < $bestJourney['durationSeconds']) {
                $bestJourney = $journey;
            }
        }

        return $bestJourney;
    }

    private function getConnectionsList($requestDate, $requestTime) {
        return [];
    }

    private function getTransfersList() {
        return [];
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