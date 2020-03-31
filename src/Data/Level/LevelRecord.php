<?php
declare(strict_types=1);

namespace App\Data\Level;

use Atlas\Mapper\Record;

/**
 * @method LevelRow getRow()
 */
class LevelRecord extends Record
{
    use LevelFields;
}
