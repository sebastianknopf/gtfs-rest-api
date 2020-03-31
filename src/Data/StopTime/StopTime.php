<?php
declare(strict_types=1);

namespace App\Data\StopTime;

use Atlas\Mapper\Mapper;
use Atlas\Table\Row;

/**
 * @method StopTimeTable getTable()
 * @method StopTimeRelationships getRelationships()
 * @method StopTimeRecord|null fetchRecord($primaryVal, array $with = [])
 * @method StopTimeRecord|null fetchRecordBy(array $whereEquals, array $with = [])
 * @method StopTimeRecord[] fetchRecords(array $primaryVals, array $with = [])
 * @method StopTimeRecord[] fetchRecordsBy(array $whereEquals, array $with = [])
 * @method StopTimeRecordSet fetchRecordSet(array $primaryVals, array $with = [])
 * @method StopTimeRecordSet fetchRecordSetBy(array $whereEquals, array $with = [])
 * @method StopTimeSelect select(array $whereEquals = [])
 * @method StopTimeRecord newRecord(array $fields = [])
 * @method StopTimeRecord[] newRecords(array $fieldSets)
 * @method StopTimeRecordSet newRecordSet(array $records = [])
 * @method StopTimeRecord turnRowIntoRecord(Row $row, array $with = [])
 * @method StopTimeRecord[] turnRowsIntoRecords(array $rows, array $with = [])
 */
class StopTime extends Mapper
{
}
