<?php
/**
 * This file remains to the GTFS-REST-API - Copyright (c) 2020.
 *
 * @author Sebastian Knopf
 * @license http://opensource.org/licenses/MIT MIT
 */

declare(strict_types=1);

namespace App\Google\Transit\Trip;

use Atlas\Mapper\RecordSet;

/**
 * @method TripRecord offsetGet($offset)
 * @method TripRecord appendNew(array $fields = [])
 * @method TripRecord|null getOneBy(array $whereEquals)
 * @method TripRecordSet getAllBy(array $whereEquals)
 * @method TripRecord|null detachOneBy(array $whereEquals)
 * @method TripRecordSet detachAllBy(array $whereEquals)
 * @method TripRecordSet detachAll()
 * @method TripRecordSet detachDeleted()
 */
class TripRecordSet extends RecordSet
{
}
