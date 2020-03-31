<?php
/**
 * This file remains to the GTFS-REST-API - Copyright (c) 2020.
 *
 * @author Sebastian Knopf
 * @license http://opensource.org/licenses/MIT MIT
 */

declare(strict_types=1);

namespace App\Data\Pathway;

use Atlas\Mapper\RecordSet;

/**
 * @method PathwayRecord offsetGet($offset)
 * @method PathwayRecord appendNew(array $fields = [])
 * @method PathwayRecord|null getOneBy(array $whereEquals)
 * @method PathwayRecordSet getAllBy(array $whereEquals)
 * @method PathwayRecord|null detachOneBy(array $whereEquals)
 * @method PathwayRecordSet detachAllBy(array $whereEquals)
 * @method PathwayRecordSet detachAll()
 * @method PathwayRecordSet detachDeleted()
 */
class PathwayRecordSet extends RecordSet
{
}
