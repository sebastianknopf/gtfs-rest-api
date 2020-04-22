<?php
declare(strict_types=1);

namespace App\Google\Transit\RealtimeTripUpdate;

use Atlas\Mapper\Mapper;
use Atlas\Table\Row;

/**
 * @method RealtimeTripUpdateTable getTable()
 * @method RealtimeTripUpdateRelationships getRelationships()
 * @method RealtimeTripUpdateRecord|null fetchRecord($primaryVal, array $with = [])
 * @method RealtimeTripUpdateRecord|null fetchRecordBy(array $whereEquals, array $with = [])
 * @method RealtimeTripUpdateRecord[] fetchRecords(array $primaryVals, array $with = [])
 * @method RealtimeTripUpdateRecord[] fetchRecordsBy(array $whereEquals, array $with = [])
 * @method RealtimeTripUpdateRecordSet fetchRecordSet(array $primaryVals, array $with = [])
 * @method RealtimeTripUpdateRecordSet fetchRecordSetBy(array $whereEquals, array $with = [])
 * @method RealtimeTripUpdateSelect select(array $whereEquals = [])
 * @method RealtimeTripUpdateRecord newRecord(array $fields = [])
 * @method RealtimeTripUpdateRecord[] newRecords(array $fieldSets)
 * @method RealtimeTripUpdateRecordSet newRecordSet(array $records = [])
 * @method RealtimeTripUpdateRecord turnRowIntoRecord(Row $row, array $with = [])
 * @method RealtimeTripUpdateRecord[] turnRowsIntoRecords(array $rows, array $with = [])
 */
class RealtimeTripUpdate extends Mapper
{
}
