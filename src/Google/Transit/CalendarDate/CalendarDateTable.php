<?php
/**
 * This file was generated by Atlas. Changes will be overwritten.
 */
declare(strict_types=1);

namespace App\Google\Transit\CalendarDate;

use Atlas\Table\Table;

/**
 * @method CalendarDateRow|null fetchRow($primaryVal)
 * @method CalendarDateRow[] fetchRows(array $primaryVals)
 * @method CalendarDateTableSelect select(array $whereEquals = [])
 * @method CalendarDateRow newRow(array $cols = [])
 * @method CalendarDateRow newSelectedRow(array $cols)
 */
class CalendarDateTable extends Table
{
    const DRIVER = 'sqlite';

    const NAME = 'calendar_dates';

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
        'date' => array (
  'name' => 'date',
  'type' => 'TEXT',
  'size' => NULL,
  'scale' => NULL,
  'notnull' => false,
  'default' => NULL,
  'autoinc' => false,
  'primary' => true,
  'options' => NULL,
),
        'exception_type' => array (
  'name' => 'exception_type',
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
        'date',
        'exception_type',
    ];

    const COLUMN_DEFAULTS = [
        'service_id' => null,
        'date' => null,
        'exception_type' => null,
    ];

    const PRIMARY_KEY = [
        'service_id',
        'date',
    ];

    const AUTOINC_COLUMN = null;

    const AUTOINC_SEQUENCE = null;
}
