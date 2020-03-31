<?php
/**
 * This file remains to the GTFS-REST-API - Copyright (c) 2020.
 *
 * @author Sebastian Knopf
 * @license http://opensource.org/licenses/MIT MIT
 */

declare(strict_types=1);

namespace App\Data\Frequency;

use Atlas\Mapper\MapperSelect;

/**
 * @method FrequencyRecord|null fetchRecord()
 * @method FrequencyRecord[] fetchRecords()
 * @method FrequencyRecordSet fetchRecordSet()
 */
class FrequencySelect extends MapperSelect
{
}
