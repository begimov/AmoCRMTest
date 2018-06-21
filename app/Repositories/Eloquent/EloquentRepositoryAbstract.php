<?php

namespace App\Repositories;

use App\Repositories\Exceptions\NoEntityDefined;
use App\Repositories\Contracts\RepositoryInterface;

abstract class EloquentRepositoryAbstract implements RepositoryInterface
{
    protected $entity;

    public function __construct()
    {
        $this->entity = $this->resolveEntity();
    }

    public function storeMultiple(array $collection)
    {
        //
    }

    public function store($data)
    {
        //
    }

    protected function resolveEntity()
    {
        if (!method_exists($this, 'entity')) {
            throw new NoEntityDefined();
        }
        return app()->make($this->entity());
    }
}