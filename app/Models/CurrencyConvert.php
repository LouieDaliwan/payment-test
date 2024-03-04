<?php

namespace App\Models;

class CurrencyConvert
{
    const currency = [
        'USD' => [
            'PHP' => 0.018,
            'JPY' => 0.0066682775,
            'USD' => 1
        ],
        'PHP' => [
            'USD' => 56.116225,
            'JPY' => 0.374181,
            'PHP' => 1
        ],
        'JPY' => [
            'USD' => 149.94038,
            'PHP' => 2.672662,
            'JPY' => 1
        ]
    ];

    public function convertCurrency(array $attr)
    {
        if (!$this->checkCurrency($attr['to'])) {
            return response()->json(['message' => "The {$attr['to']} currency is not supported"], 404);
        }

        return [
            'currency' => $attr['to'],
            'amount' => number_format(($attr['amount'] *  self::currency[$attr['to']][$attr['from']]) , 2, '.', '')
        ];
    }

    protected function checkCurrency($currency)
    {
        return array_key_exists($currency, self::currency);
    }
}
