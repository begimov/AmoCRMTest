<?php

namespace App\Http\Controllers\Webhooks;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AmoCRMWebhookController extends Controller
{
    protected $amoCRM;

    public function __construct(IAmoCrm $amoCRM)
    {
        $this->amoCRM = $amoCRM;
    }

    public function handleWebhook(Request $request)
    {
        $payload = $request->all();
        $this->amoCRM->handleAction($payload);
    }
}
