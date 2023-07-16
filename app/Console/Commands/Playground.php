<?php

namespace App\Console\Commands;

use App\Services\Asaas\AsaasService;
use App\Services\Asaas\Facades\Asaas;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class Playground extends Command
{

    protected $signature = 'play';

    protected $description = 'Playground Command';

    public function handle()
    {

        $return = Asaas::payments()->get();

        ds($return);
        return Command::SUCCESS;
    }
}
