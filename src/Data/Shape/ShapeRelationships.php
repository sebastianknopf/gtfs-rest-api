<?php
/**
 * This file remains to the GTFS-REST-API - Copyright (c) 2020.
 *
 * @author Sebastian Knopf
 * @license http://opensource.org/licenses/MIT MIT
 */

declare(strict_types=1);

namespace App\Data\Shape;

use App\Data\Trip\Trip;
use Atlas\Mapper\MapperRelationships;

class ShapeRelationships extends MapperRelationships
{
    protected function define()
    {
        $this->oneToMany('trips', Trip::class, [
            'shape_id' => 'shape_id'
        ]);
    }
}
