<?php
/**
 * This file remains to the GTFS-REST-API - Copyright (c) 2020.
 *
 * @author Sebastian Knopf
 * @license http://opensource.org/licenses/MIT MIT
 */

declare(strict_types=1);

namespace App\Google\Transit\Transfer;

use Atlas\Mapper\RecordSet;

/**
 * @method TransferRecord offsetGet($offset)
 * @method TransferRecord appendNew(array $fields = [])
 * @method TransferRecord|null getOneBy(array $whereEquals)
 * @method TransferRecordSet getAllBy(array $whereEquals)
 * @method TransferRecord|null detachOneBy(array $whereEquals)
 * @method TransferRecordSet detachAllBy(array $whereEquals)
 * @method TransferRecordSet detachAll()
 * @method TransferRecordSet detachDeleted()
 */
class TransferRecordSet extends RecordSet
{
}
