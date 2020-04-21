<?php
declare(strict_types=1);

namespace Google\Transit\RealtimeTripUpdate;

use Atlas\Mapper\Record;

/**
 * @method RealtimeTripUpdateRow getRow()
 */
class RealtimeTripUpdateRecord extends Record
{
    use RealtimeTripUpdateFields;
}
