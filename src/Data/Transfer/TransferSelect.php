<?php
/**
 * This file remains to the GTFS-REST-API - Copyright (c) 2020.
 *
 * @author Sebastian Knopf
 * @license http://opensource.org/licenses/MIT MIT
 */

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
