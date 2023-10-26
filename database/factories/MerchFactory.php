<?php

namespace Database\Factories;

use App\Models\Merch;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class MerchFactory extends Factory
{
    protected $model = Merch::class;

    public function definition(): array
    {
        return [
            'name' => fake()->sentence(3),
            'price' => fake()->randomFloat(2, 0, 1000),
            'order' => fake()->numberBetween(0, 64),
            'created_at' => fake()->dateTimeBetween('-30 days', now()),
        ];
    }
}
