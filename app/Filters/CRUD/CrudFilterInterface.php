<?php

namespace App\Filters\CRUD;

use Illuminate\Database\Eloquent\Collection;

interface CrudFilterInterface
{
    /**
     * Create a new filter and add to filter list.
     *
     * @param string $model
     * @param string $filter
     * @return void
     */
    public static function add(string $model, string $filter): void;

    /**
     * List all filters from history.
     *
     * @return Collection
     */
    public static function get(): Collection;

    /**
     * Edit an existing filter.
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
