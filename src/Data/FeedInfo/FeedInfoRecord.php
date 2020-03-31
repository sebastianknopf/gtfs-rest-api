<?php
declare(strict_types=1);

namespace App\Data\FeedInfo;

use Atlas\Mapper\Record;

/**
 * @method FeedInfoRow getRow()
 */
class FeedInfoRecord extends Record
{
    use FeedInfoFields;
}
