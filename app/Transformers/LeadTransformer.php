<?php

namespace App\Transformers;

use App\Models\Lead;

class LeadTransformer extends \League\Fractal\TransformerAbstract
{
    public function transform(Lead $lead)
    {
        return [
            'id' => $lead->amocrm_id,
            'hash' => $lead->hash_name,
        ];
    }
}