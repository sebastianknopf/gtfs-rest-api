<?php
/**
 * This file remains to the GTFS-REST-API - Copyright (c) 2020.
 *
 * @author Sebastian Knopf
 * @license http://opensource.org/licenses/MIT MIT
 */

declare(strict_types=1);

namespace App\Google\Transit\Agency;

use Atlas\Mapper\Mapper;
use Atlas\Table\Row;

/**
 * @method AgencyTable getTable()
 * @method AgencyRelationships getRelationships()
 * @method AgencyRecord|null fetchRecord($primaryVal, array $with = [])
 * @method AgencyRecord|null fetchRecordBy(array $whereEquals, array $with = [])
 * @method AgencyRecord[] fetchRecords(array $primaryVals, array $with = [])
 * @method AgencyRecord[] fetchRecordsBy(array $whereEquals, array $with = [])
 * @method AgencyRecordSet fetchRecordSet(array $primaryVals, array $with = [])
 * @method AgencyRecordSet fetchRecordSetBy(array $whereEquals, array $with = [])
 * @method AgencySelect select(array $whereEquals = [])
 * @method AgencyRecord newRecord(array $fields = [])
 * @method AgencyRecord[] newRecords(array $fieldSets)
 * @method AgencyRecordSet newRecordSet(array $records = [])
 * @method AgencyRecord turnRowIntoRecord(Row $row, array $with = [])
 * @method AgencyRecord[] turnRowsIntoRecords(array $rows, array $with = [])
 */
class Agency extends Mapper
{
}
