<?php

namespace App\Services\CRMs;

use App\Services\CRMs\Contracts\IAmoCrm;
use Illuminate\Support\Facades\Log;

class AmoCrm implements IAmoCrm
{
    public function handleAction(array $payload)
    {
        [$entity] = array_keys($payload);
        [$action] = array_keys($payload[$entity]);

        $method = 'handle' . ucfirst($entity) . ucfirst($action);
        
        if (method_exists($this, $method)) {
            return $this->{$method}($payload, $entity, $action);
        } else {
            //
        }
    }

    public function handleLeadsAdd($data, $entity, $action)
    {
        $leads = $data[$entity][$action];
        
        // queue
    }
}
