<?php

namespace App\Http\Controllers\Webapi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\LeadRepository;
use App\Transformers\LeadTransformer;
use App\Repositories\Eloquent\Criteria\WhereLike;

class LeadController extends Controller
{
    protected $leads;

    public function __construct(LeadRepository $leads)
    {
        $this->leads = $leads;
    }

    public function index()
    {
        $count = $this->leads->count();

        $leads = $this->leads->withCriteria([
            new WhereLike('name', 'Тестовое задание')
        ])->get();

        return [
            'count' => $count,
            'leads' => $this->transformLeads($leads)
        ];
    }

    protected function transformLeads($leads)
    {
        return fractal()
            ->collection($leads)
            ->transformWith(new LeadTransformer)
            ->toArray();
    }
}
