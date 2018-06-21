<?php

namespace App\Http\Controllers\Webapi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\LeadRepository;
use App\Transformers\LeadTransformer;

class LeadController extends Controller
{
    protected $leads;

    public function __construct(LeadRepository $leads)
    {
        $this->leads = $leads;
    }

    public function index()
    {
        return fractal()
            ->collection($this->leads->all())
            ->transformWith(new LeadTransformer)
            ->toArray();
    }
}
