<?php
/**
 * This file was generated by Atlas. Changes will be overwritten.
 */
declare(strict_types=1);

namespace App\Google\Transit\Stop;

use Atlas\Table\Table;

/**
 * @method StopRow|null fetchRow($primaryVal)
 * @method StopRow[] fetchRows(array $primaryVals)
 * @method StopTableSelect select(array $whereEquals = [])
 * @method StopRow newRow(array $cols = [])
 * @method StopRow newSelectedRow(array $cols)
 */
class StopTable extends Table
{
    const DRIVER = 'sqlite';

    const NAME = 'stops';

    const COLUMNS = [
        'stop_id' => array (
  'name' => 'stop_id',
  'type' => 'TEXT',
  'size' => NULL,
  'scale' => NULL,
  'notnull' => false,
  'default' => NULL,
  'autoinc' => false,
  'primary' => true,
  'options' => NULL,
),
        'stop_code' => array (
  'name' => 'stop_code',
  'type' => 'TEXT',
  'size' => NULL,
  'scale' => NULL,
  'notnull' => false,
  'default' => NULL,
  'autoinc' => false,
  'primary' => false,
  'options' => NULL,
),
        'stop_name' => array (
  'name' => 'stop_name',
  'type' => 'TEXT',
  'size' => NULL,
  'scale' => NULL,
  'notnull' => false,
  'default' => NULL,
  'autoinc' => false,
  'primary' => false,
  'options' => NULL,
),
        'stop_desc' => array (
  'name' => 'stop_desc',
  'type' => 'TEXT',
  'size' => NULL,
  'scale' => NULL,
  'notnull' => false,
  'default' => NULL,
  'autoinc' => false,
  'primary' => false,
  'options' => NULL,
),
        'stop_lat' => array (
  'name' => 'stop_lat',
  'type' => 'REAL',
  'size' => NULL,
  'scale' => NULL,
  'notnull' => false,
  'default' => NULL,
  'autoinc' => false,
  'primary' => false,
  'options' => NULL,
),
        'stop_lon' => array (
  'name' => 'stop_lon',
  'type' => 'REAL',
  'size' => NULL,
  'scale' => NULL,
  'notnull' => false,
  'default' => NULL,
  'autoinc' => false,
  'primary' => false,
  'options' => NULL,
),
        'zone_id' => array (
  'name' => 'zone_id',
  'type' => 'TEXT',
  'size' => NULL,
  'scale' => NULL,
  'notnull' => false,
  'default' => NULL,
  'autoinc' => false,
  'primary' => false,
  'options' => NULL,
),
        'stop_url' => array (
  'name' => 'stop_url',
  'type' => 'TEXT',
  'size' => NULL,
  'scale' => NULL,
  'notnull' => false,
  'default' => NULL,
  'autoinc' => false,
  'primary' => false,
  'options' => NULL,
),
        'location_type' => array (
  'name' => 'location_type',
  'type' => 'TEXT',
  'size' => NULL,
  'scale' => NULL,
  'notnull' => false,
  'default' => NULL,
  'autoinc' => false,
  'primary' => false,
  'options' => NULL,
),
        'parent_station' => array (
  'name' => 'parent_station',
  'type' => 'TEXT',
  'size' => NULL,
  'scale' => NULL,
  'notnull' => false,
  'default' => NULL,
  'autoinc' => false,
  'primary' => false,
  'options' => NULL,
),
        'stop_timezone' => array (
  'name' => 'stop_timezone',
  'type' => 'TEXT',
  'size' => NULL,
  'scale' => NULL,
  'notnull' => false,
  'default' => NULL,
  'autoinc' => false,
  'primary' => false,
  'options' => NULL,
),
        'wheelchair_boarding' => array (
  'name' => 'wheelchair_boarding',
  'type' => 'TEXT',
  'size' => NULL,
  'scale' => NULL,
  'notnull' => false,
  'default' => NULL,
  'autoinc' => false,
  'primary' => false,
  'options' => NULL,
),
        'level_id' => array (
  'name' => 'level_id',
  'type' => 'TEXT',
  'size' => NULL,
  'scale' => NULL,
  'notnull' => false,
  'default' => NULL,
  'autoinc' => false,
  'primary' => false,
  'options' => NULL,
),
        'platform_code' => array (
  'name' => 'platform_code',
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
        'stop_id',
        'stop_code',
        'stop_name',
        'stop_desc',
        'stop_lat',
        'stop_lon',
        'zone_id',
        'stop_url',
        'location_type',
        'parent_station',
        'stop_timezone',
        'wheelchair_boarding',
        'level_id',
        'platform_code',
    ];

    const COLUMN_DEFAULTS = [
        'stop_id' => null,
        'stop_code' => null,
        'stop_name' => null,
        'stop_desc' => null,
        'stop_lat' => null,
        'stop_lon' => null,
        'zone_id' => null,
        'stop_url' => null,
        'location_type' => null,
        'parent_station' => null,
        'stop_timezone' => null,
        'wheelchair_boarding' => null,
        'level_id' => null,
        'platform_code' => null,
    ];

    const PRIMARY_KEY = [
        'stop_id',
    ];

    const AUTOINC_COLUMN = null;

    const AUTOINC_SEQUENCE = null;
}