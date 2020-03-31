<?php
/**
 * This file remains to the GTFS-REST-API - Copyright (c) 2020.
 *
 * @author Sebastian Knopf
 * @license http://opensource.org/licenses/MIT MIT
 */

declare(strict_types=1);

namespace App\Data\StopTime;

use Atlas\Mapper\MapperSelect;

/**
 * @method StopTimeRecord|null fetchRecord()
 * @method StopTimeRecord[] fetchRecords()
 * @method StopTimeRecordSet fetchRecordSet()
 */
class StopTimeSelect extends MapperSelect
{
}
