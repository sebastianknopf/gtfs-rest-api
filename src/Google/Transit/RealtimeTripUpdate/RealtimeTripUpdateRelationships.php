<?php
declare(strict_types=1);

namespace Google\Transit\RealtimeTripUpdate;

use App\Mapper\NullableMapperRelationships;
use Google\Transit\RealtimeStopTimeUpdate\RealtimeStopTimeUpdate;
use Google\Transit\RealtimeVehiclePosition\RealtimeVehiclePosition;

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
