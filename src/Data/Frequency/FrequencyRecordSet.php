<?php
declare(strict_types=1);

namespace App\Data\Frequency;

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
