<?php
declare(strict_types=1);

namespace App\Google\Transit\RealtimeAlert;

use Atlas\Mapper\Record;

/**
 * @method RealtimeAlertRow getRow()
 */
class RealtimeAlertRecord extends Record
{
    use RealtimeAlertFields;
}
