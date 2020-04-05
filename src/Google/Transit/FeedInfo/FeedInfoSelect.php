<?php
/**
 * This file remains to the GTFS-REST-API - Copyright (c) 2020.
 *
 * @author Sebastian Knopf
 * @license http://opensource.org/licenses/MIT MIT
 */

declare(strict_types=1);

namespace App\Google\Transit\FeedInfo;

use Atlas\Mapper\MapperSelect;

/**
 * @method FeedInfoRecord|null fetchRecord()
 * @method FeedInfoRecord[] fetchRecords()
 * @method FeedInfoRecordSet fetchRecordSet()
 */
class FeedInfoSelect extends MapperSelect
{
}
