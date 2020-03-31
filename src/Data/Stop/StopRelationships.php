<?php
/**
 * This file remains to the GTFS-REST-API - Copyright (c) 2020.
 *
 * @author Sebastian Knopf
 * @license http://opensource.org/licenses/MIT MIT
 */

declare(strict_types=1);

namespace App\Data\Stop;

use App\Data\Level\Level;
use App\Data\StopTime\StopTime;
use App\Data\Transfer\Transfer;
use Atlas\Mapper\MapperRelationships;

class StopRelationships extends MapperRelationships
{
    protected function define()
    {
        $this->oneToMany('stop_times', StopTime::class, [
            'stop_id' => 'stop_id'
        ]);

        $this->oneToMany('transfers', Transfer::class, [
            'stop_id' => 'from_stop_id'
        ]);

        $this->manyToOne('level', Level::class, [
            'level_id' => 'level_id'
        ]);
    }
}
