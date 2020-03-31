<?php
/**
 * This file remains to the GTFS-REST-API - Copyright (c) 2020.
 *
 * @author Sebastian Knopf
 * @license http://opensource.org/licenses/MIT MIT
 */

declare(strict_types=1);

namespace App\Data\Translation;

use Atlas\Mapper\Mapper;
use Atlas\Table\Row;

/**
 * @method TranslationTable getTable()
 * @method TranslationRelationships getRelationships()
 * @method TranslationRecord|null fetchRecord($primaryVal, array $with = [])
 * @method TranslationRecord|null fetchRecordBy(array $whereEquals, array $with = [])
 * @method TranslationRecord[] fetchRecords(array $primaryVals, array $with = [])
 * @method TranslationRecord[] fetchRecordsBy(array $whereEquals, array $with = [])
 * @method TranslationRecordSet fetchRecordSet(array $primaryVals, array $with = [])
 * @method TranslationRecordSet fetchRecordSetBy(array $whereEquals, array $with = [])
 * @method TranslationSelect select(array $whereEquals = [])
 * @method TranslationRecord newRecord(array $fields = [])
 * @method TranslationRecord[] newRecords(array $fieldSets)
 * @method TranslationRecordSet newRecordSet(array $records = [])
 * @method TranslationRecord turnRowIntoRecord(Row $row, array $with = [])
 * @method TranslationRecord[] turnRowsIntoRecords(array $rows, array $with = [])
 */
class Translation extends Mapper
{
}
