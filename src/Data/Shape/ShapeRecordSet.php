<?php
declare(strict_types=1);

namespace App\Data\Shape;

use Atlas\Mapper\RecordSet;

/**
 * @method ShapeRecord offsetGet($offset)
 * @method ShapeRecord appendNew(array $fields = [])
 * @method ShapeRecord|null getOneBy(array $whereEquals)
 * @method ShapeRecordSet getAllBy(array $whereEquals)
 * @method ShapeRecord|null detachOneBy(array $whereEquals)
 * @method ShapeRecordSet detachAllBy(array $whereEquals)
 * @method ShapeRecordSet detachAll()
 * @method ShapeRecordSet detachDeleted()
 */
class ShapeRecordSet extends RecordSet
{
}
