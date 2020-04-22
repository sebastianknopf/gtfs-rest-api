<?php
declare(strict_types=1);

namespace App\Google\Transit\RealtimeAlertEntity;

use Atlas\Mapper\Mapper;
use Atlas\Table\Row;

/**
 * @method RealtimeAlertEntityTable getTable()
 * @method RealtimeAlertEntityRelationships getRelationships()
 * @method RealtimeAlertEntityRecord|null fetchRecord($primaryVal, array $with = [])
 * @method RealtimeAlertEntityRecord|null fetchRecordBy(array $whereEquals, array $with = [])
 * @method RealtimeAlertEntityRecord[] fetchRecords(array $primaryVals, array $with = [])
 * @method RealtimeAlertEntityRecord[] fetchRecordsBy(array $whereEquals, array $with = [])
 * @method RealtimeAlertEntityRecordSet fetchRecordSet(array $primaryVals, array $with = [])
 * @method RealtimeAlertEntityRecordSet fetchRecordSetBy(array $whereEquals, array $with = [])
 * @method RealtimeAlertEntitySelect select(array $whereEquals = [])
 * @method RealtimeAlertEntityRecord newRecord(array $fields = [])
 * @method RealtimeAlertEntityRecord[] newRecords(array $fieldSets)
 * @method RealtimeAlertEntityRecordSet newRecordSet(array $records = [])
 * @method RealtimeAlertEntityRecord turnRowIntoRecord(Row $row, array $with = [])
 * @method RealtimeAlertEntityRecord[] turnRowsIntoRecords(array $rows, array $with = [])
 */
class RealtimeAlertEntity extends Mapper
{
}
