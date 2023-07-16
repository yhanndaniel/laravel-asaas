<?php

namespace App\Services\Asaas\Endpoints;

use App\Services\Asaas\AsaasService;
use Illuminate\Support\Collection;

class BaseEndpoint
{
    protected AsaasService $asaasService;

    public function __construct()
    {
        $this->asaasService = new AsaasService();
    }

    protected function transform(mixed $json, string $entity): Collection
    {
        return collect($json)
            ->map(fn ($customer) => new $entity($customer));

    }
}
