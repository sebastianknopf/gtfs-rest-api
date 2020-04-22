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
     * @param ServerRequest $request
     * @throws \Exception When the message could not be processed
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
    }

    /**
     *
     *
     * @param ServerRequest $request
     * @throws \Exception When the message could not be processed
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
    }

    /**
     * @param ServerRequest $request
     * @throws \Exception When the message could not be processed
     */
    protected function postVehiclePositions(ServerRequest $request) {
        $bodyPbf = $request->getBody();

        $feedMessage = new FeedMessage();
        $feedMessage->mergeFromString($bodyPbf);

        foreach($feedMessage->getEntity() as $feedEntity) {
            if ($feedEntity->getVehicle() != null) {

            }
        }
    }
}