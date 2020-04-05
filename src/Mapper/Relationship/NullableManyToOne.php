<?php
/**
 * This file remains to the GTFS-REST-API - Copyright (c) 2020.
 *
 * @author Sebastian Knopf
 * @license http://opensource.org/licenses/MIT MIT
 */

namespace App\Mapper\Relationship;

use Atlas\Mapper\Record;
use Atlas\Mapper\Relationship\ManyToOne;

/**
 * ManyToOne relation class with null as default value.
 *
 * @package App\Mapper\Relationship
 */
class NullableManyToOne extends ManyToOne
{
    /**
     * Stitches foreign records to one master record with null as default value for
     * a non-existent foreign record.
     *
     * @param Record $nativeRecord The record instance
     * @param array $foreignRecords All foreign records
     */
    protected function stitchIntoRecord(Record $nativeRecord, array &$foreignRecords) : void {
        $nativeRecord->{$this->name} = null;
        foreach ($foreignRecords as $foreignRecord) {
            if ($this->recordsMatch($nativeRecord, $foreignRecord)) {
                $nativeRecord->{$this->name} = $foreignRecord;
                return;
            }
        }
    }
}