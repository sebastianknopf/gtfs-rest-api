<?php
/**
 * This file remains to the GTFS-REST-API - Copyright (c) 2020.
 *
 * @author Sebastian Knopf
 * @license http://opensource.org/licenses/MIT MIT
 */

declare(strict_types=1);

namespace App\Google\Transit\Calendar;

use Atlas\Mapper\Mapper;
use Atlas\Table\Row;

/**
 * @method CalendarTable getTable()
 * @method CalendarRelationships getRelationships()
 * @method CalendarRecord|null fetchRecord($primaryVal, array $with = [])
 * @method CalendarRecord|null fetchRecordBy(array $whereEquals, array $with = [])
 * @method CalendarRecord[] fetchRecords(array $primaryVals, array $with = [])
 * @method CalendarRecord[] fetchRecordsBy(array $whereEquals, array $with = [])
 * @method CalendarRecordSet fetchRecordSet(array $primaryVals, array $with = [])
 * @method CalendarRecordSet fetchRecordSetBy(array $whereEquals, array $with = [])
 * @method CalendarSelect select(array $whereEquals = [])
 * @method CalendarRecord newRecord(array $fields = [])
 * @method CalendarRecord[] newRecords(array $fieldSets)
 * @method CalendarRecordSet newRecordSet(array $records = [])
 * @method CalendarRecord turnRowIntoRecord(Row $row, array $with = [])
 * @method CalendarRecord[] turnRowsIntoRecords(array $rows, array $with = [])
 */
class Calendar extends Mapper
{
}
