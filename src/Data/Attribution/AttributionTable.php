<?php
/**
 * This file remains to the GTFS-REST-API - Copyright (c) 2020.
 *
 * @author Sebastian Knopf
 * @license http://opensource.org/licenses/MIT MIT
 */

/**
 * This file was generated by Atlas. Changes will be overwritten.
 */
declare(strict_types=1);

namespace App\Data\Attribution;

use Atlas\Table\Table;

/**
 * @method AttributionRow|null fetchRow($primaryVal)
 * @method AttributionRow[] fetchRows(array $primaryVals)
 * @method AttributionTableSelect select(array $whereEquals = [])
 * @method AttributionRow newRow(array $cols = [])
 * @method AttributionRow newSelectedRow(array $cols)
 */
class AttributionTable extends Table
{
    const DRIVER = 'sqlite';

    const NAME = 'attributions';

    const COLUMNS = [
        'attribution_id' => array (
  'name' => 'attribution_id',
  'type' => 'TEXT',
  'size' => NULL,
  'scale' => NULL,
  'notnull' => false,
  'default' => NULL,
  'autoinc' => false,
  'primary' => false,
  'options' => NULL,
),
        'agency_id' => array (
  'name' => 'agency_id',
  'type' => 'TEXT',
  'size' => NULL,
  'scale' => NULL,
  'notnull' => false,
  'default' => NULL,
  'autoinc' => false,
  'primary' => false,
  'options' => NULL,
),
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
        'trip_id' => array (
  'name' => 'trip_id',
  'type' => 'TEXT',
  'size' => NULL,
  'scale' => NULL,
  'notnull' => false,
  'default' => NULL,
  'autoinc' => false,
  'primary' => false,
  'options' => NULL,
),
        'organization_name' => array (
  'name' => 'organization_name',
  'type' => 'TEXT',
  'size' => NULL,
  'scale' => NULL,
  'notnull' => false,
  'default' => NULL,
  'autoinc' => false,
  'primary' => false,
  'options' => NULL,
),
        'is_producer' => array (
  'name' => 'is_producer',
  'type' => 'TEXT',
  'size' => NULL,
  'scale' => NULL,
  'notnull' => false,
  'default' => NULL,
  'autoinc' => false,
  'primary' => false,
  'options' => NULL,
),
        'is_operator' => array (
  'name' => 'is_operator',
  'type' => 'TEXT',
  'size' => NULL,
  'scale' => NULL,
  'notnull' => false,
  'default' => NULL,
  'autoinc' => false,
  'primary' => false,
  'options' => NULL,
),
        'is_authority' => array (
  'name' => 'is_authority',
  'type' => 'TEXT',
  'size' => NULL,
  'scale' => NULL,
  'notnull' => false,
  'default' => NULL,
  'autoinc' => false,
  'primary' => false,
  'options' => NULL,
),
        'attribution_url' => array (
  'name' => 'attribution_url',
  'type' => 'TEXT',
  'size' => NULL,
  'scale' => NULL,
  'notnull' => false,
  'default' => NULL,
  'autoinc' => false,
  'primary' => false,
  'options' => NULL,
),
        'attribution_email' => array (
  'name' => 'attribution_email',
  'type' => 'TEXT',
  'size' => NULL,
  'scale' => NULL,
  'notnull' => false,
  'default' => NULL,
  'autoinc' => false,
  'primary' => false,
  'options' => NULL,
),
        'attribution_phone' => array (
  'name' => 'attribution_phone',
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
        'attribution_id',
        'agency_id',
        'route_id',
        'trip_id',
        'organization_name',
        'is_producer',
        'is_operator',
        'is_authority',
        'attribution_url',
        'attribution_email',
        'attribution_phone',
    ];

    const COLUMN_DEFAULTS = [
        'attribution_id' => null,
        'agency_id' => null,
        'route_id' => null,
        'trip_id' => null,
        'organization_name' => null,
        'is_producer' => null,
        'is_operator' => null,
        'is_authority' => null,
        'attribution_url' => null,
        'attribution_email' => null,
        'attribution_phone' => null,
    ];

    const PRIMARY_KEY = [
    ];

    const AUTOINC_COLUMN = null;

    const AUTOINC_SEQUENCE = null;
}
