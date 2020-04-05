<?php
/**
 * This file remains to the GTFS-REST-API - Copyright (c) 2020.
 *
 * @author Sebastian Knopf
 * @license http://opensource.org/licenses/MIT MIT
 */

declare(strict_types=1);

namespace App\Google\Transit\FareAttribute;

use Atlas\Mapper\Mapper;
use Atlas\Table\Row;

/**
 * @method FareAttributeTable getTable()
 * @method FareAttributeRelationships getRelationships()
 * @method FareAttributeRecord|null fetchRecord($primaryVal, array $with = [])
 * @method FareAttributeRecord|null fetchRecordBy(array $whereEquals, array $with = [])
 * @method FareAttributeRecord[] fetchRecords(array $primaryVals, array $with = [])
 * @method FareAttributeRecord[] fetchRecordsBy(array $whereEquals, array $with = [])
 * @method FareAttributeRecordSet fetchRecordSet(array $primaryVals, array $with = [])
 * @method FareAttributeRecordSet fetchRecordSetBy(array $whereEquals, array $with = [])
 * @method FareAttributeSelect select(array $whereEquals = [])
 * @method FareAttributeRecord newRecord(array $fields = [])
 * @method FareAttributeRecord[] newRecords(array $fieldSets)
 * @method FareAttributeRecordSet newRecordSet(array $records = [])
 * @method FareAttributeRecord turnRowIntoRecord(Row $row, array $with = [])
 * @method FareAttributeRecord[] turnRowsIntoRecords(array $rows, array $with = [])
 */
class FareAttribute extends Mapper
{
}
