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
    public function get(): array;
    public function update(): void;
    public function remove(): void;
}
