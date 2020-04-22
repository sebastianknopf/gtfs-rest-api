<?php
/**
 * This file was generated by Atlas. Changes will be overwritten.
 */
declare(strict_types=1);

namespace App\Google\Transit\FareRule;

use Atlas\Table\Table;

/**
 * @method FareRuleRow|null fetchRow($primaryVal)
 * @method FareRuleRow[] fetchRows(array $primaryVals)
 * @method FareRuleTableSelect select(array $whereEquals = [])
 * @method FareRuleRow newRow(array $cols = [])
 * @method FareRuleRow newSelectedRow(array $cols)
 */
class FareRuleTable extends Table
{
    const DRIVER = 'sqlite';

    const NAME = 'fare_rules';

    const COLUMNS = [
        'fare_id' => array (
  'name' => 'fare_id',
  'type' => 'TEXT',
  'size' => NULL,
  'scale' => NULL,
  'notnull' => false,
  'default' => NULL,
  'autoinc' => false,
  'primary' => true,
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
        'origin_id' => array (
  'name' => 'origin_id',
  'type' => 'TEXT',
  'size' => NULL,
  'scale' => NULL,
  'notnull' => false,
  'default' => NULL,
  'autoinc' => false,
  'primary' => true,
  'options' => NULL,
),
        'destination_id' => array (
  'name' => 'destination_id',
  'type' => 'TEXT',
  'size' => NULL,
  'scale' => NULL,
  'notnull' => false,
  'default' => NULL,
  'autoinc' => false,
  'primary' => true,
  'options' => NULL,
),
        'contains_id' => array (
  'name' => 'contains_id',
  'type' => 'TEXT',
  'size' => NULL,
  'scale' => NULL,
  'notnull' => false,
  'default' => NULL,
  'autoinc' => false,
  'primary' => true,
  'options' => NULL,
),
    ];

    const COLUMN_NAMES = [
        'fare_id',
        'route_id',
        'origin_id',
        'destination_id',
        'contains_id',
    ];

    const COLUMN_DEFAULTS = [
        'fare_id' => null,
        'route_id' => null,
        'origin_id' => null,
        'destination_id' => null,
        'contains_id' => null,
    ];

    const PRIMARY_KEY = [
        'fare_id',
        'origin_id',
        'destination_id',
        'contains_id',
    ];

    const AUTOINC_COLUMN = null;

    const AUTOINC_SEQUENCE = null;
}
