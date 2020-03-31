<?php
/**
 * This file remains to the GTFS-REST-API - Copyright (c) 2020.
 *
 * @author Sebastian Knopf
 * @license http://opensource.org/licenses/MIT MIT
 */

declare(strict_types=1);

namespace App\Data\CalendarDate;

use Atlas\Mapper\MapperSelect;

/**
 * @method CalendarDateRecord|null fetchRecord()
 * @method CalendarDateRecord[] fetchRecords()
 * @method CalendarDateRecordSet fetchRecordSet()
 */
class CalendarDateSelect extends MapperSelect
{
}
