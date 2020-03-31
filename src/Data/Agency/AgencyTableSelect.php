<?php
/**
 * This file remains to the GTFS-REST-API - Copyright (c) 2020.
 *
 * @author Sebastian Knopf
 * @license http://opensource.org/licenses/MIT MIT
 */

declare(strict_types=1);

namespace App\Data\Agency;

use Atlas\Table\TableSelect;

/**
 * @method AgencyRow|null fetchRow()
 * @method AgencyRow[] fetchRows()
 */
class AgencyTableSelect extends TableSelect
{
}
