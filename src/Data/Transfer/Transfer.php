<?php
/**
 * This file remains to the GTFS-REST-API - Copyright (c) 2020.
 *
 * @author Sebastian Knopf
 * @license http://opensource.org/licenses/MIT MIT
 */

declare(strict_types=1);

namespace App\Data\Transfer;

use Atlas\Mapper\Mapper;
use Atlas\Table\Row;

/**
 * @method TransferTable getTable()
 * @method TransferRelationships getRelationships()
 * @method TransferRecord|null fetchRecord($primaryVal, array $with = [])
 * @method TransferRecord|null fetchRecordBy(array $whereEquals, array $with = [])
 * @method TransferRecord[] fetchRecords(array $primaryVals, array $with = [])
 * @method TransferRecord[] fetchRecordsBy(array $whereEquals, array $with = [])
 * @method TransferRecordSet fetchRecordSet(array $primaryVals, array $with = [])
 * @method TransferRecordSet fetchRecordSetBy(array $whereEquals, array $with = [])
 * @method TransferSelect select(array $whereEquals = [])
 * @method TransferRecord newRecord(array $fields = [])
 * @method TransferRecord[] newRecords(array $fieldSets)
 * @method TransferRecordSet newRecordSet(array $records = [])
 * @method TransferRecord turnRowIntoRecord(Row $row, array $with = [])
 * @method TransferRecord[] turnRowsIntoRecords(array $rows, array $with = [])
 */
class Transfer extends Mapper
{
}
