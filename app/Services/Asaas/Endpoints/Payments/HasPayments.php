<?php

namespace App\Services\Asaas\Endpoints\Payments;

trait HasPayments
{
    public function payments()
    {
        return new Payments();
    }
}
