<?php
/**
 * This file remains to the GTFS-REST-API - Copyright (c) 2020.
 *
 * @author Sebastian Knopf
 * @license http://opensource.org/licenses/MIT MIT
 */

declare(strict_types=1);

namespace App\Google\Transit\Calendar;

use Atlas\Mapper\RecordSet;

/**
 * @method CalendarRecord offsetGet($offset)
 * @method CalendarRecord appendNew(array $fields = [])
 * @method CalendarRecord|null getOneBy(array $whereEquals)
 * @method CalendarRecordSet getAllBy(array $whereEquals)
 * @method CalendarRecord|null detachOneBy(array $whereEquals)
 * @method CalendarRecordSet detachAllBy(array $whereEquals)
 * @method CalendarRecordSet detachAll()
 * @method CalendarRecordSet detachDeleted()
 */
class CalendarRecordSet extends RecordSet
{
}
