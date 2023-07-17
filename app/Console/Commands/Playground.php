<?php

namespace App\Console\Commands;

use App\Services\Asaas\AsaasService;
use App\Services\Asaas\Enums\BillingType;
use App\Services\Asaas\Facades\Asaas;
use App\Services\Asaas\Requests\CreateCustomerRequest;
use App\Services\Asaas\Requests\CreatePaymentRequest;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class Playground extends Command
{

    protected $signature = 'play';

    protected $description = 'Playground Command';

    public function handle()
    {

        $customer = new CreatePaymentRequest('cus_000005363844', BillingType::UNDEFINED, 1000, '2023-07-16', null, null, null, null, null, null, null, null, null, false);

        ds($customer->validated());
        return Command::SUCCESS;
    }
}
