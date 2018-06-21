<?php

namespace App\Repositories\Contracts;

interface RepositoryInterface
{
    public function get();
    public function count();
    public function take($number);
    public function latest();
    public function storeMultiple(array $collection);
    public function store($data);
}