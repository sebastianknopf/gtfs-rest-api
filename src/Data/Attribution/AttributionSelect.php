<?php
/**
 * This file remains to the GTFS-REST-API - Copyright (c) 2020.
 *
 * @author Sebastian Knopf
 * @license http://opensource.org/licenses/MIT MIT
 */

declare(strict_types=1);

namespace App\Data\Attribution;

use Atlas\Mapper\MapperSelect;

/**
 * @method AttributionRecord|null fetchRecord()
 * @method AttributionRecord[] fetchRecords()
 * @method AttributionRecordSet fetchRecordSet()
 */
class AttributionSelect extends MapperSelect
{
}
