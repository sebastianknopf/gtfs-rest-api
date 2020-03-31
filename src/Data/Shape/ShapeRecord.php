<?php
declare(strict_types=1);

namespace App\Data\Shape;

use Atlas\Mapper\Record;

/**
 * @method ShapeRow getRow()
 */
class ShapeRecord extends Record
{
    use ShapeFields;
}
