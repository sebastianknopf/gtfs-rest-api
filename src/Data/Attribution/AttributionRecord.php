<?php
declare(strict_types=1);

namespace App\Data\Attribution;

use Atlas\Mapper\Record;

/**
 * @method AttributionRow getRow()
 */
class AttributionRecord extends Record
{
    use AttributionFields;
}
