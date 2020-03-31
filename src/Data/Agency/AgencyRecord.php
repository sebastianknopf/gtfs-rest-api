<?php
declare(strict_types=1);

namespace App\Data\Agency;

use Atlas\Mapper\Record;

/**
 * @method AgencyRow getRow()
 */
class AgencyRecord extends Record
{
    use AgencyFields;
}
