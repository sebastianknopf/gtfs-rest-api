<?php
declare(strict_types=1);

namespace App\Data\Route;

use Atlas\Mapper\MapperSelect;

/**
 * @method RouteRecord|null fetchRecord()
 * @method RouteRecord[] fetchRecords()
 * @method RouteRecordSet fetchRecordSet()
 */
class RouteSelect extends MapperSelect
{
}
