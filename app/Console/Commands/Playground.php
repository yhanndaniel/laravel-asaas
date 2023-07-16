<?php

namespace App\Console\Commands;

use App\Services\Asaas\AsassService;
use App\Services\Asaas\Facades\Asass;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class Playground extends Command
{

    protected $signature = 'play';

    protected $description = 'Playground Command';

    public function handle()
    {

        $return = Asass::customers()->get();

        ds($return);
        return Command::SUCCESS;
    }
}
