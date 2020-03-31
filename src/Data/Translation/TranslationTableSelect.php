<?php
/**
 * This file remains to the GTFS-REST-API - Copyright (c) 2020.
 *
 * @author Sebastian Knopf
 * @license http://opensource.org/licenses/MIT MIT
 */

declare(strict_types=1);

namespace App\Data\Translation;

use Atlas\Table\TableSelect;

/**
 * @method TranslationRow|null fetchRow()
 * @method TranslationRow[] fetchRows()
 */
class TranslationTableSelect extends TableSelect
{
}
