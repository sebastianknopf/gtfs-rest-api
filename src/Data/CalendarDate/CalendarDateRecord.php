<?php
declare(strict_types=1);

namespace App\Data\CalendarDate;

use Atlas\Mapper\Record;

/**
 * @method CalendarDateRow getRow()
 */
class CalendarDateRecord extends Record
{
    use CalendarDateFields;
}
