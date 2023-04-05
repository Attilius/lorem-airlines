<?php

namespace App\Filters\CRUD;

use App\Models\Customer;
use Illuminate\Support\Facades\Schema;

class CustomerFilter extends BaseFilter
{
    private static array $columns = [];

    private static array $values = [];

    /**
     * Return columns of customer table.
     *
     * @return array
     */
    public function index(): array
    {
        $customer = new Customer;
        $tableName = $customer->getTable();

        foreach (Schema::getColumnListing($tableName) as $columnName) {
            self::$columns[] = ucfirst($columnName);
        }
        array_shift(self::$columns);
        $this->setValues();
        #Todo filter values only from [type, country->'if have been', state, city] for select options

        return ['columns' => self::$columns, 'values' => self::$values];
    }

    /**
     * Getting all unique value from a table column.
     *
     * @param string $columnName
     * @return array
     */
    private function getUniqueValues(string $columnName): array
    {
        $customer = new Customer();
        $values = [];
        foreach ($customer::all() as $customer) {
            switch ($columnName) {
                case 'Type': {
                    $values[] = $customer->type;
                    break;
                }
                case 'State': {
                    $values[] = $customer->state;
                    break;
                }
                case 'City': {
                    $values[] = $customer->city;
                    break;
                }
                default:{break;}
            }
        }

        return array_unique($values);
    }

    private function setValues(): void
    {
        foreach (self::$columns as $column) {
            self::$values[$column] = $this->getUniqueValues($column);
        }
    }

}

