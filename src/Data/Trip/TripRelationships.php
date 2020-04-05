<?php
/**
 * This file remains to the GTFS-REST-API - Copyright (c) 2020.
 *
 * @author Sebastian Knopf
 * @license http://opensource.org/licenses/MIT MIT
 */

declare(strict_types=1);

namespace App\Data\Trip;

use App\Data\Calendar\Calendar;
use App\Data\Frequency\Frequency;
use App\Data\Route\Route;
use App\Data\Shape\Shape;
use App\Data\StopTime\StopTime;
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
    }
}
