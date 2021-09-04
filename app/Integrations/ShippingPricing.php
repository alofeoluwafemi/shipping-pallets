<?php

namespace App\Integrations;

use Illuminate\Support\Facades\Http;

class ShippingPricing {

    public $endpoint;

    public function __construct()
    {
        $this->endpoint = config('shipping.endpoint');
    }

    public function getCost(int $numOfPallets, $countryCode = 'GB', $postalCode = 'PE20 3PW'):array
    {
        $response = Http::post($this->endpoint. '/getprice/pallet', [
            'countryCode' => $countryCode,
            'postalCode' => $postalCode,
            'pallets' => $numOfPallets
        ]);

        $data =  $response->json();

        return [
            'cost' =>  $data['totalCost']['value'] ?? 0,
            'provider' => $data['provider'] ?? '',
        ];
    }
}
