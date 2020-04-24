<?php
/**
 * This file remains to the GTFS-REST-API - Copyright (c) 2020.
 *
 * @author Sebastian Knopf
 * @license http://opensource.org/licenses/MIT MIT
 */

namespace App\Controller;

use App\Google\Transit\RealtimeAlert\RealtimeAlert;
use App\Google\Transit\RealtimeAlertEntity\RealtimeAlertEntity;
use App\Google\Transit\RealtimeAlertTimerange\RealtimeAlertTimerange;
use App\Google\Transit\RealtimeStopTimeUpdate\RealtimeStopTimeUpdate;
use App\Google\Transit\RealtimeTripUpdate\RealtimeTripUpdate;
use App\Google\Transit\RealtimeVehiclePosition\RealtimeVehiclePosition;
use Google\Transit\Realtime\FeedMessage;
use Slim\Http\ServerRequest;

class RealtimeController extends BaseController
{

    /**
     * Default selector method - Throws an exception, because this selector does not really
     * make sense, since realtime updates are only pushed.
     *
     * @param ServerRequest $request The server request instance
     * @return mixed Selector result data
     */
    protected function findAll(ServerRequest $request) {
        throw new \RuntimeException('invalid selector method for trip queries!');
    }

    /**
     * Receives a set of GTFS-realtime service alerts and adds them to the database.
     *
     * @param ServerRequest $request The server request instance
     * @return array A message for the API client
     * @throws \Exception
     */
    protected function postAlerts(ServerRequest $request) {
        $bodyPbf = $request->getBody()->getContents();

        $feedMessage = new FeedMessage();
        $feedMessage->mergeFromString($bodyPbf);

        $this->orm->beginTransaction();

        foreach ($feedMessage->getEntity() as $feedEntity) {
            if ($feedEntity->getAlert() != null) {
                $alertMessage = $feedEntity->getAlert();

                $timeRanges = $this->orm->newRecordSet(RealtimeAlertTimerange::class);
                foreach ($alertMessage->getActivePeriod() as $activePeriod) {
                    $timeRanges->appendNew([
                        'start_time' => $activePeriod->getStart(),
                        'end_time' => $activePeriod->getEnd()
                    ]);
                }

                $informedEntities = $this->orm->newRecordSet(RealtimeAlertEntity::class);
                foreach ($alertMessage->getInformedEntity() as $informedEntity) {
                    $informedEntities->appendNew([
                        'stop_id' => $informedEntity->getStopId(),
                        'agency_id' => $informedEntity->getAgencyId(),
                        'route_id' => $informedEntity->getRouteId(),
                        'route_type' => $informedEntity->getRouteType(),
                        'trip_id' => $informedEntity->getTrip() != null ? $informedEntity->getTrip()->getTripId() : null,
                        'trip_start_date' => $informedEntity->getTrip() != null ? $informedEntity->getTrip()->getStartDate() : null,
                        'trip_start_time' => $informedEntity->getTrip() != null ? $informedEntity->getTrip()->getStartTime() : null,
                    ]);
                }

                $alert = $this->orm->newRecord(RealtimeAlert::class, [
                    'alert_cause' => $alertMessage->getCause(),
                    'alert_effect' => $alertMessage->getEffect(),
                    'alert_url' => $alertMessage->getUrl() != null ? $alertMessage->getUrl()->getTranslation()[0]->getText() : null,
                    'alert_header_text' => $alertMessage->getHeaderText() != null ? $alertMessage->getHeaderText()->getTranslation()[0]->getText() : null,
                    'alert_description_text' => $alertMessage != null ? $alertMessage->getDescriptionText()->getTranslation()[0]->getText() : null,
                    'time_ranges' => $timeRanges,
                    'informed_entities' => $informedEntities
                ]);

                $this->orm->persist($alert);
            }
        }

        $this->orm->commit();

        return [
            'message' => 'alerts processed successfully'
        ];
    }

