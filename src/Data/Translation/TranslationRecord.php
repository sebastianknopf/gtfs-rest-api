<?php
declare(strict_types=1);

namespace App\Data\Translation;

use Atlas\Mapper\Record;

/**
 * @method TranslationRow getRow()
 */
class TranslationRecord extends Record
{
    use TranslationFields;
}
