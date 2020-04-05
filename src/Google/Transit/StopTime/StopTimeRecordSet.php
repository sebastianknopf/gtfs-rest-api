<?php
/**
 * This file remains to the GTFS-REST-API - Copyright (c) 2020.
 *
 * @author Sebastian Knopf
 * @license http://opensource.org/licenses/MIT MIT
 */

declare(strict_types=1);

namespace App\Google\Transit\StopTime;

use Atlas\Mapper\RecordSet;

/**
 * @method StopTimeRecord offsetGet($offset)
 * @method StopTimeRecord appendNew(array $fields = [])
 * @method StopTimeRecord|null getOneBy(array $whereEquals)
 * @method StopTimeRecordSet getAllBy(array $whereEquals)
 * @method StopTimeRecord|null detachOneBy(array $whereEquals)
 * @method StopTimeRecordSet detachAllBy(array $whereEquals)
 * @method StopTimeRecordSet detachAll()
 * @method StopTimeRecordSet detachDeleted()
 */
class StopTimeRecordSet extends RecordSet
{
}
