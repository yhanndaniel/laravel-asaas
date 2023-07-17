<?php

namespace App\Services\Asaas\Endpoints\Customers;

use App\Services\Asaas\Endpoints\BaseEndpoint;
use App\Services\Asaas\Entities\Customer;
use App\Services\Asaas\Requests\CreateCustomerRequest;
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

    public function getOne(string $id): Customer
    {
        return $this->transformOne(
            $this->asaasService
                ->api
                ->get('/customers/' . $id)
                ->json(),
            Customer::class
        );
    }

    public function create(CreateCustomerRequest $request): Customer
    {
        return $this->transformOne(
            $this->asaasService
                ->api
                ->post('/customers', $request->validated())
                ->json(),
            Customer::class
        );
    }

}
