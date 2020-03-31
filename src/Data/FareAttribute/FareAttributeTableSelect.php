<?php
/**
 * This file remains to the GTFS-REST-API - Copyright (c) 2020.
 *
 * @author Sebastian Knopf
 * @license http://opensource.org/licenses/MIT MIT
 */

declare(strict_types=1);

namespace App\Data\FareAttribute;

use Atlas\Table\TableSelect;

/**
 * @method FareAttributeRow|null fetchRow()
 * @method FareAttributeRow[] fetchRows()
 */
class FareAttributeTableSelect extends TableSelect
{
}
