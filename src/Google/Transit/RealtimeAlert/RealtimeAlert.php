<?php
declare(strict_types=1);

namespace App\Google\Transit\RealtimeAlert;

use Atlas\Mapper\Mapper;
use Atlas\Table\Row;

/**
 * @method RealtimeAlertTable getTable()
 * @method RealtimeAlertRelationships getRelationships()
 * @method RealtimeAlertRecord|null fetchRecord($primaryVal, array $with = [])
 * @method RealtimeAlertRecord|null fetchRecordBy(array $whereEquals, array $with = [])
 * @method RealtimeAlertRecord[] fetchRecords(array $primaryVals, array $with = [])
 * @method RealtimeAlertRecord[] fetchRecordsBy(array $whereEquals, array $with = [])
 * @method RealtimeAlertRecordSet fetchRecordSet(array $primaryVals, array $with = [])
 * @method RealtimeAlertRecordSet fetchRecordSetBy(array $whereEquals, array $with = [])
 * @method RealtimeAlertSelect select(array $whereEquals = [])
 * @method RealtimeAlertRecord newRecord(array $fields = [])
 * @method RealtimeAlertRecord[] newRecords(array $fieldSets)
 * @method RealtimeAlertRecordSet newRecordSet(array $records = [])
 * @method RealtimeAlertRecord turnRowIntoRecord(Row $row, array $with = [])
 * @method RealtimeAlertRecord[] turnRowsIntoRecords(array $rows, array $with = [])
 */
class RealtimeAlert extends Mapper
{
}
