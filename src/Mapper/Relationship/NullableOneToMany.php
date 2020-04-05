<?php
/**
 * This file remains to the GTFS-REST-API - Copyright (c) 2020.
 *
 * @author Sebastian Knopf
 * @license http://opensource.org/licenses/MIT MIT
 */

namespace App\Mapper\Relationship;


use Atlas\Mapper\Record;
use Atlas\Mapper\Relationship\OneToMany;

/**
 * OneToMany relation class with null as default value.
 *
 * @package App\Mapper\Relationship
 */
class NullableOneToMany extends OneToMany
{
    /**
     * Stitches foreign records to one master record with null as default value
     * when there's not at most one foreign record. This behaviour replaces the
     * default value as empty array.
     *
     * @param Record $nativeRecord The record instance
     * @param array $foreignRecords All foreign records
     */
    protected function stitchIntoRecord(Record $nativeRecord, array &$foreignRecords) : void {
        $matches = [];
        foreach ($foreignRecords as $index => $foreignRecord) {
            if ($this->recordsMatch($nativeRecord, $foreignRecord)) {
                $matches[] = $foreignRecord;
                unset($foreignRecords[$index]);
            }
        }

        if (count($matches) > 0) {
            $nativeRecord->{$this->name} = $this->getForeignMapper()->newRecordSet($matches);
        } else {
            $nativeRecord->{$this->name} = null;
        }
    }
}