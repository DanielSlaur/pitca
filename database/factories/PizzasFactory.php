<?php

namespace Database\Factories;

use App\Models\Pizzas;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Pizzas>
 */
class PizzasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $images = [
            'https://dodopizza-a.akamaihd.net/static/Img/Products/27c9bbd0af3a4d1d84a086d9c2f1656d_292x292.webp',
            'https://dodopizza-a.akamaihd.net/static/Img/Products/02ca2561953b488993878d1f70e359de_292x292.webp',
            'https://dodopizza-a.akamaihd.net/static/Img/Products/d9c609f1422247f2b87b6293eb461ff0_292x292.webp',
            'https://dodopizza-a.akamaihd.net/static/Img/Products/3a948b9d5af14d219e2c54282229755a_292x292.webp',
            'https://dodopizza-a.akamaihd.net/static/Img/Products/cea570842b754c52b786c231c65bd2e2_292x292.webp',
        ];
        return [
            'title' => $this->faker->name(),
            'description' => $this->faker->realText(30),
            'price' => $this->faker->numberBetween(300, 600),
            'thumbnail' => $images[rand(0, count($images) - 1)]
        ];
    }
}
