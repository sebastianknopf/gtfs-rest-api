<?php
/**
 * This file remains to the GTFS-REST-API - Copyright (c) 2020.
 *
 * @author Sebastian Knopf
 * @license http://opensource.org/licenses/MIT MIT
 */

declare(strict_types=1);

namespace App\Google\Transit\Level;

use Atlas\Mapper\Record;

/**
 * @method LevelRow getRow()
 */
class LevelRecord extends Record
{
    use LevelFields;
}
