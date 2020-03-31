<?php
/**
 * This file remains to the GTFS-REST-API - Copyright (c) 2020.
 *
 * @author Sebastian Knopf
 * @license http://opensource.org/licenses/MIT MIT
 */

declare(strict_types=1);

namespace App\Data\Route;

use Atlas\Mapper\RecordSet;

/**
 * @method RouteRecord offsetGet($offset)
 * @method RouteRecord appendNew(array $fields = [])
 * @method RouteRecord|null getOneBy(array $whereEquals)
 * @method RouteRecordSet getAllBy(array $whereEquals)
 * @method RouteRecord|null detachOneBy(array $whereEquals)
 * @method RouteRecordSet detachAllBy(array $whereEquals)
 * @method RouteRecordSet detachAll()
 * @method RouteRecordSet detachDeleted()
 */
class RouteRecordSet extends RecordSet
{
}
