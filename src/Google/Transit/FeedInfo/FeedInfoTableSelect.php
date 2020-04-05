<?php
/**
 * This file remains to the GTFS-REST-API - Copyright (c) 2020.
 *
 * @author Sebastian Knopf
 * @license http://opensource.org/licenses/MIT MIT
 */

declare(strict_types=1);

namespace App\Google\Transit\FeedInfo;

use Atlas\Table\TableSelect;

/**
 * @method FeedInfoRow|null fetchRow()
 * @method FeedInfoRow[] fetchRows()
 */
class FeedInfoTableSelect extends TableSelect
{
}
