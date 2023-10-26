<?php

namespace Database\Factories;

use App\Models\Merch;
use App\Models\MerchColor;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class MerchColorFactory extends Factory
{
    protected $model = MerchColor::class;

    public function definition(): array
    {
        return [
            'merch_id' => Merch::factory(),
            'image_src' => fake()->imageUrl,
            'image_alt' => fake()->word(),
            'color' => fake()->hexColor,
            'selected_color' => fake()->hexColor,
            'order' => fake()->numberBetween(0, 64),
            'created_at' => fake()->dateTimeBetween('-30 days', now())
        ];
    }
}
