<?php
declare(strict_types=1);

namespace App\Data\Transfer;

use Atlas\Mapper\Record;

/**
 * @method TransferRow getRow()
 */
class TransferRecord extends Record
{
    use TransferFields;
}
