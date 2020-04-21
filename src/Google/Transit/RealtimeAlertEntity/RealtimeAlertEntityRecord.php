<?php
declare(strict_types=1);

namespace Google\Transit\RealtimeAlertEntity;

use Atlas\Mapper\Record;

/**
 * @method RealtimeAlertEntityRow getRow()
 */
class RealtimeAlertEntityRecord extends Record
{
    use RealtimeAlertEntityFields;
}
