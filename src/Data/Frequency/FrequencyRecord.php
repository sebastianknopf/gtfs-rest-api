<?php
declare(strict_types=1);

namespace App\Data\Frequency;

use Atlas\Mapper\Record;

/**
 * @method FrequencyRow getRow()
 */
class FrequencyRecord extends Record
{
    use FrequencyFields;
}
