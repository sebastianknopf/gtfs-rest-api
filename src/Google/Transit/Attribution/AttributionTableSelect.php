<?php
/**
 * This file remains to the GTFS-REST-API - Copyright (c) 2020.
 *
 * @author Sebastian Knopf
 * @license http://opensource.org/licenses/MIT MIT
 */

declare(strict_types=1);

namespace App\Google\Transit\Attribution;

use Atlas\Table\TableSelect;

/**
 * @method AttributionRow|null fetchRow()
 * @method AttributionRow[] fetchRows()
 */
class AttributionTableSelect extends TableSelect
{
}
