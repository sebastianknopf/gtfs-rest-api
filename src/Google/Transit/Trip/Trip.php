<?php
/**
 * This file remains to the GTFS-REST-API - Copyright (c) 2020.
 *
 * @author Sebastian Knopf
 * @license http://opensource.org/licenses/MIT MIT
 */

declare(strict_types=1);

namespace App\Google\Transit\Trip;

use Atlas\Mapper\Mapper;
use Atlas\Table\Row;

/**
 * @method TripTable getTable()
 * @method TripRelationships getRelationships()
 * @method TripRecord|null fetchRecord($primaryVal, array $with = [])
 * @method TripRecord|null fetchRecordBy(array $whereEquals, array $with = [])
 * @method TripRecord[] fetchRecords(array $primaryVals, array $with = [])
 * @method TripRecord[] fetchRecordsBy(array $whereEquals, array $with = [])
 * @method TripRecordSet fetchRecordSet(array $primaryVals, array $with = [])
 * @method TripRecordSet fetchRecordSetBy(array $whereEquals, array $with = [])
 * @method TripSelect select(array $whereEquals = [])
 * @method TripRecord newRecord(array $fields = [])
 * @method TripRecord[] newRecords(array $fieldSets)
 * @method TripRecordSet newRecordSet(array $records = [])
 * @method TripRecord turnRowIntoRecord(Row $row, array $with = [])
 * @method TripRecord[] turnRowsIntoRecords(array $rows, array $with = [])
 */
class Trip extends Mapper
{
}
