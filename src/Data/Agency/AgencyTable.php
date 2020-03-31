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

namespace App\Data\Agency;

use Atlas\Table\Table;

/**
 * @method AgencyRow|null fetchRow($primaryVal)
 * @method AgencyRow[] fetchRows(array $primaryVals)
 * @method AgencyTableSelect select(array $whereEquals = [])
 * @method AgencyRow newRow(array $cols = [])
 * @method AgencyRow newSelectedRow(array $cols)
 */
class AgencyTable extends Table
{
    const DRIVER = 'sqlite';

    const NAME = 'agency';

    const COLUMNS = [
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
        'agency_name' => array (
  'name' => 'agency_name',
  'type' => 'TEXT',
  'size' => NULL,
  'scale' => NULL,
  'notnull' => false,
  'default' => NULL,
  'autoinc' => false,
  'primary' => false,
  'options' => NULL,
),
        'agency_url' => array (
  'name' => 'agency_url',
  'type' => 'TEXT',
  'size' => NULL,
  'scale' => NULL,
  'notnull' => false,
  'default' => NULL,
  'autoinc' => false,
  'primary' => false,
  'options' => NULL,
),
        'agency_timezone' => array (
  'name' => 'agency_timezone',
  'type' => 'TEXT',
  'size' => NULL,
  'scale' => NULL,
  'notnull' => false,
  'default' => NULL,
  'autoinc' => false,
  'primary' => false,
  'options' => NULL,
),
        'agency_lang' => array (
  'name' => 'agency_lang',
  'type' => 'TEXT',
  'size' => NULL,
  'scale' => NULL,
  'notnull' => false,
  'default' => NULL,
  'autoinc' => false,
  'primary' => false,
  'options' => NULL,
),
        'agency_phone' => array (
  'name' => 'agency_phone',
  'type' => 'TEXT',
  'size' => NULL,
  'scale' => NULL,
  'notnull' => false,
  'default' => NULL,
  'autoinc' => false,
  'primary' => false,
  'options' => NULL,
),
        'agency_fare_url' => array (
  'name' => 'agency_fare_url',
  'type' => 'TEXT',
  'size' => NULL,
  'scale' => NULL,
  'notnull' => false,
  'default' => NULL,
  'autoinc' => false,
  'primary' => false,
  'options' => NULL,
),
        'agency_email' => array (
  'name' => 'agency_email',
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
        'agency_id',
        'agency_name',
        'agency_url',
        'agency_timezone',
        'agency_lang',
        'agency_phone',
        'agency_fare_url',
        'agency_email',
    ];

    const COLUMN_DEFAULTS = [
        'agency_id' => null,
        'agency_name' => null,
        'agency_url' => null,
        'agency_timezone' => null,
        'agency_lang' => null,
        'agency_phone' => null,
        'agency_fare_url' => null,
        'agency_email' => null,
    ];

    const PRIMARY_KEY = [
    ];

    const AUTOINC_COLUMN = null;

    const AUTOINC_SEQUENCE = null;
}
