<?php
/**
 * This file was generated by Atlas. Changes will be overwritten.
 */
declare(strict_types=1);

namespace App\Google\Transit\Trip;

use Atlas\Table\Table;

/**
 * @method TripRow|null fetchRow($primaryVal)
 * @method TripRow[] fetchRows(array $primaryVals)
 * @method TripTableSelect select(array $whereEquals = [])
 * @method TripRow newRow(array $cols = [])
 * @method TripRow newSelectedRow(array $cols)
 */
class TripTable extends Table
{
    const DRIVER = 'sqlite';

    const NAME = 'trips';

    const COLUMNS = [
        'route_id' => array (
  'name' => 'route_id',
  'type' => 'TEXT',
  'size' => NULL,
  'scale' => NULL,
  'notnull' => false,
  'default' => NULL,
  'autoinc' => false,
  'primary' => false,
  'options' => NULL,
),
        'service_id' => array (
  'name' => 'service_id',
  'type' => 'TEXT',
  'size' => NULL,
  'scale' => NULL,
  'notnull' => false,
  'default' => NULL,
  'autoinc' => false,
  'primary' => false,
  'options' => NULL,
),
        'trip_id' => array (
  'name' => 'trip_id',
  'type' => 'TEXT',
  'size' => NULL,
  'scale' => NULL,
  'notnull' => false,
  'default' => NULL,
  'autoinc' => false,
  'primary' => true,
  'options' => NULL,
),
        'trip_headsign' => array (
  'name' => 'trip_headsign',
  'type' => 'TEXT',
  'size' => NULL,
  'scale' => NULL,
  'notnull' => false,
  'default' => NULL,
  'autoinc' => false,
  'primary' => false,
  'options' => NULL,
),
        'trip_short_name' => array (
  'name' => 'trip_short_name',
  'type' => 'TEXT',
  'size' => NULL,
  'scale' => NULL,
  'notnull' => false,
  'default' => NULL,
  'autoinc' => false,
  'primary' => false,
  'options' => NULL,
),
        'direction_id' => array (
  'name' => 'direction_id',
  'type' => 'TEXT',
  'size' => NULL,
  'scale' => NULL,
  'notnull' => false,
  'default' => NULL,
  'autoinc' => false,
  'primary' => false,
  'options' => NULL,
),
        'block_id' => array (
  'name' => 'block_id',
  'type' => 'TEXT',
  'size' => NULL,
  'scale' => NULL,
  'notnull' => false,
  'default' => NULL,
  'autoinc' => false,
  'primary' => false,
  'options' => NULL,
),
        'shape_id' => array (
  'name' => 'shape_id',
  'type' => 'TEXT',
  'size' => NULL,
  'scale' => NULL,
  'notnull' => false,
  'default' => NULL,
  'autoinc' => false,
  'primary' => false,
  'options' => NULL,
),
        'wheelchair_accessible' => array (
  'name' => 'wheelchair_accessible',
  'type' => 'TEXT',
  'size' => NULL,
  'scale' => NULL,
  'notnull' => false,
  'default' => NULL,
  'autoinc' => false,
  'primary' => false,
  'options' => NULL,
),
        'bikes_allowed' => array (
  'name' => 'bikes_allowed',
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
        'route_id',
        'service_id',
        'trip_id',
        'trip_headsign',
        'trip_short_name',
        'direction_id',
        'block_id',
        'shape_id',
        'wheelchair_accessible',
        'bikes_allowed',
    ];

    const COLUMN_DEFAULTS = [
        'route_id' => null,
        'service_id' => null,
        'trip_id' => null,
        'trip_headsign' => null,
        'trip_short_name' => null,
        'direction_id' => null,
        'block_id' => null,
        'shape_id' => null,
        'wheelchair_accessible' => null,
        'bikes_allowed' => null,
    ];

    const PRIMARY_KEY = [
        'trip_id',
    ];

    const AUTOINC_COLUMN = null;

    const AUTOINC_SEQUENCE = null;
}
