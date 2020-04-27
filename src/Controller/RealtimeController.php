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
    protected function getAll(ServerRequest $request) {
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
     * Deletes matching GTFS-realtime service alerts from database.
     *
     * @param ServerRequest $request The server request instance
     * @return array A message for the API client
     */
    protected function deleteAlerts(ServerRequest $request) {
        $requestAlertId = $request->getParam('alertId', null);

        if ($requestAlertId == null) {
            throw new \RuntimeException('missing parameter alertId!');
        }

        $existingAlert = $this->orm
            ->select(RealtimeAlert::class)
            ->with(['time_ranges', 'informed_entities'])
            ->whereEquals(['alert_id' => $requestAlertId])
            ->fetchRecordSet();

        if ($existingAlert != null) {
            $existingAlert->setDelete();
            $this->orm->persistRecordSet($existingAlert);
        }

        return [
            'message' => 'alert has been deleted successfully'
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

                // find existing trip update and override this
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
                    $existingStopTimeUpdates = $this->orm
                        ->select(RealtimeStopTimeUpdate::class)
                        ->where('trip_update_id =', $existingUpdate->trip_update_id)
                        ->fetchRecordSet();

                    $existingStopTimeUpdates->setDelete();
                    $this->orm->persistRecordSet($existingStopTimeUpdates);

                    $existingUpdate->timestamp = $tripUpdateMessage->getTimestamp();
                    $existingUpdate->schedule_relationship = $tripUpdateMessage->getTrip()->getScheduleRelationship();
                    $existingUpdate->stop_time_updates = $stopTimeUpdates;

                    $this->orm->persist($existingUpdate);
                } else {
                    $tripUpdate = $this->orm->newRecord(RealtimeTripUpdate::class, [
                        'trip_id' => $tripUpdateMessage->getTrip()->getTripId(),
                        'timestamp' => $tripUpdateMessage->getTimestamp(),
                        'route_id' => $tripUpdateMessage->getTrip()->getRouteId(),
                        'trip_start_date' => $tripUpdateMessage->getTrip()->getStartDate(),
                        'trip_start_time' => $tripUpdateMessage->getTrip()->getStartTime(),
                        'schedule_relationship' => $tripUpdateMessage->getTrip()->getScheduleRelationship(),
                        'stop_time_updates' => $stopTimeUpdates
                    ]);

                    $this->orm->persist($tripUpdate);
                }
            }
        }

        $this->orm->commit();

        return [
            'message' => 'trip updates processed successfully'
        ];
    }

    /**
     * Deletes matching GTFS-realtime trip updates from database.
     *
     * @param ServerRequest $request The server request instance
     * @return array A message for the API client
     */
    protected function deleteTripUpdates(ServerRequest $request) {
        $requestTripId = $request->getParam('tripId', null);
        $requestRouteId = $request->getParam('routeId', null);

        if ($requestTripId == null) {
            throw new \RuntimeException('missing parameter tripId!');
        }

        if ($requestRouteId == null) {
            throw new \RuntimeException('missing parameter routeId!');
        }

        $requestTripStartDate = $request->getParam('tripStartDate', null);
        $requestTripStartTime = $request->getParam('tripStartTime', null);

        // delete existing trip update from database
        $tripDescriptor = [
            'trip_id' => $requestTripId,
            'route_id' => $requestRouteId
        ];

        if ($requestTripStartDate != null) $tripDescriptor['trip_start_date'] = $requestTripStartDate;
        if ($requestTripStartTime != null) $tripDescriptor['trip_start_time'] = $requestTripStartTime;

        $existingUpdates = $this->orm
            ->select(RealtimeTripUpdate::class)
            ->with(['stop_time_updates'])
            ->whereEquals($tripDescriptor)
            ->fetchRecordSet();

        if ($existingUpdates != null) {
            $existingUpdates->setDelete();
            $this->orm->persistRecordSet($existingUpdates);
        }

        return [
            'message' => 'trip updates deleted successfully'
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

                // find existing vehicle position and override this
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
                    $existingPosition->timestamp = $vehiclePositionMessage->getTimestamp();
                    $existingPosition->position_lat = $vehiclePositionMessage->getPosition()->getLatitude();
                    $existingPosition->position_lon = $vehiclePositionMessage->getPosition()->getLongitude();
                    $existingPosition->position_bearing = $vehiclePositionMessage->getPosition()->getBearing();
                    $existingPosition->position_odometer = $vehiclePositionMessage->getPosition()->getOdometer();
                    $existingPosition->position_speed = $vehiclePositionMessage->getPosition()->getSpeed();
                    $existingPosition->congestion_level = $vehiclePositionMessage->getCongestionLevel();
                    $existingPosition->occupancy_status = $vehiclePositionMessage->getOccupancyStatus();
                    $existingPosition->stop_status = $vehiclePositionMessage->getCurrentStatus();

                    $this->orm->update($existingPosition);
                } else {
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
                }

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

    /**
     * Deletes matching GTFS-realtime vehicle positions from database.
     *
     * @param ServerRequest $request The server request instance
     * @return array A message for the API client
     */
    public function deleteVehiclePositions(ServerRequest $request) {
        $requestVehicleId = $request->getParam('vehicleId', null);

        $requestVehicleLabel = $request->getParam('vehicleLabel', null);
        $requestVehicleLicensePlate = $request->getParam('vehicleLicensePlate', null);

        if ($requestVehicleId == null) {
            throw new \RuntimeException('missing parameter vehicleId!');
        }

        // delete existing trip update from database
        $vehicleDescriptor = [
            'vehicle_id' => $requestVehicleId
        ];

        if ($requestVehicleLabel != null) $vehicleDescriptor['vehicle_label'] = $requestVehicleLabel;
        if ($requestVehicleLicensePlate != null) $vehicleDescriptor['vehicle_license_plate'] = $requestVehicleLicensePlate;

        $existingPositions = $this->orm
            ->select(RealtimeVehiclePosition::class)
            ->whereEquals($vehicleDescriptor)
            ->fetchRecordSet();

        if ($existingPositions != null) {
            $existingPositions->setDelete();
            $this->orm->persistRecordSet($existingPositions);
        }

        return [
            'message' => 'vehicle positions deleted successfully'
        ];
    }

    /**
     * Deletes all vehicle positions and trip updates which are updated last time before a certain offset of time
     * in seconds. Default offset is -5min.
     *
     * @param ServerRequest $request The server request instance
     * @return array A message for the API client
     */
    protected function deleteGarbageCollector(ServerRequest $request) {
        $requestTimeOffset = $request->getParam('timeOffset', time() - strtotime('-5 minutes'));
        $requestTimeOffset = time() - $requestTimeOffset;

        $tripUpdates = $this->orm
            ->select(RealtimeTripUpdate::class)
            ->with(['stop_time_updates'])
            ->where('timestamp <', $requestTimeOffset)
            ->fetchRecordSet();

        $tripUpdates->setDelete();
        $this->orm->persistRecordSet($tripUpdates);

        $vehiclePositions = $this->orm
            ->select(RealtimeVehiclePosition::class)
            ->where('timestamp <', $requestTimeOffset)
            ->fetchRecordSet();

        $vehiclePositions->setDelete();
        $this->orm->persistRecordSet($vehiclePositions);

        return [
            'message' => 'garbage objects deleted successfully'
        ];
    }
}