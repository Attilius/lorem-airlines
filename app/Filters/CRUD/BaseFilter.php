<?php

namespace App\Filters\CRUD;

use App\Services\KeyGenerator;

abstract class BaseFilter implements CrudFilterInterface
{
    protected static array $filterHistory = [];

    protected static array $activeFilters = [];

    /**
     * Create a new filter and add to filter list.
     *
     * @param string $filter
     * @return void
     */
    public static function add(string $filter): void
    {
        $uniqueId = KeyGenerator::generate(5);
        $filterKey = explode(':', $filter)[0];

        self::$filterHistory[strtolower($filterKey) .'_'. $uniqueId] = $filter;
    }

    /**
     * List all filters from history.
     *
     * @return array
     */
    public static function get(): array
    {
        return self::$filterHistory;
    }

    /**
     * Update an existing filter.
     *
     * @param string $key
     * @param string $newFilterValue
     * @return void
     */
    public static function update(string $key, string $newFilterValue): void
    {
        if (! array_key_exists($key, self::$filterHistory)) {
            #Todo create exception handler...
            dd('Array key "'.$key.'" is not exists!');
        }

        $filter = self::$filterHistory[$key];
        $filteredColumnName = explode(':', $filter)[0];

        self::$filterHistory[$key] = $filteredColumnName .':'. $newFilterValue;
    }

    /**
     * Delete an existing filter or all filters.
     *
     * @param string $key
     * @return void
     */
    public static function remove(string $key): void
    {
        switch ($key) {
            case'all': {
                self::$filterHistory = [];
                self::$activeFilters = [];
                break;
            }
            case'reset': {
                self::$activeFilters = [];
                break;
            }
            default: {
                unset(self::$filterHistory[$key]);
                break;
            }
        }
    }
}
