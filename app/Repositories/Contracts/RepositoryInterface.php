<?php

namespace App\Repositories\Contracts;

interface RepositoryInterface
{
    public function get();
    public function storeMultiple(array $collection);
    public function store($data);
}