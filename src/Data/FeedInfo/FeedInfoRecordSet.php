<?php
declare(strict_types=1);

namespace App\Data\FeedInfo;

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
