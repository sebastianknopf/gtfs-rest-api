<?php
declare(strict_types=1);

namespace App\Data\FareAttribute;

use Atlas\Mapper\Record;

/**
 * @method FareAttributeRow getRow()
 */
class FareAttributeRecord extends Record
{
    use FareAttributeFields;
}
