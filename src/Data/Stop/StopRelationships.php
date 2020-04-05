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
use App\Data\Pathway\Pathway;
use App\Data\Transfer\Transfer;
use App\Mapper\NullableMapperRelationships;

class StopRelationships extends NullableMapperRelationships
{
    protected function define()
    {
        $this->nullableManyToOne('level', Level::class, [
            'level_id' => 'level_id'
        ]);

        $this->oneToMany('transfers', Transfer::class, [
            'stop_id' => 'from_stop_id'
        ]);

        $this->oneToMany('pathways', Pathway::class, [
            'stop_id' => 'from_stop_id'
        ]);

        $this->oneToMany('child_stops', Stop::class, [
            'stop_id' => 'parent_station'
        ])->where('parent_station IS NOT NULL');
    }
}
