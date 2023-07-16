<?php

namespace App\Services\Asaas;

use App\Services\Asaas\Endpoints\Customers\HasCustomers;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;

/**
 * Asaas Documentation Api Service
 * https://docs.asaas.com/reference/comece-por-aqui
 */
class AsaasService
{
    use HasCustomers;

    public PendingRequest $api;

    public function __construct()
    {
        $this->api = Http::withHeaders([
            'access_token' => config('services.asaas.access_token'),
            'Content-Type' => 'application/json'
         ])->baseUrl(config('services.asaas.base_url'));
    }
}
