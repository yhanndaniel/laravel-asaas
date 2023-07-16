<?php

namespace App\Services\Asaas\Endpoints;

use App\Services\Asaas\Entities\Customer;
use Illuminate\Support\Collection;

class Customers extends BaseEndpoint
{
    public function get(): Collection
    {
        return $this->transform(
            $this->asaasService
                ->api
                ->get('/customers')
                ->json('data'),
            Customer::class
        );
    }

}
