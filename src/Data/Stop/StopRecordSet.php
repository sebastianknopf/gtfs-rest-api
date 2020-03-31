<?php
/**
 * This file remains to the GTFS-REST-API - Copyright (c) 2020.
 *
 * @author Sebastian Knopf
 * @license http://opensource.org/licenses/MIT MIT
 */

declare(strict_types=1);

namespace App\Data\Stop;

use Atlas\Mapper\RecordSet;

/**
 * @method StopRecord offsetGet($offset)
 * @method StopRecord appendNew(array $fields = [])
 * @method StopRecord|null getOneBy(array $whereEquals)
 * @method StopRecordSet getAllBy(array $whereEquals)
 * @method StopRecord|null detachOneBy(array $whereEquals)
 * @method StopRecordSet detachAllBy(array $whereEquals)
 * @method StopRecordSet detachAll()
 * @method StopRecordSet detachDeleted()
 */
class StopRecordSet extends RecordSet
{
}
