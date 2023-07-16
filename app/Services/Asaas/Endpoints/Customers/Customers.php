<?php

namespace App\Services\Asaas\Endpoints\Customers;

use App\Services\Asaas\Endpoints\BaseEndpoint;
use App\Services\Asaas\Entities\Customer;
use Illuminate\Support\Collection;

class Customers extends BaseEndpoint
{
    public function get(): Collection
    {
        return $this->transformMany(
            $this->asaasService
                ->api
                ->get('/customers')
                ->json('data'),
            Customer::class
        );
    }

    public function getOne(string $id): object
    {
        return $this->transformOne(
            $this->asaasService
                ->api
                ->get('/customers/' . $id)
                ->json(),
            Customer::class
        );
    }

}
