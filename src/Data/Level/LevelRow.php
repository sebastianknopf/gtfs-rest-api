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

namespace App\Data\Level;

use Atlas\Table\Row;

/**
 * @property mixed $level_id TEXT
 * @property mixed $level_index TEXT
 * @property mixed $level_name TEXT
 */
class LevelRow extends Row
{
    protected $cols = [
        'level_id' => null,
        'level_index' => null,
        'level_name' => null,
    ];
}
