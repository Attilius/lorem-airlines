<?php

namespace App\Filters\CRUD;

interface CrudFilterInterface
{
    public function add(): void;
    public function get(): array;
    public function update(): void;
    public function remove(): void;
}
