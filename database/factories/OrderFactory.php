<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        $user = User::inRandomOrder()->first();
        if (!$user) {
            $user = User::factory()->create();
        }
        return [
            'user_id' => $user->id,
            'product_id' => Product::inRandomOrder()->first()->id,
            'price' => fake()->numberBetween(100, 1000),
        ];

    }
}