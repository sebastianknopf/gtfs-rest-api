<?php
/**
 * This file remains to the GTFS-REST-API - Copyright (c) 2020.
 *
 * @author Sebastian Knopf
 * @license http://opensource.org/licenses/MIT MIT
 */

declare(strict_types=1);

namespace App\Google\Transit\CalendarDate;

use Atlas\Mapper\RecordSet;

/**
 * @method CalendarDateRecord offsetGet($offset)
 * @method CalendarDateRecord appendNew(array $fields = [])
 * @method CalendarDateRecord|null getOneBy(array $whereEquals)
 * @method CalendarDateRecordSet getAllBy(array $whereEquals)
 * @method CalendarDateRecord|null detachOneBy(array $whereEquals)
 * @method CalendarDateRecordSet detachAllBy(array $whereEquals)
 * @method CalendarDateRecordSet detachAll()
 * @method CalendarDateRecordSet detachDeleted()
 */
class CalendarDateRecordSet extends RecordSet
{
}
