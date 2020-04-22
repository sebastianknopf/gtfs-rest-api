<?php
declare(strict_types=1);

namespace App\Google\Transit\RealtimeAlertTimerange;

use Atlas\Mapper\Record;

/**
 * @method RealtimeAlertTimerangeRow getRow()
 */
class RealtimeAlertTimerangeRecord extends Record
{
    use RealtimeAlertTimerangeFields;
}
