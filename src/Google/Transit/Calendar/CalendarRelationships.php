<?php
/**
 * This file remains to the GTFS-REST-API - Copyright (c) 2020.
 *
 * @author Sebastian Knopf
 * @license http://opensource.org/licenses/MIT MIT
 */

declare(strict_types=1);

namespace App\Google\Transit\Calendar;

use App\Google\Transit\CalendarDate\CalendarDate;
use App\Google\Transit\Trip\Trip;
use Atlas\Mapper\MapperRelationships;

class CalendarRelationships extends MapperRelationships
{
    protected function define()
    {
        $this->oneToMany('trips', Trip::class, [
            'service_id' => 'service_id'
        ]);

        $this->oneToMany('calendar_dates', CalendarDate::class, [
            'service_id' => 'service_id'
        ]);
    }
}
