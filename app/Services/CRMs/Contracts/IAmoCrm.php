<?php

namespace App\Services\CRMs\Contracts;

interface IAmoCrm
{
    public function handleAction(array $payload);
}