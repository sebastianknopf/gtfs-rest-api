<?php
declare(strict_types=1);

namespace App\Google\Transit\RealtimeStopTimeUpdate;

use Atlas\Mapper\Record;

/**
 * @method RealtimeStopTimeUpdateRow getRow()
 */
class RealtimeStopTimeUpdateRecord extends Record
{
    use RealtimeStopTimeUpdateFields;
}
