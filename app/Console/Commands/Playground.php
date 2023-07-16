<?php

namespace App\Console\Commands;

use App\Services\Asaas\AsassService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class Playground extends Command
{

    protected $signature = 'play';

    protected $description = 'Playground Command';

    public function handle()
    {

        $service = new AsassService();
        $return = $service->customers()->get();

        ds($return);
        return Command::SUCCESS;
    }
}
