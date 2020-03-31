<?php
declare(strict_types=1);

namespace App\Data\FareRule;

use Atlas\Mapper\Record;

/**
 * @method FareRuleRow getRow()
 */
class FareRuleRecord extends Record
{
    use FareRuleFields;
}
