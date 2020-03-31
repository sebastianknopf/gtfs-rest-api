<?php
/**
 * This file remains to the GTFS-REST-API - Copyright (c) 2020.
 *
 * @author Sebastian Knopf
 * @license http://opensource.org/licenses/MIT MIT
 */

declare(strict_types=1);

namespace App\Data\Route;

use App\Data\Agency\Agency;
use App\Data\Attribution\Attribution;
use Atlas\Mapper\MapperRelationships;

class RouteRelationships extends MapperRelationships
{
    protected function define()
    {
        $this->manyToOne('agency', Agency::class, [
            'agency_id' => 'agency_id'
        ]);

        $this->oneToMany('attributions', Attribution::class, [
            'route_id' => 'route_id'
        ])->where('route_id IS NOT NULL');
    }
}
