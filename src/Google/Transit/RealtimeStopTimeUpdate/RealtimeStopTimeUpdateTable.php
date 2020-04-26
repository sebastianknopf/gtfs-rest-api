<?php
/**
 * This file was generated by Atlas. Changes will be overwritten.
 */
declare(strict_types=1);

namespace App\Google\Transit\RealtimeStopTimeUpdate;

use Atlas\Table\Table;

/**
 * @method RealtimeStopTimeUpdateRow|null fetchRow($primaryVal)
 * @method RealtimeStopTimeUpdateRow[] fetchRows(array $primaryVals)
 * @method RealtimeStopTimeUpdateTableSelect select(array $whereEquals = [])
 * @method RealtimeStopTimeUpdateRow newRow(array $cols = [])
 * @method RealtimeStopTimeUpdateRow newSelectedRow(array $cols)
 */
class RealtimeStopTimeUpdateTable extends Table
{
    const DRIVER = 'sqlite';

    const NAME = 'realtime_stop_time_updates';

    const COLUMNS = [
        '_id' => array (
  'name' => '_id',
  'type' => 'INTEGER',
  'size' => NULL,
  'scale' => NULL,
  'notnull' => true,
  'default' => NULL,
  'autoinc' => true,
  'primary' => true,
  'options' => NULL,
),
        'trip_update_id' => array (
  'name' => 'trip_update_id',
  'type' => 'INTEGER',
  'size' => NULL,
  'scale' => NULL,
  'notnull' => false,
  'default' => NULL,
  'autoinc' => false,
  'primary' => false,
  'options' => NULL,
),
        'stop_id' => array (
  'name' => 'stop_id',
  'type' => 'TEXT',
  'size' => NULL,
  'scale' => NULL,
  'notnull' => false,
  'default' => NULL,
  'autoinc' => false,
  'primary' => false,
  'options' => NULL,
),
        'stop_sequence' => array (
  'name' => 'stop_sequence',
  'type' => 'INTEGER',
  'size' => NULL,
  'scale' => NULL,
  'notnull' => false,
  'default' => NULL,
  'autoinc' => false,
  'primary' => false,
  'options' => NULL,
),
        'arrival_delay' => array (
  'name' => 'arrival_delay',
  'type' => 'INTEGER',
  'size' => NULL,
  'scale' => NULL,
  'notnull' => false,
  'default' => NULL,
  'autoinc' => false,
  'primary' => false,
  'options' => NULL,
),
        'arrival_time' => array (
  'name' => 'arrival_time',
  'type' => 'INTEGER',
  'size' => NULL,
  'scale' => NULL,
  'notnull' => false,
  'default' => NULL,
  'autoinc' => false,
  'primary' => false,
  'options' => NULL,
),
        'arrival_uncertainty' => array (
  'name' => 'arrival_uncertainty',
  'type' => 'INTEGER',
  'size' => NULL,
  'scale' => NULL,
  'notnull' => false,
  'default' => NULL,
  'autoinc' => false,
  'primary' => false,
  'options' => NULL,
),
        'depature_delay' => array (
  'name' => 'depature_delay',
  'type' => 'INTEGER',
  'size' => NULL,
  'scale' => NULL,
  'notnull' => false,
  'default' => NULL,
  'autoinc' => false,
  'primary' => false,
  'options' => NULL,
),
        'departure_time' => array (
  'name' => 'departure_time',
  'type' => 'INTEGER',
  'size' => NULL,
  'scale' => NULL,
  'notnull' => false,
  'default' => NULL,
  'autoinc' => false,
  'primary' => false,
  'options' => NULL,
),
        'departure_uncertainty' => array (
  'name' => 'departure_uncertainty',
  'type' => 'INTEGER',
  'size' => NULL,
  'scale' => NULL,
  'notnull' => false,
  'default' => NULL,
  'autoinc' => false,
  'primary' => false,
  'options' => NULL,
),
        'schedule_relationship' => array (
  'name' => 'schedule_relationship',
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
        '_id',
        'trip_update_id',
        'stop_id',
        'stop_sequence',
        'arrival_delay',
        'arrival_time',
        'arrival_uncertainty',
        'depature_delay',
        'departure_time',
        'departure_uncertainty',
        'schedule_relationship',
    ];

    const COLUMN_DEFAULTS = [
        '_id' => null,
        'trip_update_id' => null,
        'stop_id' => null,
        'stop_sequence' => null,
        'arrival_delay' => null,
        'arrival_time' => null,
        'arrival_uncertainty' => null,
        'depature_delay' => null,
        'departure_time' => null,
        'departure_uncertainty' => null,
        'schedule_relationship' => null,
    ];

    const PRIMARY_KEY = [
        '_id',
    ];

    const AUTOINC_COLUMN = '_id';

    const AUTOINC_SEQUENCE = null;
}
