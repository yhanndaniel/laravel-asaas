<?php

namespace App\Services\Asaas\Entities;

class Interest
{
    public float $value;
    public string $type;

    public function __construct(array $data)
    {
        $this->value = data_get($data, 'value');
        $this->type  = data_get($data, 'type');
    }
}
