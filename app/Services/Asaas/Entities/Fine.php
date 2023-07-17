<?php

namespace App\Services\Asaas\Entities;

use function Pest\Laravel\json;

class Fine
{
    public ?float $value;
    public ?string $type;

    public function __construct(?array $data)
    {
        $this->value = data_get($data, 'value');
        $this->type  = data_get($data, 'type');
    }

    public function toJson()
    {
        return json_encode([
            'value' => $this->value,
            'type'  => $this->type
        ]);
    }
}
