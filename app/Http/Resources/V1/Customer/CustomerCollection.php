<?php

namespace App\Http\Resources\V1\Customer;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use JsonSerializable;

class CustomerCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  Request $request
     * @return array|Arrayable|JsonSerializable
     */
    public function toArray($request): array|Arrayable|JsonSerializable
    {
        return parent::toArray($request);
    }
}
