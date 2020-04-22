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
        $bodyPbf = $request->getBody();

        $feedMessage = new FeedMessage();
        $feedMessage->mergeFromString($bodyPbf);

        foreach ($feedMessage->getEntity() as $feedEntity) {
            if ($feedEntity->getTripUpdate() != null) {

            }
        }
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