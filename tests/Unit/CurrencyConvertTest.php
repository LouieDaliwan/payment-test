<?php

namespace Tests\Unit;

use App\Models\CurrencyConvert;
use PHPUnit\Framework\TestCase;

class CurrencyConvertTest extends TestCase
{
    /**
     * @test
     */
    public function it_converts_the_currency(): void
    {
        $currency = new CurrencyConvert();

        $result = $currency->convertCurrency([
            'from' => 'PHP',
            'to' => 'USD',
            'amount' => 1000
        ]);

        $this->assertEquals('USD', $result['currency']);
        $this->assertEquals(18, $result['amount']);
    }
}
