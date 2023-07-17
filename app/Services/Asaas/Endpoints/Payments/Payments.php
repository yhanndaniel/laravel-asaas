<?php

namespace App\Services\Asaas\Endpoints\Payments;

use App\Services\Asaas\Endpoints\BaseEndpoint;
use App\Services\Asaas\Entities\Payment;
use App\Services\Asaas\Requests\CreatePaymentRequest;
use Illuminate\Support\Collection;

class Payments extends BaseEndpoint
{
    public function get(): Collection
    {
        return $this->transformMany(
            $this->asaasService
                ->api
                ->get('/payments')
                ->json('data'),
            Payment::class
        );
    }

    public function getOne(string $id): Payment
    {
        return $this->transformOne(
            $this->asaasService
                ->api
                ->get('/payments/' . $id)
                ->json(),
            Payment::class
        );
    }

    public function create(CreatePaymentRequest $data): Payment
    {
        return $this->transformOne(
            $this->asaasService
                ->api
                ->post('/payments', $data->validated())
                ->json(),
            Payment::class
        );
    }
}
