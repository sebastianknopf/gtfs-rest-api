<?php
/**
 * This file remains to the GTFS-REST-API - Copyright (c) 2020.
 *
 * @author Sebastian Knopf
 * @license http://opensource.org/licenses/MIT MIT
 */

declare(strict_types=1);

namespace App\Data\Route;

use Atlas\Mapper\Mapper;
use Atlas\Table\Row;

/**
 * @method RouteTable getTable()
 * @method RouteRelationships getRelationships()
 * @method RouteRecord|null fetchRecord($primaryVal, array $with = [])
 * @method RouteRecord|null fetchRecordBy(array $whereEquals, array $with = [])
 * @method RouteRecord[] fetchRecords(array $primaryVals, array $with = [])
 * @method RouteRecord[] fetchRecordsBy(array $whereEquals, array $with = [])
 * @method RouteRecordSet fetchRecordSet(array $primaryVals, array $with = [])
 * @method RouteRecordSet fetchRecordSetBy(array $whereEquals, array $with = [])
 * @method RouteSelect select(array $whereEquals = [])
 * @method RouteRecord newRecord(array $fields = [])
 * @method RouteRecord[] newRecords(array $fieldSets)
 * @method RouteRecordSet newRecordSet(array $records = [])
 * @method RouteRecord turnRowIntoRecord(Row $row, array $with = [])
 * @method RouteRecord[] turnRowsIntoRecords(array $rows, array $with = [])
 */
class Route extends Mapper
{
}
