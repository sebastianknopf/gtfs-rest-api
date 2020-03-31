<?php
/**
 * This file remains to the GTFS-REST-API - Copyright (c) 2020.
 *
 * @author Sebastian Knopf
 * @license http://opensource.org/licenses/MIT MIT
 */

declare(strict_types=1);

namespace App\Data\StopTime;

use App\Data\Stop\Stop;
use App\Data\Trip\Trip;
use Atlas\Mapper\MapperRelationships;

class StopTimeRelationships extends MapperRelationships
{
    protected function define()
    {
        $this->manyToOne('trip', Trip::class, [
            'trip_id' => 'trip_id'
        ]);

        $this->manyToOne('stop', Stop::class, [
            'stop_id' => 'stop_id'
        ]);
    }
}
