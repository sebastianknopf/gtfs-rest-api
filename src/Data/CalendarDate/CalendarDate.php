<?php
declare(strict_types=1);

namespace App\Data\CalendarDate;

use Atlas\Mapper\Mapper;
use Atlas\Table\Row;

/**
 * @method CalendarDateTable getTable()
 * @method CalendarDateRelationships getRelationships()
 * @method CalendarDateRecord|null fetchRecord($primaryVal, array $with = [])
 * @method CalendarDateRecord|null fetchRecordBy(array $whereEquals, array $with = [])
 * @method CalendarDateRecord[] fetchRecords(array $primaryVals, array $with = [])
 * @method CalendarDateRecord[] fetchRecordsBy(array $whereEquals, array $with = [])
 * @method CalendarDateRecordSet fetchRecordSet(array $primaryVals, array $with = [])
 * @method CalendarDateRecordSet fetchRecordSetBy(array $whereEquals, array $with = [])
 * @method CalendarDateSelect select(array $whereEquals = [])
 * @method CalendarDateRecord newRecord(array $fields = [])
 * @method CalendarDateRecord[] newRecords(array $fieldSets)
 * @method CalendarDateRecordSet newRecordSet(array $records = [])
 * @method CalendarDateRecord turnRowIntoRecord(Row $row, array $with = [])
 * @method CalendarDateRecord[] turnRowsIntoRecords(array $rows, array $with = [])
 */
class CalendarDate extends Mapper
{
}
