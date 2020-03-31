<?php
declare(strict_types=1);

namespace App\Data\Stop;

use Atlas\Mapper\Record;

/**
 * @method StopRow getRow()
 */
class StopRecord extends Record
{
    use StopFields;
}
