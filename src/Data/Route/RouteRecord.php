<?php
declare(strict_types=1);

namespace App\Data\Route;

use Atlas\Mapper\Record;

/**
 * @method RouteRow getRow()
 */
class RouteRecord extends Record
{
    use RouteFields;
}
