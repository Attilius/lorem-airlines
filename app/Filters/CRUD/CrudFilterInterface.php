<?php

namespace App\Filters\CRUD;

use App\Services\UniqueIdentifierKeyGeneratorInterface;

interface CrudFilterInterface
{
    /**
     * Create a new filter and add to filter list.
     *
     * @param UniqueIdentifierKeyGeneratorInterface $keyGenerator
     * @param string $filter
     * @return void
     */
    public static function add(UniqueIdentifierKeyGeneratorInterface $keyGenerator, string $filter): void;

    /**
     * List all filters from history.
     *
     * @return array
     */
    public static function get(): array;

    /**
     * Update an existing filter.
     *
     * @param string $key
     * @param string $newFilterValue
     * @return void
     */
    public static function update(string $key, string $newFilterValue): void;

    /**
     * Delete an existing filter.
     *
     * @param string $key
     * @return void
     */
    public static function remove(string $key): void;
}
