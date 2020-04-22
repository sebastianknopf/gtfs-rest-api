<?php
declare(strict_types=1);

namespace App\Google\Transit\RealtimeTripUpdate;

use App\Google\Transit\RealtimeStopTimeUpdate\RealtimeStopTimeUpdate;
use App\Google\Transit\RealtimeVehiclePosition\RealtimeVehiclePosition;
use App\Mapper\NullableMapperRelationships;

class RealtimeTripUpdateRelationships extends NullableMapperRelationships
{
    protected function define()
    {
        $this->oneToMany('stop_times', RealtimeStopTimeUpdate::class, [
            'trip_update_id' => 'trip_update_id'
        ]);

        $this->nullableOneToOne('vehicle_position', RealtimeVehiclePosition::class, [
            'vehicle_id' => 'vehicle_id'
        ]);
    }
}
