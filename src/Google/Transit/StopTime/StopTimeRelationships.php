<?php
/**
 * This file remains to the GTFS-REST-API - Copyright (c) 2020.
 *
 * @author Sebastian Knopf
 * @license http://opensource.org/licenses/MIT MIT
 */

declare(strict_types=1);

namespace App\Google\Transit\StopTime;

use App\Google\Transit\Stop\Stop;
use App\Mapper\NullableMapperRelationships;

class StopTimeRelationships extends NullableMapperRelationships
{
    protected function define()
    {
        $this->nullableManyToOne('stop', Stop::class, [
            'stop_id' => 'stop_id'
        ]);
    }
}
