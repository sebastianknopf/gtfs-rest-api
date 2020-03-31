<?php
/**
 * This file remains to the GTFS-REST-API - Copyright (c) 2020.
 *
 * @author Sebastian Knopf
 * @license http://opensource.org/licenses/MIT MIT
 */

declare(strict_types=1);

namespace App\Data\Calendar;

use App\Data\Trip\Trip;
use Atlas\Mapper\MapperRelationships;

class CalendarRelationships extends MapperRelationships
{
    protected function define()
    {
        $this->oneToMany('trips', Trip::class, [
            'service_id' => 'service_id'
        ]);

        $this->oneToMany('calendar_dates', Calendar::class, [
            'service_id' => 'service_id'
        ]);
    }
}
