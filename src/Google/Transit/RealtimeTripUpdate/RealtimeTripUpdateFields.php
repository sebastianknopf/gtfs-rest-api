<?php
/**
 * This file was generated by Atlas. Changes will be overwritten.
 */
declare(strict_types=1);

namespace App\Google\Transit\RealtimeTripUpdate;

/**
 * @property mixed $trip_update_id INTEGER NOT NULL
 * @property mixed $timestamp INTEGER
 * @property mixed $trip_id TEXT
 * @property mixed $route_id TEXT
 * @property mixed $trip_start_date TEXT
 * @property mixed $trip_start_time TEXT
 * @property mixed $vehicle_id TEXT
 * @property mixed $schedule_relationship TEXT
 * @property null|\App\Google\Transit\RealtimeStopTimeUpdate\RealtimeStopTimeUpdateRecordSet $stop_time_updates
 * @property null|false|\App\Google\Transit\RealtimeVehiclePosition\RealtimeVehiclePositionRecord $vehicle_position
 */
trait RealtimeTripUpdateFields
{
}
