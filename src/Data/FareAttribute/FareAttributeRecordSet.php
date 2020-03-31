<?php
declare(strict_types=1);

namespace App\Data\FareAttribute;

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
