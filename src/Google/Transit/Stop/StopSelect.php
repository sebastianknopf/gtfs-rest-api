<?php
/**
 * This file remains to the GTFS-REST-API - Copyright (c) 2020.
 *
 * @author Sebastian Knopf
 * @license http://opensource.org/licenses/MIT MIT
 */

declare(strict_types=1);

namespace App\Google\Transit\Stop;

use Atlas\Mapper\MapperSelect;

/**
 * @method StopRecord|null fetchRecord()
 * @method StopRecord[] fetchRecords()
 * @method StopRecordSet fetchRecordSet()
 */
class StopSelect extends MapperSelect
{
}
