<?php
/**
 * This file remains to the GTFS-REST-API - Copyright (c) 2020.
 *
 * @author Sebastian Knopf
 * @license http://opensource.org/licenses/MIT MIT
 */

declare(strict_types=1);

namespace App\Google\Transit\FeedInfo;

use Atlas\Mapper\Mapper;
use Atlas\Table\Row;

/**
 * @method FeedInfoTable getTable()
 * @method FeedInfoRelationships getRelationships()
 * @method FeedInfoRecord|null fetchRecord($primaryVal, array $with = [])
 * @method FeedInfoRecord|null fetchRecordBy(array $whereEquals, array $with = [])
 * @method FeedInfoRecord[] fetchRecords(array $primaryVals, array $with = [])
 * @method FeedInfoRecord[] fetchRecordsBy(array $whereEquals, array $with = [])
 * @method FeedInfoRecordSet fetchRecordSet(array $primaryVals, array $with = [])
 * @method FeedInfoRecordSet fetchRecordSetBy(array $whereEquals, array $with = [])
 * @method FeedInfoSelect select(array $whereEquals = [])
 * @method FeedInfoRecord newRecord(array $fields = [])
 * @method FeedInfoRecord[] newRecords(array $fieldSets)
 * @method FeedInfoRecordSet newRecordSet(array $records = [])
 * @method FeedInfoRecord turnRowIntoRecord(Row $row, array $with = [])
 * @method FeedInfoRecord[] turnRowsIntoRecords(array $rows, array $with = [])
 */
class FeedInfo extends Mapper
{
}
