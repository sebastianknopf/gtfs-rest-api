<?php
/**
 * This file remains to the GTFS-REST-API - Copyright (c) 2020.
 *
 * @author Sebastian Knopf
 * @license http://opensource.org/licenses/MIT MIT
 */

declare(strict_types=1);

namespace App\Google\Transit\FeedInfo;

use Atlas\Mapper\RecordSet;

/**
 * @method FeedInfoRecord offsetGet($offset)
 * @method FeedInfoRecord appendNew(array $fields = [])
 * @method FeedInfoRecord|null getOneBy(array $whereEquals)
 * @method FeedInfoRecordSet getAllBy(array $whereEquals)
 * @method FeedInfoRecord|null detachOneBy(array $whereEquals)
 * @method FeedInfoRecordSet detachAllBy(array $whereEquals)
 * @method FeedInfoRecordSet detachAll()
 * @method FeedInfoRecordSet detachDeleted()
 */
class FeedInfoRecordSet extends RecordSet
{
}
