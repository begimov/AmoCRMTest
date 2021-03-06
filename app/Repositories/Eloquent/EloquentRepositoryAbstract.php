<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Exceptions\NoEntityDefined;
use App\Repositories\Contracts\RepositoryInterface;
use App\Repositories\Contracts\Criteria\CriteriaInterface;

abstract class EloquentRepositoryAbstract implements RepositoryInterface, CriteriaInterface
{
    protected $entity;

    public function __construct()
    {
        $this->entity = $this->resolveEntity();
    }

    public function get()
    {
        return $this->entity->get();
    }

    public function count()
    {
        return $this->entity->count();
    }

    public function take($number)
    {
        $this->entity->take($number);
        return $this;
    }

    public function latest()
    {
        $this->entity->latest();
        return $this;
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

    public function withCriteria(array $criteria)
    {
        foreach ($criteria as $criterion) {
            $this->entity = $criterion->apply($this->entity);
        }
        return $this;
    }

    protected function resolveEntity()
    {
        if (!method_exists($this, 'entity')) {
            throw new NoEntityDefined();
        }
        return app()->make($this->entity());
    }
}