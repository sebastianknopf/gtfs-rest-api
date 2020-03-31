<?php
/**
 * This file remains to the GTFS-REST-API - Copyright (c) 2020.
 *
 * @author Sebastian Knopf
 * @license http://opensource.org/licenses/MIT MIT
 */

declare(strict_types=1);

namespace App\Data\Frequency;

use Atlas\Mapper\Mapper;
use Atlas\Table\Row;

/**
 * @method FrequencyTable getTable()
 * @method FrequencyRelationships getRelationships()
 * @method FrequencyRecord|null fetchRecord($primaryVal, array $with = [])
 * @method FrequencyRecord|null fetchRecordBy(array $whereEquals, array $with = [])
 * @method FrequencyRecord[] fetchRecords(array $primaryVals, array $with = [])
 * @method FrequencyRecord[] fetchRecordsBy(array $whereEquals, array $with = [])
 * @method FrequencyRecordSet fetchRecordSet(array $primaryVals, array $with = [])
 * @method FrequencyRecordSet fetchRecordSetBy(array $whereEquals, array $with = [])
 * @method FrequencySelect select(array $whereEquals = [])
 * @method FrequencyRecord newRecord(array $fields = [])
 * @method FrequencyRecord[] newRecords(array $fieldSets)
 * @method FrequencyRecordSet newRecordSet(array $records = [])
 * @method FrequencyRecord turnRowIntoRecord(Row $row, array $with = [])
 * @method FrequencyRecord[] turnRowsIntoRecords(array $rows, array $with = [])
 */
class Frequency extends Mapper
{
}
