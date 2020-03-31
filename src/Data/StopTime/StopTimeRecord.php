<?php
declare(strict_types=1);

namespace App\Data\StopTime;

use Atlas\Mapper\Record;

/**
 * @method StopTimeRow getRow()
 */
class StopTimeRecord extends Record
{
    use StopTimeFields;
}
