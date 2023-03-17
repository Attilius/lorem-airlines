<?php

namespace App\Filters\CRUD;

use App\Models\Customer;
use Illuminate\Support\Facades\Schema;

class CustomerFilter extends BaseFilter
{
    private static array $columns = [];

    /**
     * Return columns of customer table.
     *
     * @return array
     */
    public function index(): array
    {
        $customer = new Customer;
        $tableName = $customer->getTable();

        self::$columns = Schema::getColumnListing($tableName);
        array_shift(self::$columns);

        return self::$columns;
    }
}
