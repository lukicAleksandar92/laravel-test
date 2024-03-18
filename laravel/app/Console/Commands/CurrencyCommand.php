<?php

namespace App\Console\Commands;


use App\Models\ExchangeRates;
use App\Services\CurrencyService;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class CurrencyCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:currency-command';

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
        // $currency = $this->argument('currency');

        // $currencyapi = new \CurrencyApi\CurrencyApi\CurrencyApiClient(env('CURRENCY_API_KEY'));

        // $response = $currencyapi->latest([
        //     'base_currency' => $currency,
        //     'currencies' => 'RSD',
        // ]);

        // $value = number_format($response["data"]["RSD"]["value"]);

        // $this->info("You need $value RSD for 1 $currency.");



        //-------------------------------------------------------//

        // "https://kurs.resenje.org/api/v1/currencies/usd/rates/today"



        foreach (ExchangeRates::AVAILABLE_CURRENCIES as $currency)
        {
            $todayCurrency = ExchangeRates::getCurrencyForToday($currency);

            if(!$todayCurrency) {

                $response = Http::get("https://kurs.resenje.org/api/v1/currencies/$currency/rates/today");

                ExchangeRates::create([
                    'currency' => $currency,
                    'value' => $response->json()["exchange_middle"]
                ]);

            }


        }


    }





}


