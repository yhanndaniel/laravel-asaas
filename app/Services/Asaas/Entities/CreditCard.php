<?php

namespace App\Services\Asaas\Entities;

class CreditCard
{
    public ?string $creditCardNumber;
    public ?string $creditCardBrand;
    public ?string $creditCardToken;

    public function __construct(?array $data)
    {
        $this->creditCardNumber = data_get($data, 'creditCardNumber');
        $this->creditCardBrand  = data_get($data, 'creditCardBrand');
        $this->creditCardToken  = data_get($data, 'creditCardToken');
    }
}
