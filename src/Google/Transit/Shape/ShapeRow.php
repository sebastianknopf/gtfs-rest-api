<?php
/**
 * This file was generated by Atlas. Changes will be overwritten.
 */
declare(strict_types=1);

namespace App\Google\Transit\Shape;

use Atlas\Table\Row;

/**
 * @property mixed $shape_id TEXT
 * @property mixed $shape_pt_lat REAL
 * @property mixed $shape_pt_lon REAL
 * @property mixed $shape_pt_sequence INTEGER
 * @property mixed $shape_dist_traveled REAL
 */
class ShapeRow extends Row
{
    protected $cols = [
        'shape_id' => null,
        'shape_pt_lat' => null,
        'shape_pt_lon' => null,
        'shape_pt_sequence' => null,
        'shape_dist_traveled' => null,
    ];
}