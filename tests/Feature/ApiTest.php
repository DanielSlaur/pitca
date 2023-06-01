<?php

namespace Tests\Feature;

use App\Models\Pizzas;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ApiTest extends TestCase
{

    use RefreshDatabase;
    public function testPizzasIndex(): void
    {
        $response = $this->get('/api/pizzas');

        $response->assertOk();

    }


    public function testPizzasShow(): void
    {
        $pizzas = Pizzas::factory()->create();

        $response = $this->get('/api/pizzas/1');

        $response->assertOk();

    }


    public function testOrdersStore(): void
    {
        $pizzas = Pizzas::factory()->create();

        $response = $this->post('/api/orders/', [
            'name'=> 'Daniel',
            'phone'=> '88005553535',
            'address'=> 'Москва, улица Пушкина, дом Колотушкина',
            'paymentMethod' => 'cash',
            'totalPrice' => '1500',
            'pizzasIds' => [1, 2, 3]
        ]);

        $response->assertOk();

        $this->assertDatabaseCount('orders', 1);

        $this->assertDatabaseHas('orders', [
            'customerName' => 'Daniel',
            'totalPrice' => '1500'
        ]);

        $this->assertDatabaseCount('orders_pizzas', 3);
    }
}
