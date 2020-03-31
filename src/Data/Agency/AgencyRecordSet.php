<?php
declare(strict_types=1);

namespace App\Data\Agency;

use Atlas\Mapper\RecordSet;

/**
 * @method AgencyRecord offsetGet($offset)
 * @method AgencyRecord appendNew(array $fields = [])
 * @method AgencyRecord|null getOneBy(array $whereEquals)
 * @method AgencyRecordSet getAllBy(array $whereEquals)
 * @method AgencyRecord|null detachOneBy(array $whereEquals)
 * @method AgencyRecordSet detachAllBy(array $whereEquals)
 * @method AgencyRecordSet detachAll()
 * @method AgencyRecordSet detachDeleted()
 */
class AgencyRecordSet extends RecordSet
{
}
