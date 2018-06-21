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
        $leads = $this->leads->withCriteria([
            new WhereLike('name', 'Тестовое задание')
        ])->get();

        return fractal()
            ->collection($leads)
            ->transformWith(new LeadTransformer)
            ->toArray();
    }
}
