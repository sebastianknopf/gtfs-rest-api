<?php
declare(strict_types=1);

namespace App\Data\Transfer;

use Atlas\Mapper\MapperSelect;

/**
 * @method TransferRecord|null fetchRecord()
 * @method TransferRecord[] fetchRecords()
 * @method TransferRecordSet fetchRecordSet()
 */
class TransferSelect extends MapperSelect
{
}
