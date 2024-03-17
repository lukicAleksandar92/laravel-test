<?php

namespace App\Console\Commands;

use App\Services\CurrencyService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class CurrencyCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:currency-command {currency}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */



    public function handle()
    {
        $currency = $this->argument('currency');

        $currencyapi = new \CurrencyApi\CurrencyApi\CurrencyApiClient(env('CURRENCY_API_KEY'));

        $response = $currencyapi->latest([
            'base_currency' => $currency,
            'currencies' => 'RSD',
        ]);

        $value = $response["data"]["RSD"]["value"];

        $this->info("You need $value RSD for 1 $currency.");
    }


}


