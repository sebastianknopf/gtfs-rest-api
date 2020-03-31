<?php
/**
 * This file remains to the GTFS-REST-API - Copyright (c) 2020.
 *
 * @author Sebastian Knopf
 * @license http://opensource.org/licenses/MIT MIT
 */

declare(strict_types=1);

namespace App\Data\Trip;

use App\Data\Attribution\Attribution;
use App\Data\Calendar\Calendar;
use App\Data\Frequency\Frequency;
use App\Data\Route\Route;
use App\Data\Shape\Shape;
use App\Data\StopTime\StopTime;
use Atlas\Mapper\MapperRelationships;

class TripRelationships extends MapperRelationships
{
    protected function define()
    {
        $this->manyToOne('route', Route::class, [
            'route_id' => 'route_id'
        ]);

        $this->manyToOne('service', Calendar::class, [
            'service_id' => 'service_id'
        ]);

        $this->oneToMany('stop_times', StopTime::class, [
            'trip_id' => 'trip_id'
        ]);

        $this->oneToMany('frequencies', Frequency::class, [
            'trip_id' => 'trip_id'
        ]);

        $this->manyToOne('shape', Shape::class, [
            'shape_id' => 'shape_id'
        ]);

        $this->oneToMany('attributions', Attribution::class, [
            'trip_id' => 'trip_id'
        ])->where('trip_id IS NOT NULL');
    }
}
