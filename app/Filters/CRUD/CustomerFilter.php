<?php

namespace App\Filters\CRUD;

use App\Models\Customer;
use Illuminate\Support\Facades\Schema;

class CustomerFilter extends BaseFilter
{
    private static array $columns = [];

    public function index()
    {
        $customer = new Customer;
        $tableName = $customer->getTable();

        self::$columns = Schema::getColumnListing($tableName);
        array_shift(self::$columns);

        return self::$columns;
    }
}
