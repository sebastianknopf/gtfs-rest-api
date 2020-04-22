<?php
/**
 * This file was generated by Atlas. Changes will be overwritten.
 */
declare(strict_types=1);

namespace App\Google\Transit\Shape;

use Atlas\Table\Table;

/**
 * @method ShapeRow|null fetchRow($primaryVal)
 * @method ShapeRow[] fetchRows(array $primaryVals)
 * @method ShapeTableSelect select(array $whereEquals = [])
 * @method ShapeRow newRow(array $cols = [])
 * @method ShapeRow newSelectedRow(array $cols)
 */
class ShapeTable extends Table
{
    const DRIVER = 'sqlite';

    const NAME = 'shapes';

    const COLUMNS = [
        'shape_id' => array (
  'name' => 'shape_id',
  'type' => 'TEXT',
  'size' => NULL,
  'scale' => NULL,
  'notnull' => false,
  'default' => NULL,
  'autoinc' => false,
  'primary' => true,
  'options' => NULL,
),
        'shape_pt_lat' => array (
  'name' => 'shape_pt_lat',
  'type' => 'REAL',
  'size' => NULL,
  'scale' => NULL,
  'notnull' => false,
  'default' => NULL,
  'autoinc' => false,
  'primary' => false,
  'options' => NULL,
),
        'shape_pt_lon' => array (
  'name' => 'shape_pt_lon',
  'type' => 'REAL',
  'size' => NULL,
  'scale' => NULL,
  'notnull' => false,
  'default' => NULL,
  'autoinc' => false,
  'primary' => false,
  'options' => NULL,
),
        'shape_pt_sequence' => array (
  'name' => 'shape_pt_sequence',
  'type' => 'INTEGER',
  'size' => NULL,
  'scale' => NULL,
  'notnull' => false,
  'default' => NULL,
  'autoinc' => false,
  'primary' => true,
  'options' => NULL,
),
        'shape_dist_traveled' => array (
  'name' => 'shape_dist_traveled',
  'type' => 'REAL',
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
        'shape_id',
        'shape_pt_lat',
        'shape_pt_lon',
        'shape_pt_sequence',
        'shape_dist_traveled',
    ];

    const COLUMN_DEFAULTS = [
        'shape_id' => null,
        'shape_pt_lat' => null,
        'shape_pt_lon' => null,
        'shape_pt_sequence' => null,
        'shape_dist_traveled' => null,
    ];

    const PRIMARY_KEY = [
        'shape_id',
        'shape_pt_sequence',
    ];

    const AUTOINC_COLUMN = null;

    const AUTOINC_SEQUENCE = null;
}
