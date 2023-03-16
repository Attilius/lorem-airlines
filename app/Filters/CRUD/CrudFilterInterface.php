<?php

namespace App\Filters\CRUD;

interface CrudFilterInterface
{
    /**
     * Create a new filter and add to filter list.
     *
     * @return void
     */
    public function add(): void;

    /**
     * List filters from history.
     *
     * @return array
     */
    public function get(): array;

    /**
     * Update an existing filter.
     *
     * @return void
     */
    public function update(): void;
    public function remove(): void;
}
