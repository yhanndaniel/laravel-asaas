<?php

namespace App\Services\Asaas\Endpoints\Payments;

use App\Services\Asaas\Endpoints\BaseEndpoint;
use App\Services\Asaas\Entities\Payment;
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
}