    /**
     * Receives a set of GTFS-realtime trip updates and adds them to the database.
     *
     * @param ServerRequest $request The server request instance
     * @return array A message for the API client
     * @throws \Exception
     */
    protected function postTripUpdates(ServerRequest $request) {
        $bodyPbf = $request->getBody()->getContents();

        $feedMessage = new FeedMessage();
        $feedMessage->mergeFromString($bodyPbf);

        $this->orm->beginTransaction();

        foreach ($feedMessage->getEntity() as $feedEntity) {
            if ($feedEntity->getTripUpdate() != null) {
                $tripUpdateMessage = $feedEntity->getTripUpdate();

                // delete existing trip update from database
                $tripDescriptor = [
                    'trip_id' => $tripUpdateMessage->getTrip()->getTripId(),
                    'route_id' => $tripUpdateMessage->getTrip()->getRouteId(),
                    'trip_start_date' => $tripUpdateMessage->getTrip()->getStartDate(),
                    'trip_start_time' => $tripUpdateMessage->getTrip()->getStartTime()
                ];

                $existingUpdate = $this->orm
                    ->select(RealtimeTripUpdate::class)
                    ->whereEquals($tripDescriptor)
                    ->fetchRecord();

                if ($existingUpdate != null) {
                    $this->orm->delete($existingUpdate);
                    $this->orm->persist($existingUpdate);
                }

                // build new trip update
                $stopTimeUpdates = $this->orm->newRecordSet(RealtimeStopTimeUpdate::class);
                foreach ($tripUpdateMessage->getStopTimeUpdate() as $stopTimeUpdate) {
                    $stopTimeUpdates->appendNew([
                        'stop_id' => $stopTimeUpdate->getStopId(),
                        'stop_sequence' => $stopTimeUpdate->getStopSequence(),
                        'arrival_delay' => $stopTimeUpdate->getArrival() != null ? $stopTimeUpdate->getArrival()->getDelay() : 0,
                        'arrival_time' => $stopTimeUpdate->getArrival() != null ? $stopTimeUpdate->getArrival()->getTime() : 0,
                        'arrival_uncertainty' => $stopTimeUpdate->getArrival() != null ? $stopTimeUpdate->getArrival()->getUncertainty() : 0,
                        'departure_delay' => $stopTimeUpdate->getDeparture() != null ? $stopTimeUpdate->getDeparture()->getDelay() : 0,
                        'departure_time' => $stopTimeUpdate->getDeparture() != null ? $stopTimeUpdate->getDeparture()->getTime() : 0,
                        'departure_uncertainty' => $stopTimeUpdate->getDeparture() != null ? $stopTimeUpdate->getDeparture()->getUncertainty() : 0,
                        'schedule_relationship' => $stopTimeUpdate->getScheduleRelationship()
                    ]);
                }

                $tripUpdate = $this->orm->newRecord(RealtimeTripUpdate::class, [
                    'trip_id' => $tripUpdateMessage->getTrip()->getTripId(),
                    'timestamp' => $tripUpdateMessage->getTimestamp(),
                    'route_id' => $tripUpdateMessage->getTrip()->getRouteId(),
                    'trip_start_date' => $tripUpdateMessage->getTrip()->getStartDate(),
                    'trip_start_time' => $tripUpdateMessage->getTrip()->getStartTime(),
                    'schedule_relationship' => $tripUpdateMessage->getTrip()->getScheduleRelationship(),
                    'vehicle_id' => $tripUpdateMessage->getVehicle() != null ? $tripUpdateMessage->getVehicle()->getId() : null,
                    'stop_time_updates' => $stopTimeUpdates
                ]);

                $this->orm->persist($tripUpdate);
            }
        }

        $this->orm->commit();

        return [
            'message' => 'trip updates processed successfully'
        ];
    }

    /**
     * Receives a set of GTFS-realtime vehicle positions and adds them to the database.
     *
     * @param ServerRequest $request The server request instance
     * @return array A message for the API client
     * @throws \Exception
     */
    protected function postVehiclePositions(ServerRequest $request) {
        $bodyPbf = $request->getBody()->getContents();

        $feedMessage = new FeedMessage();
        $feedMessage->mergeFromString($bodyPbf);

        $this->orm->beginTransaction();

        foreach($feedMessage->getEntity() as $feedEntity) {
            if ($feedEntity->getVehicle() != null) {
                $vehiclePositionMessage = $feedEntity->getVehicle();

                // delete existing vehicle position from database
                $vehicleDescriptor = [
                    'vehicle_id' => $vehiclePositionMessage->getVehicle()->getId(),
                    'vehicle_label' => $vehiclePositionMessage->getVehicle()->getLabel(),
                    'vehicle_license_plate' => $vehiclePositionMessage->getVehicle()->getLicensePlate()
                ];

                $existingPosition = $this->orm
                    ->select(RealtimeVehiclePosition::class)
                    ->whereEquals($vehicleDescriptor)
                    ->fetchRecord();

                if ($existingPosition != null) {
                    $this->orm->delete($existingPosition);
                }

                // build new vehicle position
                $vehiclePosition = $this->orm->newRecord(RealtimeVehiclePosition::class, [
                    'vehicle_id' => $vehiclePositionMessage->getVehicle()->getId(),
                    'timestamp' => $vehiclePositionMessage->getTimestamp(),
                    'vehicle_label' => $vehiclePositionMessage->getVehicle()->getLabel(),
                    'vehicle_license_plate' => $vehiclePositionMessage->getVehicle()->getLicensePlate(),
                    'position_lat' => $vehiclePositionMessage->getPosition()->getLatitude(),
                    'position_lon' => $vehiclePositionMessage->getPosition()->getLongitude(),
                    'position_bearing' => $vehiclePositionMessage->getPosition()->getBearing(),
                    'position_odometer' => $vehiclePositionMessage->getPosition()->getOdometer(),
                    'position_speed' => $vehiclePositionMessage->getPosition()->getSpeed(),
                    'congestion_level' => $vehiclePositionMessage->getCongestionLevel(),
                    'occupancy_status' => $vehiclePositionMessage->getOccupancyStatus(),
                    'stop_status' => $vehiclePositionMessage->getCurrentStatus()
                ]);

                $this->orm->insert($vehiclePosition);

                // set vehicle ID to a trip update, if a trip descriptor is contained
                if ($vehiclePositionMessage->getTrip() != null) {
                    $tripDescriptor = [
                        'trip_id' => $vehiclePositionMessage->getTrip()->getTripId(),
                        'route_id' => $vehiclePositionMessage->getTrip()->getRouteId(),
                        'trip_start_date' => $vehiclePositionMessage->getTrip()->getStartDate(),
                        'trip_start_time' => $vehiclePositionMessage->getTrip()->getStartTime()
                    ];

                    $existingUpdate = $this->orm
                        ->select(RealtimeTripUpdate::class)
                        ->whereEquals($tripDescriptor)
                        ->fetchRecord();

                    if ($existingUpdate != null) {
                        $existingUpdate->vehicle_id = $vehiclePositionMessage->getVehicle()->getId();
                        $this->orm->update($existingUpdate);
                    }
                }
            }
        }

        $this->orm->commit();

        return [
            'message' => 'vehicle positions processed successfully'
        ];
    }
}