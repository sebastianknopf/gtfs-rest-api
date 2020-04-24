<?php
/**
 * This file remains to the GTFS-REST-API - Copyright (c) 2020.
 *
 * @author Sebastian Knopf
 * @license http://opensource.org/licenses/MIT MIT
 */

declare(strict_types=1);

namespace App\Google\Transit\Trip;

use App\Google\Transit\Calendar\Calendar;
use App\Google\Transit\Frequency\Frequency;
use App\Google\Transit\RealtimeTripUpdate\RealtimeTripUpdate;
use App\Google\Transit\Route\Route;
use App\Google\Transit\Shape\Shape;
use App\Google\Transit\StopTime\StopTime;
use App\Mapper\NullableMapperRelationships;

class TripRelationships extends NullableMapperRelationships
{
    protected function define()
    {
        $this->nullableManyToOne('route', Route::class, [
            'route_id' => 'route_id'
        ]);

        $this->nullableManyToOne('service', Calendar::class, [
            'service_id' => 'service_id'
        ]);

        $this->nullableManyToOne('calendar', Calendar::class, [
            'service_id' => 'service_id'
        ]);

        $this->oneToMany('stop_times', StopTime::class, [
            'trip_id' => 'trip_id'
        ]);

        $this->oneToMany('frequencies', Frequency::class, [
            'trip_id' => 'trip_id'
        ]);

        $this->oneToMany('shape_points', Shape::class, [
            'shape_id' => 'shape_id'
        ]);

        $this->nullableOneToOne('trip_update', RealtimeTripUpdate::class, [
            'trip_id' => 'trip_id'
        ]);
    }
}
