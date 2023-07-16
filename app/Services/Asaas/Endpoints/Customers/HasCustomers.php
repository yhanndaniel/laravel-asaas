<?php

namespace App\Services\Asaas\Endpoints\Customers;

trait HasCustomers
{
    public function customers()
    {
        return new Customers();
    }
}
