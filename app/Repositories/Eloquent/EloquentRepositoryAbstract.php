<?php

namespace App\Repositories\Eloquent;

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
        foreach ($collection as $element) {
            $this->store($element);
        }
    }

    public function store($data)
    {
        $this->entity->create($data);
    }

    protected function resolveEntity()
    {
        if (!method_exists($this, 'entity')) {
            throw new NoEntityDefined();
        }
        return app()->make($this->entity());
    }
}