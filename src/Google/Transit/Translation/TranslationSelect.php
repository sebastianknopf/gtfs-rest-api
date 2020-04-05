<?php
/**
 * This file remains to the GTFS-REST-API - Copyright (c) 2020.
 *
 * @author Sebastian Knopf
 * @license http://opensource.org/licenses/MIT MIT
 */

declare(strict_types=1);

namespace App\Google\Transit\Translation;

use Atlas\Mapper\MapperSelect;

/**
 * @method TranslationRecord|null fetchRecord()
 * @method TranslationRecord[] fetchRecords()
 * @method TranslationRecordSet fetchRecordSet()
 */
class TranslationSelect extends MapperSelect
{
}
