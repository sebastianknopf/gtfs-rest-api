<?php
/**
 * This file remains to the GTFS-REST-API - Copyright (c) 2020.
 *
 * @author Sebastian Knopf
 * @license http://opensource.org/licenses/MIT MIT
 */

namespace App\Mapper;

use App\Mapper\Relationship\NullableManyToOne;
use App\Mapper\Relationship\NullableOneToMany;
use App\Mapper\Relationship\NullableOneToOne;
use Atlas\Mapper\MapperRelationships;

/**
 * Extended MapperRelationships class which creates relations with null as default value.
 *
 * @package App\Mapper
 */
abstract class NullableMapperRelationships extends MapperRelationships
{
    /**
     * Returns a nullable OneToOne relation object.
     *
     * @param string $relatedName The relation name
     * @param string $foreignMapperClass The foreign target class
     * @param array $on The join fields
     * @return NullableOneToOne A nullable relation object
     * @throws \Atlas\Mapper\Exception
     */
    protected function nullableOneToOne(string $relatedName, string $foreignMapperClass, array $on = []) : NullableOneToOne {
        return $this->set(
            $relatedName,
            NullableOneToOne::class,
            $foreignMapperClass,
            'persistAfterNative',
            $on
        );
    }

    /**
     * Returns a nullable OneToMany relation object.
     *
     * @param string $relatedName The relation name
     * @param string $foreignMapperClass The foreign target class
     * @param array $on The join fields
     * @return NullableOneToMany A nullable relation object
     * @throws \Atlas\Mapper\Exception
     */
    protected function nullableOneToMany(string $relatedName, string $foreignMapperClass, array $on = []) : NullableOneToMany {
        return $this->set(
            $relatedName,
            NullableOneToMany::class,
            $foreignMapperClass,
            'persistAfterNative',
            $on
        );
    }

    /**
     * Returns a nullable ManyToOne relation object.
     *
     * @param string $relatedName The relation name
     * @param string $foreignMapperClass The foreign target class
     * @param array $on The join fields
     * @return NullableManyToOne A nullable relation object
     * @throws \Atlas\Mapper\Exception
     */
    protected function nullableManyToOne(string $relatedName, string $foreignMapperClass, array $on = []) : NullableManyToOne {
        return $this->set(
            $relatedName,
            NullableManyToOne::class,
            $foreignMapperClass,
            'persistBeforeNative',
            $on
        );
    }
}