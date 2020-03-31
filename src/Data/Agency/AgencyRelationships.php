<?php
/**
 * This file remains to the GTFS-REST-API - Copyright (c) 2020.
 *
 * @author Sebastian Knopf
 * @license http://opensource.org/licenses/MIT MIT
 */

declare(strict_types=1);

namespace App\Data\Agency;

use App\Data\Attribution\Attribution;
use Atlas\Mapper\MapperRelationships;

class AgencyRelationships extends MapperRelationships
{
    protected function define()
    {
        $this->oneToMany('attributions', Attribution::class, [
            'agency_id' => 'agency_id'
        ])->where('agency_id IS NOT NULL');
    }
}
