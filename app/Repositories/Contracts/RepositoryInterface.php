<?php

namespace App\Repositories;

interface RepositoryInterface
{
    public function storeMultiple(array $collection);
    public function store($data);
}