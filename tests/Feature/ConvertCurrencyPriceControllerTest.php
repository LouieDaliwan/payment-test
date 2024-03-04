<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ConvertCurrencyPriceControllerTest extends TestCase
{
    /**
     * @test
     */
    public function can_convert_the_current_PHP_currency_in_to_USD(): void
    {
        $response = $this->postJson('/api/convert-currency', [
            'from'=> 'PHP',
            'to'=> 'USD',
            'amount'=> 1000
        ]);

        $response->assertJson([
            'currency' => 'USD',
            'amount' => 18
        ]);

        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function can_convert_the_current_USD_currency_in_to_PHP(): void
    {
        $response = $this->postJson('/api/convert-currency', [
            'from'=> 'USD',
            'to'=> 'PHP',
            'amount'=> 1000
        ]);

        $response->assertJson([
            'currency' => 'PHP',
            'amount' => 56116.23
        ]);

        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function can_convert_the_current_PHP_currency_in_to_JPY(): void
    {
        $response = $this->postJson('/api/convert-currency', [
            'from'=> 'PHP',
            'to'=> 'JPY',
            'amount'=> 1000
        ]);

        $response->assertJson([
            'currency' => 'JPY',
            'amount' => 2672.66
        ]);

        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function can_convert_the_current_JPY_currency_in_to_PHP(): void
    {
        $response = $this->postJson('/api/convert-currency', [
            'from'=> 'JPY',
            'to'=> 'PHP',
            'amount'=> 1000
        ]);

        $response->assertJson([
            'currency' => 'PHP',
            'amount' => 374.18
        ]);

        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function can_convert_the_current_USD_currency_in_to_JPY(): void
    {
        $response = $this->postJson('/api/convert-currency', [
            'from'=> 'USD',
            'to'=> 'JPY',
            'amount'=> 1000
        ]);

        $response->assertJson([
            'currency' => 'JPY',
            'amount' => 149940.38
        ]);

        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function can_convert_the_current_JPY_currency_in_to_USD(): void
    {
        $response = $this->postJson('/api/convert-currency', [
            'from'=> 'JPY',
            'to'=> 'USD',
            'amount'=> 1000
        ]);

        $response->assertJson([
            'currency' => 'USD',
            'amount' => 6.67
        ]);

        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function can_convert_not_supported_currencies()
    {
        $response = $this->postJson('/api/convert-currency', [
            'from'=> 'USD',
            'to'=> 'EUR',
            'amount'=> 1000
        ]);

        $response->assertJsonFragment([
            'message' => "The EUR currency is not supported"
        ]);
    }
}
