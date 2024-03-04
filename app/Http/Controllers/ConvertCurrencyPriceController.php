<?php

namespace App\Http\Controllers;

use App\Models\CurrencyConvert;
use Illuminate\Http\Request;

class ConvertCurrencyPriceController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $currency = new CurrencyConvert();

        $result = $currency->convertCurrency([
            'from' => $request->from,
            'to' => $request->to,
            'amount' => $request->amount
        ]);

        return response()->json($result, 200);
    }
}
