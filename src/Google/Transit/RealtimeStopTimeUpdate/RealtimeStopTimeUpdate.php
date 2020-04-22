<?php
declare(strict_types=1);

namespace App\Google\Transit\RealtimeStopTimeUpdate;

use Atlas\Mapper\Mapper;
use Atlas\Table\Row;

/**
 * @method RealtimeStopTimeUpdateTable getTable()
 * @method RealtimeStopTimeUpdateRelationships getRelationships()
 * @method RealtimeStopTimeUpdateRecord|null fetchRecord($primaryVal, array $with = [])
 * @method RealtimeStopTimeUpdateRecord|null fetchRecordBy(array $whereEquals, array $with = [])
 * @method RealtimeStopTimeUpdateRecord[] fetchRecords(array $primaryVals, array $with = [])
 * @method RealtimeStopTimeUpdateRecord[] fetchRecordsBy(array $whereEquals, array $with = [])
 * @method RealtimeStopTimeUpdateRecordSet fetchRecordSet(array $primaryVals, array $with = [])
 * @method RealtimeStopTimeUpdateRecordSet fetchRecordSetBy(array $whereEquals, array $with = [])
 * @method RealtimeStopTimeUpdateSelect select(array $whereEquals = [])
 * @method RealtimeStopTimeUpdateRecord newRecord(array $fields = [])
 * @method RealtimeStopTimeUpdateRecord[] newRecords(array $fieldSets)
 * @method RealtimeStopTimeUpdateRecordSet newRecordSet(array $records = [])
 * @method RealtimeStopTimeUpdateRecord turnRowIntoRecord(Row $row, array $with = [])
 * @method RealtimeStopTimeUpdateRecord[] turnRowsIntoRecords(array $rows, array $with = [])
 */
class RealtimeStopTimeUpdate extends Mapper
{
}
