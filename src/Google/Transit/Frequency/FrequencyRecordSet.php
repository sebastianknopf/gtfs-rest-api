<?php
/**
 * This file remains to the GTFS-REST-API - Copyright (c) 2020.
 *
 * @author Sebastian Knopf
 * @license http://opensource.org/licenses/MIT MIT
 */

declare(strict_types=1);

namespace App\Google\Transit\Frequency;

use Atlas\Mapper\RecordSet;

/**
 * @method FrequencyRecord offsetGet($offset)
 * @method FrequencyRecord appendNew(array $fields = [])
 * @method FrequencyRecord|null getOneBy(array $whereEquals)
 * @method FrequencyRecordSet getAllBy(array $whereEquals)
 * @method FrequencyRecord|null detachOneBy(array $whereEquals)
 * @method FrequencyRecordSet detachAllBy(array $whereEquals)
 * @method FrequencyRecordSet detachAll()
 * @method FrequencyRecordSet detachDeleted()
 */
class FrequencyRecordSet extends RecordSet
{
}
