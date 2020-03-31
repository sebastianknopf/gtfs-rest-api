<?php
declare(strict_types=1);

namespace App\Data\Attribution;

use Atlas\Mapper\RecordSet;

/**
 * @method AttributionRecord offsetGet($offset)
 * @method AttributionRecord appendNew(array $fields = [])
 * @method AttributionRecord|null getOneBy(array $whereEquals)
 * @method AttributionRecordSet getAllBy(array $whereEquals)
 * @method AttributionRecord|null detachOneBy(array $whereEquals)
 * @method AttributionRecordSet detachAllBy(array $whereEquals)
 * @method AttributionRecordSet detachAll()
 * @method AttributionRecordSet detachDeleted()
 */
class AttributionRecordSet extends RecordSet
{
}
