<?php

namespace App\Services\CRMs;

use App\Services\CRMs\Contracts\IAmoCrm;

class AmoCrm implements IAmoCrm
{
    public function handleAction(array $payload)
    {
        Log::debug('amoCRM:', $payload);
    }
}
