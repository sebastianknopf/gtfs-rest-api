<?php
/**
 * This file remains to the GTFS-REST-API - Copyright (c) 2020.
 *
 * @author Sebastian Knopf
 * @license http://opensource.org/licenses/MIT MIT
 */

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
