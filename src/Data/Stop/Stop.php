<?php
declare(strict_types=1);

namespace App\Data\Stop;

use Atlas\Mapper\Mapper;
use Atlas\Table\Row;

/**
 * @method StopTable getTable()
 * @method StopRelationships getRelationships()
 * @method StopRecord|null fetchRecord($primaryVal, array $with = [])
 * @method StopRecord|null fetchRecordBy(array $whereEquals, array $with = [])
 * @method StopRecord[] fetchRecords(array $primaryVals, array $with = [])
 * @method StopRecord[] fetchRecordsBy(array $whereEquals, array $with = [])
 * @method StopRecordSet fetchRecordSet(array $primaryVals, array $with = [])
 * @method StopRecordSet fetchRecordSetBy(array $whereEquals, array $with = [])
 * @method StopSelect select(array $whereEquals = [])
 * @method StopRecord newRecord(array $fields = [])
 * @method StopRecord[] newRecords(array $fieldSets)
 * @method StopRecordSet newRecordSet(array $records = [])
 * @method StopRecord turnRowIntoRecord(Row $row, array $with = [])
 * @method StopRecord[] turnRowsIntoRecords(array $rows, array $with = [])
 */
class Stop extends Mapper
{
}
