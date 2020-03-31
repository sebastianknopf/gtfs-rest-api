<?php
/**
 * This file remains to the GTFS-REST-API - Copyright (c) 2020.
 *
 * @author Sebastian Knopf
 * @license http://opensource.org/licenses/MIT MIT
 */

declare(strict_types=1);

namespace App\Data\Pathway;

use Atlas\Table\TableSelect;

/**
 * @method PathwayRow|null fetchRow()
 * @method PathwayRow[] fetchRows()
 */
class PathwayTableSelect extends TableSelect
{
}
