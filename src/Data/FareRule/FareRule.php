<?php
declare(strict_types=1);

namespace App\Data\FareRule;

use Atlas\Mapper\Mapper;
use Atlas\Table\Row;

/**
 * @method FareRuleTable getTable()
 * @method FareRuleRelationships getRelationships()
 * @method FareRuleRecord|null fetchRecord($primaryVal, array $with = [])
 * @method FareRuleRecord|null fetchRecordBy(array $whereEquals, array $with = [])
 * @method FareRuleRecord[] fetchRecords(array $primaryVals, array $with = [])
 * @method FareRuleRecord[] fetchRecordsBy(array $whereEquals, array $with = [])
 * @method FareRuleRecordSet fetchRecordSet(array $primaryVals, array $with = [])
 * @method FareRuleRecordSet fetchRecordSetBy(array $whereEquals, array $with = [])
 * @method FareRuleSelect select(array $whereEquals = [])
 * @method FareRuleRecord newRecord(array $fields = [])
 * @method FareRuleRecord[] newRecords(array $fieldSets)
 * @method FareRuleRecordSet newRecordSet(array $records = [])
 * @method FareRuleRecord turnRowIntoRecord(Row $row, array $with = [])
 * @method FareRuleRecord[] turnRowsIntoRecords(array $rows, array $with = [])
 */
class FareRule extends Mapper
{
}
