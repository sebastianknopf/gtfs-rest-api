<?php
/**
 * This file remains to the GTFS-REST-API - Copyright (c) 2020.
 *
 * @author Sebastian Knopf
 * @license http://opensource.org/licenses/MIT MIT
 */

declare(strict_types=1);

namespace App\Google\Transit\Frequency;

use Atlas\Table\TableSelect;

/**
 * @method FrequencyRow|null fetchRow()
 * @method FrequencyRow[] fetchRows()
 */
class FrequencyTableSelect extends TableSelect
{
}
