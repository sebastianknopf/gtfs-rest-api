<?php
/**
 * This file remains to the GTFS-REST-API - Copyright (c) 2020.
 *
 * @author Sebastian Knopf
 * @license http://opensource.org/licenses/MIT MIT
 */

declare(strict_types=1);

namespace App\Google\Transit\Shape;

use Atlas\Mapper\MapperSelect;

/**
 * @method ShapeRecord|null fetchRecord()
 * @method ShapeRecord[] fetchRecords()
 * @method ShapeRecordSet fetchRecordSet()
 */
class ShapeSelect extends MapperSelect
{
}
