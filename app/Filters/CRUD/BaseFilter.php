<?php

namespace App\Filters\CRUD;

use App\Services\KeyGenerator;
use App\Models\Filter;
use Illuminate\Database\Eloquent\Collection;

abstract class BaseFilter implements CrudFilterInterface
{
    protected static array $filterHistory = [];

    protected static array $activeFilters = [];

    /**
     * Create a new filter and add to filter list.
     *
     * @param string $model
     * @param string $filter
     * @return void
     */
    public static function add(string $model, string $filter): void
    {
        $uniqueId = KeyGenerator::generate(5);
        $filterKey = explode(':', $filter)[0];

        Filter::create([
            'uid' => strtolower($filterKey) .'_'. $uniqueId,
            'model' => $model,
            'filter' => $filter,
            'is_active' => false,
        ]);
    }

    /**
     * List all filters from history.
     *
     * @return Collection
     */
    public static function get(): Collection
    {
        return Filter::all();
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
                Filter::truncate();
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
