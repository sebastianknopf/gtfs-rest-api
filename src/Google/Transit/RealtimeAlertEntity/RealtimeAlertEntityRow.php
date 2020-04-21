<?php
/**
 * This file was generated by Atlas. Changes will be overwritten.
 */
declare(strict_types=1);

namespace Google\Transit\RealtimeAlertEntity;

use Atlas\Table\Row;

/**
 * @property mixed $alert_id INTEGER NOT NULL
 * @property mixed $stop_id TEXT
 * @property mixed $agency_id TEXT
 * @property mixed $route_id TEXT
 * @property mixed $trip_id TEXT
 * @property mixed $trip_start_date TEXT
 * @property mixed $trip_start_time TEXT
 * @property mixed $route_type TEXT
 */
class RealtimeAlertEntityRow extends Row
{
    protected $cols = [
        'alert_id' => null,
        'stop_id' => null,
        'agency_id' => null,
        'route_id' => null,
        'trip_id' => null,
        'trip_start_date' => null,
        'trip_start_time' => null,
        'route_type' => null,
    ];
}
