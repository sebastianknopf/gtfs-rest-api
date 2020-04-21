<?php
/**
 * This file remains to the GTFS-REST-API - Copyright (c) 2020.
 *
 * @author Sebastian Knopf
 * @license http://opensource.org/licenses/MIT MIT
 */

namespace App\Controller;

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
        $bodyPbf = $request->getBody();

        $feedMessage = new FeedMessage();
        $feedMessage->mergeFromString($bodyPbf);

        foreach ($feedMessage->getEntity() as $feedEntity) {
            if ($feedEntity->getAlert() != null) {

            }
        }
    }

    /**
     *
     *
     * @param ServerRequest $request
     * @throws \Exception When the message could not be processed
     */
    protected function postTripUpdate(ServerRequest $request) {
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