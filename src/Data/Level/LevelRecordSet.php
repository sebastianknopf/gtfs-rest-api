<?php
declare(strict_types=1);

namespace App\Data\Level;

use Atlas\Mapper\RecordSet;

/**
 * @method LevelRecord offsetGet($offset)
 * @method LevelRecord appendNew(array $fields = [])
 * @method LevelRecord|null getOneBy(array $whereEquals)
 * @method LevelRecordSet getAllBy(array $whereEquals)
 * @method LevelRecord|null detachOneBy(array $whereEquals)
 * @method LevelRecordSet detachAllBy(array $whereEquals)
 * @method LevelRecordSet detachAll()
 * @method LevelRecordSet detachDeleted()
 */
class LevelRecordSet extends RecordSet
{
}
