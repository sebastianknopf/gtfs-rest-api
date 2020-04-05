<?php
/**
 * This file remains to the GTFS-REST-API - Copyright (c) 2020.
 *
 * @author Sebastian Knopf
 * @license http://opensource.org/licenses/MIT MIT
 */

declare(strict_types=1);

namespace App\Google\Transit\FareAttribute;

use Atlas\Mapper\RecordSet;

/**
 * @method FareAttributeRecord offsetGet($offset)
 * @method FareAttributeRecord appendNew(array $fields = [])
 * @method FareAttributeRecord|null getOneBy(array $whereEquals)
 * @method FareAttributeRecordSet getAllBy(array $whereEquals)
 * @method FareAttributeRecord|null detachOneBy(array $whereEquals)
 * @method FareAttributeRecordSet detachAllBy(array $whereEquals)
 * @method FareAttributeRecordSet detachAll()
 * @method FareAttributeRecordSet detachDeleted()
 */
class FareAttributeRecordSet extends RecordSet
{
}
