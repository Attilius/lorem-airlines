<?php

namespace App\Filters\CRUD;

interface CrudFilterInterface
{
    /**
     * Create a new filter and add to filter list.
     *
     * @return void
     */
    public function add(string $filter): void;

    /**
     * List all filters from history.
     *
     * @return array
     */
    public function get(): array;

    /**
     * Update an existing filter.
     *
     * @param string $key
     * @return void
     */
    public function update(string $key): void;

    /**
     * Delete an existing filter.
     *
     * @param string $key
     * @return void
     */
    public function remove(string $key): void;
}
