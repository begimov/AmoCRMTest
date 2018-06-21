<?php

namespace App\Repositories\Eloquent\Pages;

use App\Repositories\Eloquent\EloquentRepositoryAbstract;
use App\Repositories\Contracts\LeadRepository;
use App\Models\Lead;

class EloquentLeadRepository extends EloquentRepositoryAbstract implements LeadRepository
{
    public function entity()
    {
        return Lead::class;
    }
}