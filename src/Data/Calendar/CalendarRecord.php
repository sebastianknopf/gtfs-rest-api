<?php
declare(strict_types=1);

namespace App\Data\Calendar;

use Atlas\Mapper\Record;

/**
 * @method CalendarRow getRow()
 */
class CalendarRecord extends Record
{
    use CalendarFields;
}
