<?php
/**
 * This file remains to the GTFS-REST-API - Copyright (c) 2020.
 *
 * @author Sebastian Knopf
 * @license http://opensource.org/licenses/MIT MIT
 */

declare(strict_types=1);

namespace App\Google\Transit\FareRule;

use Atlas\Mapper\MapperSelect;

/**
 * @method FareRuleRecord|null fetchRecord()
 * @method FareRuleRecord[] fetchRecords()
 * @method FareRuleRecordSet fetchRecordSet()
 */
class FareRuleSelect extends MapperSelect
{
}
