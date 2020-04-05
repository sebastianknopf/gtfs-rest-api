<?php
/**
 * This file remains to the GTFS-REST-API - Copyright (c) 2020.
 *
 * @author Sebastian Knopf
 * @license http://opensource.org/licenses/MIT MIT
 */

declare(strict_types=1);

namespace App\Google\Transit\Agency;

use Atlas\Mapper\MapperSelect;

/**
 * @method AgencyRecord|null fetchRecord()
 * @method AgencyRecord[] fetchRecords()
 * @method AgencyRecordSet fetchRecordSet()
 */
class AgencySelect extends MapperSelect
{
}
