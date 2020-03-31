<?php
declare(strict_types=1);

namespace App\Data\Shape;

use Atlas\Mapper\Mapper;
use Atlas\Table\Row;

/**
 * @method ShapeTable getTable()
 * @method ShapeRelationships getRelationships()
 * @method ShapeRecord|null fetchRecord($primaryVal, array $with = [])
 * @method ShapeRecord|null fetchRecordBy(array $whereEquals, array $with = [])
 * @method ShapeRecord[] fetchRecords(array $primaryVals, array $with = [])
 * @method ShapeRecord[] fetchRecordsBy(array $whereEquals, array $with = [])
 * @method ShapeRecordSet fetchRecordSet(array $primaryVals, array $with = [])
 * @method ShapeRecordSet fetchRecordSetBy(array $whereEquals, array $with = [])
 * @method ShapeSelect select(array $whereEquals = [])
 * @method ShapeRecord newRecord(array $fields = [])
 * @method ShapeRecord[] newRecords(array $fieldSets)
 * @method ShapeRecordSet newRecordSet(array $records = [])
 * @method ShapeRecord turnRowIntoRecord(Row $row, array $with = [])
 * @method ShapeRecord[] turnRowsIntoRecords(array $rows, array $with = [])
 */
class Shape extends Mapper
{
}
