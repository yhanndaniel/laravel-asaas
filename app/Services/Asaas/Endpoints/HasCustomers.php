<?php

namespace App\Services\Asaas\Endpoints;

trait HasCustomers
{
    public function customers()
    {
        return new Customers();
    }
}
