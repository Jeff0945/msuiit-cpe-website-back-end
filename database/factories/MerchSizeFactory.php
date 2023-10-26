<?php

namespace Database\Factories;

use App\Models\Merch;
use App\Models\MerchSize;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class MerchSizeFactory extends Factory
{
    protected $model = MerchSize::class;

    public function definition(): array
    {
        return [
            'merch_id' => Merch::factory(),
            'name' => fake()->randomLetter,
            'is_available' => $this->faker->boolean(),
            'order' => fake()->numberBetween(0, 64),
            'created_at' => fake()->dateTimeBetween('-30 days', now())
        ];
    }
}
