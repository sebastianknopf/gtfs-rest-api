<?php
declare(strict_types=1);

namespace App\Data\Pathway;

use Atlas\Mapper\Mapper;
use Atlas\Table\Row;

/**
 * @method PathwayTable getTable()
 * @method PathwayRelationships getRelationships()
 * @method PathwayRecord|null fetchRecord($primaryVal, array $with = [])
 * @method PathwayRecord|null fetchRecordBy(array $whereEquals, array $with = [])
 * @method PathwayRecord[] fetchRecords(array $primaryVals, array $with = [])
 * @method PathwayRecord[] fetchRecordsBy(array $whereEquals, array $with = [])
 * @method PathwayRecordSet fetchRecordSet(array $primaryVals, array $with = [])
 * @method PathwayRecordSet fetchRecordSetBy(array $whereEquals, array $with = [])
 * @method PathwaySelect select(array $whereEquals = [])
 * @method PathwayRecord newRecord(array $fields = [])
 * @method PathwayRecord[] newRecords(array $fieldSets)
 * @method PathwayRecordSet newRecordSet(array $records = [])
 * @method PathwayRecord turnRowIntoRecord(Row $row, array $with = [])
 * @method PathwayRecord[] turnRowsIntoRecords(array $rows, array $with = [])
 */
class Pathway extends Mapper
{
}
