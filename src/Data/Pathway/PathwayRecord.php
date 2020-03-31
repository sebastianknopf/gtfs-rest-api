<?php
declare(strict_types=1);

namespace App\Data\Pathway;

use Atlas\Mapper\Record;

/**
 * @method PathwayRow getRow()
 */
class PathwayRecord extends Record
{
    use PathwayFields;
}
