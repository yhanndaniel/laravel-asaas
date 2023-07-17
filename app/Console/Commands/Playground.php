<?php

namespace App\Console\Commands;

use App\Services\Asaas\AsaasService;
use App\Services\Asaas\Enums\BillingType;
use App\Services\Asaas\Facades\Asaas;
use App\Services\Asaas\Requests\CreateCustomerRequest;
use App\Services\Asaas\Requests\CreatePaymentCreditCardRequest;
use App\Services\Asaas\Requests\CreatePaymentRequest;
use App\Services\Asaas\Requests\CreditCardHolderInfoRequest;
use App\Services\Asaas\Requests\CreditCardRequest;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class Playground extends Command
{

    protected $signature = 'play';

    protected $description = 'Playground Command';

    public function handle()
    {

        $customer = new CreatePaymentCreditCardRequest(
            'cus_000005363844',
            BillingType::UNDEFINED,
            1000,
            '2023-07-16',
            null,
            null,
            null,
            null,
            null,
            null,
            null,
            null,
            new CreditCardRequest('Ian Julio Vieira', '5158180524594479', '12', '2024', '243'),
            new CreditCardHolderInfoRequest('Ian Julio Vieira', 'email@gmail.com', '46429026868', '72602204', '12', '61993005225', null, null),
            null,
            false,
            '177.158.235.44'
        );

        ds($customer->validated());
        return Command::SUCCESS;
    }
}
