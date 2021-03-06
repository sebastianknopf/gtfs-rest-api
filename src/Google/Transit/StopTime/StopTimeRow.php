<?php
/**
 * This file was generated by Atlas. Changes will be overwritten.
 */
declare(strict_types=1);

namespace App\Google\Transit\StopTime;

use Atlas\Table\Row;

/**
 * @property mixed $trip_id TEXT
 * @property mixed $arrival_time TEXT
 * @property mixed $departure_time TEXT
 * @property mixed $stop_id TEXT
 * @property mixed $stop_sequence INTEGER
 * @property mixed $stop_headsign TEXT
 * @property mixed $pickup_type TEXT
 * @property mixed $drop_off_type TEXT
 * @property mixed $shape_dist_traveled REAL
 * @property mixed $timepoint TEXT
 */
class StopTimeRow extends Row
{
    protected $cols = [
        'trip_id' => null,
        'arrival_time' => null,
        'departure_time' => null,
        'stop_id' => null,
        'stop_sequence' => 1,
        'stop_headsign' => null,
        'pickup_type' => null,
        'drop_off_type' => null,
        'shape_dist_traveled' => null,
        'timepoint' => null,
    ];
}
