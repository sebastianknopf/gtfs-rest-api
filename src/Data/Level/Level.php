<?php
declare(strict_types=1);

namespace App\Data\Level;

use Atlas\Mapper\Mapper;
use Atlas\Table\Row;

/**
 * @method LevelTable getTable()
 * @method LevelRelationships getRelationships()
 * @method LevelRecord|null fetchRecord($primaryVal, array $with = [])
 * @method LevelRecord|null fetchRecordBy(array $whereEquals, array $with = [])
 * @method LevelRecord[] fetchRecords(array $primaryVals, array $with = [])
 * @method LevelRecord[] fetchRecordsBy(array $whereEquals, array $with = [])
 * @method LevelRecordSet fetchRecordSet(array $primaryVals, array $with = [])
 * @method LevelRecordSet fetchRecordSetBy(array $whereEquals, array $with = [])
 * @method LevelSelect select(array $whereEquals = [])
 * @method LevelRecord newRecord(array $fields = [])
 * @method LevelRecord[] newRecords(array $fieldSets)
 * @method LevelRecordSet newRecordSet(array $records = [])
 * @method LevelRecord turnRowIntoRecord(Row $row, array $with = [])
 * @method LevelRecord[] turnRowsIntoRecords(array $rows, array $with = [])
 */
class Level extends Mapper
{
}
