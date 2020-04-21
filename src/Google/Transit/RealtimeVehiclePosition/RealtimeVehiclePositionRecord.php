<?php
declare(strict_types=1);

namespace Google\Transit\RealtimeVehiclePosition;

use Atlas\Mapper\Record;

/**
 * @method RealtimeVehiclePositionRow getRow()
 */
class RealtimeVehiclePositionRecord extends Record
{
    use RealtimeVehiclePositionFields;
}
