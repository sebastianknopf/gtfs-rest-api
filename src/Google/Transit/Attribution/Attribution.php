<?php
/**
 * This file remains to the GTFS-REST-API - Copyright (c) 2020.
 *
 * @author Sebastian Knopf
 * @license http://opensource.org/licenses/MIT MIT
 */

declare(strict_types=1);

namespace App\Google\Transit\Attribution;

use Atlas\Mapper\Mapper;
use Atlas\Table\Row;

/**
 * @method AttributionTable getTable()
 * @method AttributionRelationships getRelationships()
 * @method AttributionRecord|null fetchRecord($primaryVal, array $with = [])
 * @method AttributionRecord|null fetchRecordBy(array $whereEquals, array $with = [])
 * @method AttributionRecord[] fetchRecords(array $primaryVals, array $with = [])
 * @method AttributionRecord[] fetchRecordsBy(array $whereEquals, array $with = [])
 * @method AttributionRecordSet fetchRecordSet(array $primaryVals, array $with = [])
 * @method AttributionRecordSet fetchRecordSetBy(array $whereEquals, array $with = [])
 * @method AttributionSelect select(array $whereEquals = [])
 * @method AttributionRecord newRecord(array $fields = [])
 * @method AttributionRecord[] newRecords(array $fieldSets)
 * @method AttributionRecordSet newRecordSet(array $records = [])
 * @method AttributionRecord turnRowIntoRecord(Row $row, array $with = [])
 * @method AttributionRecord[] turnRowsIntoRecords(array $rows, array $with = [])
 */
class Attribution extends Mapper
{
}
