<?php

namespace App\Filters\V1;

use App\Filters\ApiFilter;

class CustomersFilter extends ApiFilter
{
    protected array $safeParams = [
        'name' => ['eq'],
        'type' => ['eq'],
        'email' => ['eq'],
        'address' => ['eq'],
        'city' => ['eq'],
        'state' => ['eq'],
        'postalCode' => ['eq', 'gt', 'lt'],
        'phone' => ['eq'],
    ];

    protected array $columnMap = [
        'postalCode' => 'postal_code',
    ];

    protected array $operatorMap = [
        'eq' => '=',
        'lt' => '<',
        'lte' => '<=',
        'gt' => '>',
        'gte' => '>=',
    ];
}
