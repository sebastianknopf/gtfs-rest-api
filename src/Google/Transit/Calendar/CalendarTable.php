<?php
/**
 * This file was generated by Atlas. Changes will be overwritten.
 */
declare(strict_types=1);

namespace App\Google\Transit\Calendar;

use Atlas\Table\Table;

/**
 * @method CalendarRow|null fetchRow($primaryVal)
 * @method CalendarRow[] fetchRows(array $primaryVals)
 * @method CalendarTableSelect select(array $whereEquals = [])
 * @method CalendarRow newRow(array $cols = [])
 * @method CalendarRow newSelectedRow(array $cols)
 */
class CalendarTable extends Table
{
    const DRIVER = 'sqlite';

    const NAME = 'calendar';

    const COLUMNS = [
        'service_id' => array (
  'name' => 'service_id',
  'type' => 'TEXT',
  'size' => NULL,
  'scale' => NULL,
  'notnull' => false,
  'default' => NULL,
  'autoinc' => false,
  'primary' => true,
  'options' => NULL,
),
        'monday' => array (
  'name' => 'monday',
  'type' => 'TEXT',
  'size' => NULL,
  'scale' => NULL,
  'notnull' => false,
  'default' => NULL,
  'autoinc' => false,
  'primary' => false,
  'options' => NULL,
),
        'tuesday' => array (
  'name' => 'tuesday',
  'type' => 'TEXT',
  'size' => NULL,
  'scale' => NULL,
  'notnull' => false,
  'default' => NULL,
  'autoinc' => false,
  'primary' => false,
  'options' => NULL,
),
        'wednesday' => array (
  'name' => 'wednesday',
  'type' => 'TEXT',
  'size' => NULL,
  'scale' => NULL,
  'notnull' => false,
  'default' => NULL,
  'autoinc' => false,
  'primary' => false,
  'options' => NULL,
),
        'thursday' => array (
  'name' => 'thursday',
  'type' => 'TEXT',
  'size' => NULL,
  'scale' => NULL,
  'notnull' => false,
  'default' => NULL,
  'autoinc' => false,
  'primary' => false,
  'options' => NULL,
),
        'friday' => array (
  'name' => 'friday',
  'type' => 'TEXT',
  'size' => NULL,
  'scale' => NULL,
  'notnull' => false,
  'default' => NULL,
  'autoinc' => false,
  'primary' => false,
  'options' => NULL,
),
        'saturday' => array (
  'name' => 'saturday',
  'type' => 'TEXT',
  'size' => NULL,
  'scale' => NULL,
  'notnull' => false,
  'default' => NULL,
  'autoinc' => false,
  'primary' => false,
  'options' => NULL,
),
        'sunday' => array (
  'name' => 'sunday',
  'type' => 'TEXT',
  'size' => NULL,
  'scale' => NULL,
  'notnull' => false,
  'default' => NULL,
  'autoinc' => false,
  'primary' => false,
  'options' => NULL,
),
        'start_date' => array (
  'name' => 'start_date',
  'type' => 'TEXT',
  'size' => NULL,
  'scale' => NULL,
  'notnull' => false,
  'default' => NULL,
  'autoinc' => false,
  'primary' => false,
  'options' => NULL,
),
        'end_date' => array (
  'name' => 'end_date',
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
        'service_id',
        'monday',
        'tuesday',
        'wednesday',
        'thursday',
        'friday',
        'saturday',
        'sunday',
        'start_date',
        'end_date',
    ];

    const COLUMN_DEFAULTS = [
        'service_id' => null,
        'monday' => null,
        'tuesday' => null,
        'wednesday' => null,
        'thursday' => null,
        'friday' => null,
        'saturday' => null,
        'sunday' => null,
        'start_date' => null,
        'end_date' => null,
    ];

    const PRIMARY_KEY = [
        'service_id',
    ];

    const AUTOINC_COLUMN = null;

    const AUTOINC_SEQUENCE = null;
}
