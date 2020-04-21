<?php
declare(strict_types=1);

namespace Google\Transit\RealtimeAlertTimerange;

use Atlas\Mapper\Mapper;
use Atlas\Table\Row;

/**
 * @method RealtimeAlertTimerangeTable getTable()
 * @method RealtimeAlertTimerangeRelationships getRelationships()
 * @method RealtimeAlertTimerangeRecord|null fetchRecord($primaryVal, array $with = [])
 * @method RealtimeAlertTimerangeRecord|null fetchRecordBy(array $whereEquals, array $with = [])
 * @method RealtimeAlertTimerangeRecord[] fetchRecords(array $primaryVals, array $with = [])
 * @method RealtimeAlertTimerangeRecord[] fetchRecordsBy(array $whereEquals, array $with = [])
 * @method RealtimeAlertTimerangeRecordSet fetchRecordSet(array $primaryVals, array $with = [])
 * @method RealtimeAlertTimerangeRecordSet fetchRecordSetBy(array $whereEquals, array $with = [])
 * @method RealtimeAlertTimerangeSelect select(array $whereEquals = [])
 * @method RealtimeAlertTimerangeRecord newRecord(array $fields = [])
 * @method RealtimeAlertTimerangeRecord[] newRecords(array $fieldSets)
 * @method RealtimeAlertTimerangeRecordSet newRecordSet(array $records = [])
 * @method RealtimeAlertTimerangeRecord turnRowIntoRecord(Row $row, array $with = [])
 * @method RealtimeAlertTimerangeRecord[] turnRowsIntoRecords(array $rows, array $with = [])
 */
class RealtimeAlertTimerange extends Mapper
{
}
