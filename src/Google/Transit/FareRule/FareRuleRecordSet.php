<?php
/**
 * This file remains to the GTFS-REST-API - Copyright (c) 2020.
 *
 * @author Sebastian Knopf
 * @license http://opensource.org/licenses/MIT MIT
 */

declare(strict_types=1);

namespace App\Google\Transit\FareRule;

use Atlas\Mapper\RecordSet;

/**
 * @method FareRuleRecord offsetGet($offset)
 * @method FareRuleRecord appendNew(array $fields = [])
 * @method FareRuleRecord|null getOneBy(array $whereEquals)
 * @method FareRuleRecordSet getAllBy(array $whereEquals)
 * @method FareRuleRecord|null detachOneBy(array $whereEquals)
 * @method FareRuleRecordSet detachAllBy(array $whereEquals)
 * @method FareRuleRecordSet detachAll()
 * @method FareRuleRecordSet detachDeleted()
 */
class FareRuleRecordSet extends RecordSet
{
}
