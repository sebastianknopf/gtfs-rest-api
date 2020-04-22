<?php
declare(strict_types=1);

namespace App\Google\Transit\RealtimeAlert;

use Atlas\Mapper\RecordSet;

/**
 * @method RealtimeAlertRecord offsetGet($offset)
 * @method RealtimeAlertRecord appendNew(array $fields = [])
 * @method RealtimeAlertRecord|null getOneBy(array $whereEquals)
 * @method RealtimeAlertRecordSet getAllBy(array $whereEquals)
 * @method RealtimeAlertRecord|null detachOneBy(array $whereEquals)
 * @method RealtimeAlertRecordSet detachAllBy(array $whereEquals)
 * @method RealtimeAlertRecordSet detachAll()
 * @method RealtimeAlertRecordSet detachDeleted()
 */
class RealtimeAlertRecordSet extends RecordSet
{
}
