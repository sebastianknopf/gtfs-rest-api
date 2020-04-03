<?php
/**
 * This file remains to the GTFS-REST-API - Copyright (c) 2020.
 *
 * @author Sebastian Knopf
 * @license http://opensource.org/licenses/MIT MIT
 */

namespace App\Controller;

use App\Data\FareAttribute\FareAttribute;
use App\Data\FareRule\FareRuleTable;
use Slim\Http\ServerRequest;

/**
 * Fare controller class for every request regarded to the fares resource.
 *
 * @package App\Controller
 */
class FareController extends BaseController
{

    /**
     * Default selector method - Returns all fare objects in the database.
     *
     * @param ServerRequest $request The server request instance
     * @return mixed Array with all fares
     */
    protected function findAll(ServerRequest $request) {
        $query = $this->orm
            ->select(FareAttribute::class)
            ->with(['fare_rules'])
            ->limit($this->requestLimit)
            ->offset($this->requestOffset);

        return $query->fetchRecords();
    }

    /**
     * Selects a fare by its fare ID.
     *
     * @param ServerRequest $request The server request instance
     * @return mixed Array with matching fare object(s)
     */
    protected function findByFareId(ServerRequest $request) {
        $requestFareId = $request->getParam('fareId', null);

        if ($requestFareId == null) {
            throw new \RuntimeException('missing parameter fareId!');
        }

        $query = $this->orm
            ->select(FareAttribute::class)
            ->with(['fare_rules'])
            ->where('fare_id =', $requestFareId)
            ->limit($this->requestLimit)
            ->offset($this->requestOffset);

        return [$query->fetchRecord()];
    }

    /**
     * Selects fares by originZone ID and destinationZone ID.
     *
     * @param ServerRequest $request The server request instance
     * @return mixed Array with matching fare object(s)
     */
    protected function findByZoneId(ServerRequest $request) {
        $requestOriginId = $request->getParam('originZoneId', null);
        $requestDestinationId = $request->getParam('destinationZoneId', null);

        $requestAgencyId = $request->getParam('agencyId');

        if ($requestOriginId == null) {
            throw new \RuntimeException('missing parameter originZoneId!');
        }

        if ($requestDestinationId == null) {
            throw new \RuntimeException('missing parameter destinationZoneId!');
        }

        $query = $this->orm->select(FareAttribute::class);
        $query->with([
            'fare_rules' => function ($select) use ($requestOriginId, $requestDestinationId) {
                $select->whereEquals([
                    'origin_id' => $requestOriginId,
                    'destination_id' => $requestDestinationId
                ]);
            }
        ])->where(
            'fare_id IN',
            $query->subSelect()
                ->columns('fare_id')
                ->from(FareRuleTable::NAME)
                ->whereEquals([
                    'origin_id' => $requestOriginId,
                    'destination_id' => $requestDestinationId
                ])
        )
        ->limit($this->requestLimit)
        ->offset($this->requestOffset);

        if ($requestAgencyId != null) {
            $query->andWhere('agency_id =', $requestAgencyId);
        }

        return $query->fetchRecords();
    }

    /**
     * Selects fares by their route ID.
     *
     * @param ServerRequest $request The server request instance
     * @return mixed Array with matching fare object(s)
     */
    protected function findByRouteId(ServerRequest $request) {
        $requestRouteId = $request->getParam('routeId', null);

        $requestAgencyId = $request->getParam('agencyId');

        if ($requestRouteId == null) {
            throw new \RuntimeException('missing parameter routeId!');
        }

        $query = $this->orm->select(FareAttribute::class);
        $query->with([
            'fare_rules' => function ($select) use ($requestRouteId) {
                $select->whereEquals([
                    'route_id' => $requestRouteId
                ]);
            }
        ])->where(
            'fare_id IN',
            $query->subSelect()
                ->columns('fare_id')
                ->from(FareRuleTable::NAME)
                ->whereEquals([
                    'route_id' => $requestRouteId
                ])
        )
        ->limit($this->requestLimit)
        ->offset($this->requestOffset);

        if ($requestAgencyId != null) {
            $query->andWhere('agency_id =', $requestAgencyId);
        }

        return $query->fetchRecords();
    }
}