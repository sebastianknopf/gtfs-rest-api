<?php
/**
 * This file remains to the GTFS-REST-API - Copyright (c) 2020.
 *
 * @author Sebastian Knopf
 * @license http://opensource.org/licenses/MIT MIT
 */

declare(strict_types=1);

namespace App\Data\FareAttribute;

use App\Data\FareRule\FareRule;
use Atlas\Mapper\MapperRelationships;

class FareAttributeRelationships extends MapperRelationships
{
    protected function define()
    {
        $this->oneToMany('fare_rules', FareRule::class, [
            'fare_id' => 'fare_id'
        ]);
    }
}
