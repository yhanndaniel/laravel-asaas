<?php

namespace App\Console\Commands;

use App\Services\Asaas\AsaasService;
use App\Services\Asaas\Facades\Asaas;
use App\Services\Asaas\Requests\CreateCustomerRequest;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class Playground extends Command
{

    protected $signature = 'play';

    protected $description = 'Playground Command';

    public function handle()
    {

        $createCustomer = new CreateCustomerRequest('José', '000000000', 'dRQoq@example.com');

        ds($createCustomer->validated());
        return Command::SUCCESS;
    }
}
