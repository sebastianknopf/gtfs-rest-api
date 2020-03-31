<?php
declare(strict_types=1);

namespace App\Data\Trip;

use Atlas\Mapper\Record;

/**
 * @method TripRow getRow()
 */
class TripRecord extends Record
{
    use TripFields;
}
