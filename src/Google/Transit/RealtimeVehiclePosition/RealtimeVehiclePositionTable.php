<?php
/**
 * This file was generated by Atlas. Changes will be overwritten.
 */
declare(strict_types=1);

namespace App\Google\Transit\RealtimeVehiclePosition;

use Atlas\Table\Table;

/**
 * @method RealtimeVehiclePositionRow|null fetchRow($primaryVal)
 * @method RealtimeVehiclePositionRow[] fetchRows(array $primaryVals)
 * @method RealtimeVehiclePositionTableSelect select(array $whereEquals = [])
 * @method RealtimeVehiclePositionRow newRow(array $cols = [])
 * @method RealtimeVehiclePositionRow newSelectedRow(array $cols)
 */
class RealtimeVehiclePositionTable extends Table
{
    const DRIVER = 'sqlite';

    const NAME = 'realtime_vehicle_positions';

    const COLUMNS = [
        'vehicle_id' => array (
  'name' => 'vehicle_id',
  'type' => 'TEXT',
  'size' => NULL,
  'scale' => NULL,
  'notnull' => true,
  'default' => NULL,
  'autoinc' => false,
  'primary' => true,
  'options' => NULL,
),
        'timestamp' => array (
  'name' => 'timestamp',
  'type' => 'INTEGER',
  'size' => NULL,
  'scale' => NULL,
  'notnull' => false,
  'default' => NULL,
  'autoinc' => false,
  'primary' => false,
  'options' => NULL,
),
        'vehicle_label' => array (
  'name' => 'vehicle_label',
  'type' => 'TEXT',
  'size' => NULL,
  'scale' => NULL,
  'notnull' => false,
  'default' => NULL,
  'autoinc' => false,
  'primary' => false,
  'options' => NULL,
),
        'vehicle_license_plate' => array (
  'name' => 'vehicle_license_plate',
  'type' => 'TEXT',
  'size' => NULL,
  'scale' => NULL,
  'notnull' => false,
  'default' => NULL,
  'autoinc' => false,
  'primary' => false,
  'options' => NULL,
),
        'position_lat' => array (
  'name' => 'position_lat',
  'type' => 'REAL',
  'size' => NULL,
  'scale' => NULL,
  'notnull' => false,
  'default' => NULL,
  'autoinc' => false,
  'primary' => false,
  'options' => NULL,
),
        'position_lon' => array (
  'name' => 'position_lon',
  'type' => 'REAL',
  'size' => NULL,
  'scale' => NULL,
  'notnull' => false,
  'default' => NULL,
  'autoinc' => false,
  'primary' => false,
  'options' => NULL,
),
        'position_bearing' => array (
  'name' => 'position_bearing',
  'type' => 'REAL',
  'size' => NULL,
  'scale' => NULL,
  'notnull' => false,
  'default' => NULL,
  'autoinc' => false,
  'primary' => false,
  'options' => NULL,
),
        'position_odometer' => array (
  'name' => 'position_odometer',
  'type' => 'REAL',
  'size' => NULL,
  'scale' => NULL,
  'notnull' => false,
  'default' => NULL,
  'autoinc' => false,
  'primary' => false,
  'options' => NULL,
),
        'position_speed' => array (
  'name' => 'position_speed',
  'type' => 'REAL',
  'size' => NULL,
  'scale' => NULL,
  'notnull' => false,
  'default' => NULL,
  'autoinc' => false,
  'primary' => false,
  'options' => NULL,
),
        'congestion_level' => array (
  'name' => 'congestion_level',
  'type' => 'TEXT',
  'size' => NULL,
  'scale' => NULL,
  'notnull' => false,
  'default' => NULL,
  'autoinc' => false,
  'primary' => false,
  'options' => NULL,
),
        'occupancy_status' => array (
  'name' => 'occupancy_status',
  'type' => 'TEXT',
  'size' => NULL,
  'scale' => NULL,
  'notnull' => false,
  'default' => NULL,
  'autoinc' => false,
  'primary' => false,
  'options' => NULL,
),
        'stop_status' => array (
  'name' => 'stop_status',
  'type' => 'TEXT',
  'size' => NULL,
  'scale' => NULL,
  'notnull' => false,
  'default' => NULL,
  'autoinc' => false,
  'primary' => false,
  'options' => NULL,
),
    ];

    const COLUMN_NAMES = [
        'vehicle_id',
        'timestamp',
        'vehicle_label',
        'vehicle_license_plate',
        'position_lat',
        'position_lon',
        'position_bearing',
        'position_odometer',
        'position_speed',
        'congestion_level',
        'occupancy_status',
        'stop_status',
    ];

    const COLUMN_DEFAULTS = [
        'vehicle_id' => null,
        'timestamp' => null,
        'vehicle_label' => null,
        'vehicle_license_plate' => null,
        'position_lat' => null,
        'position_lon' => null,
        'position_bearing' => null,
        'position_odometer' => null,
        'position_speed' => null,
        'congestion_level' => null,
        'occupancy_status' => null,
        'stop_status' => null,
    ];

    const PRIMARY_KEY = [
        'vehicle_id',
    ];

    const AUTOINC_COLUMN = null;

    const AUTOINC_SEQUENCE = null;
}
