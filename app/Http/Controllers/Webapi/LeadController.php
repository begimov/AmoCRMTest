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
        $count = $this->leads
            ->withCriteria($this->getCriteria())
            ->count();

        $leads = $this->leads
            ->withCriteria($this->getCriteria())
            ->take(20)
            ->latest()
            ->get();

        return [
            'count' => $count,
            'leads' => $this->transformLeads($leads)
        ];
    }

    public function getCriteria()
    {
        return [
            new WhereLike('name', 'Тестовое задание')
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
