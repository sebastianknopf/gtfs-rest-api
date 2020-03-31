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

namespace App\Data\Transfer;

use Atlas\Table\Table;

/**
 * @method TransferRow|null fetchRow($primaryVal)
 * @method TransferRow[] fetchRows(array $primaryVals)
 * @method TransferTableSelect select(array $whereEquals = [])
 * @method TransferRow newRow(array $cols = [])
 * @method TransferRow newSelectedRow(array $cols)
 */
class TransferTable extends Table
{
    const DRIVER = 'sqlite';

    const NAME = 'transfers';

    const COLUMNS = [
        'from_stop_id' => array (
  'name' => 'from_stop_id',
  'type' => '',
  'size' => NULL,
  'scale' => NULL,
  'notnull' => false,
  'default' => NULL,
  'autoinc' => false,
  'primary' => false,
  'options' => NULL,
),
        'to_stop_id' => array (
  'name' => 'to_stop_id',
  'type' => '',
  'size' => NULL,
  'scale' => NULL,
  'notnull' => false,
  'default' => NULL,
  'autoinc' => false,
  'primary' => false,
  'options' => NULL,
),
        'transfer_type' => array (
  'name' => 'transfer_type',
  'type' => '',
  'size' => NULL,
  'scale' => NULL,
  'notnull' => false,
  'default' => NULL,
  'autoinc' => false,
  'primary' => false,
  'options' => NULL,
),
        'min_transfer_time' => array (
  'name' => 'min_transfer_time',
  'type' => '',
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
        'from_stop_id',
        'to_stop_id',
        'transfer_type',
        'min_transfer_time',
    ];

    const COLUMN_DEFAULTS = [
        'from_stop_id' => null,
        'to_stop_id' => null,
        'transfer_type' => null,
        'min_transfer_time' => null,
    ];

    const PRIMARY_KEY = [
    ];

    const AUTOINC_COLUMN = null;

    const AUTOINC_SEQUENCE = null;
}
