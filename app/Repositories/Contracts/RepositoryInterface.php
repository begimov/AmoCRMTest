<?php

namespace App\Repositories\Contracts;

interface RepositoryInterface
{
    public function storeMultiple(array $collection);
    public function store($data);
}