<?php
/**
 * This file remains to the GTFS-REST-API - Copyright (c) 2020.
 *
 * @author Sebastian Knopf
 * @license http://opensource.org/licenses/MIT MIT
 */

declare(strict_types=1);

namespace App\Google\Transit\Route;

use App\Google\Transit\Agency\Agency;
use App\Mapper\NullableMapperRelationships;

class RouteRelationships extends NullableMapperRelationships
{
    protected function define()
    {
        $this->nullableManyToOne('agency', Agency::class, [
            'agency_id' => 'agency_id'
        ]);
    }
}
