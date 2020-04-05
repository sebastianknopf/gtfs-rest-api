<?php
/**
 * This file remains to the GTFS-REST-API - Copyright (c) 2020.
 *
 * @author Sebastian Knopf
 * @license http://opensource.org/licenses/MIT MIT
 */

declare(strict_types=1);

namespace App\Google\Transit\Trip;

use Atlas\Mapper\Record;

/**
 * @method TripRow getRow()
 */
class TripRecord extends Record
{
    use TripFields;
}
