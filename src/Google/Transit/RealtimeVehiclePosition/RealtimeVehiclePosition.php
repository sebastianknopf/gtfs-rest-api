<?php
declare(strict_types=1);

namespace Google\Transit\RealtimeVehiclePosition;

use Atlas\Mapper\Mapper;
use Atlas\Table\Row;

/**
 * @method RealtimeVehiclePositionTable getTable()
 * @method RealtimeVehiclePositionRelationships getRelationships()
 * @method RealtimeVehiclePositionRecord|null fetchRecord($primaryVal, array $with = [])
 * @method RealtimeVehiclePositionRecord|null fetchRecordBy(array $whereEquals, array $with = [])
 * @method RealtimeVehiclePositionRecord[] fetchRecords(array $primaryVals, array $with = [])
 * @method RealtimeVehiclePositionRecord[] fetchRecordsBy(array $whereEquals, array $with = [])
 * @method RealtimeVehiclePositionRecordSet fetchRecordSet(array $primaryVals, array $with = [])
 * @method RealtimeVehiclePositionRecordSet fetchRecordSetBy(array $whereEquals, array $with = [])
 * @method RealtimeVehiclePositionSelect select(array $whereEquals = [])
 * @method RealtimeVehiclePositionRecord newRecord(array $fields = [])
 * @method RealtimeVehiclePositionRecord[] newRecords(array $fieldSets)
 * @method RealtimeVehiclePositionRecordSet newRecordSet(array $records = [])
 * @method RealtimeVehiclePositionRecord turnRowIntoRecord(Row $row, array $with = [])
 * @method RealtimeVehiclePositionRecord[] turnRowsIntoRecords(array $rows, array $with = [])
 */
class RealtimeVehiclePosition extends Mapper
{
}
