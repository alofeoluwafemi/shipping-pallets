<?php

namespace App\Http\Controllers;

use App\Http\Requests\PalletEstimate;
use App\Logic\GetShippingPriceLogic;

class GetShippingPriceAction extends Controller
{

    public function __invoke(PalletEstimate $request, GetShippingPriceLogic $getShippingPriceLogic)
    {
        $parts = $request->get('parts');

        try{
            $details = $getShippingPriceLogic->handle($parts);
            return response()->json($details + ['status' => 'success']);
        }catch (\Exception $e){
            return response()->json(['status' => 'error', 'message' => 'Service unavailable'],500);
        }
    }
}
