<?php

namespace App\Services\Asaas\Entities;

class Discount
{
    public float $value;
    public ?string $limitDate;
    public ?int $dueDateLimitDays;
    public ?string $type;

    public function __construct(array $data)
    {
        $this->value                = data_get($data, 'value');
        $this->limitDate            = data_get($data, 'limitDate');
        $this->dueDateLimitDays     = data_get($data, 'dueDateLimitDays');
        $this->type                 = data_get($data, 'type');
    }
}
