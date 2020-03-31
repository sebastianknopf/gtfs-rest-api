<?php
/**
 * This file remains to the GTFS-REST-API - Copyright (c) 2020.
 *
 * @author Sebastian Knopf
 * @license http://opensource.org/licenses/MIT MIT
 */

declare(strict_types=1);

namespace App\Data\Calendar;

use Atlas\Mapper\MapperSelect;

/**
 * @method CalendarRecord|null fetchRecord()
 * @method CalendarRecord[] fetchRecords()
 * @method CalendarRecordSet fetchRecordSet()
 */
class CalendarSelect extends MapperSelect
{
}
