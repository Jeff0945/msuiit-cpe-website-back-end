<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Merch;
use App\Models\MerchColor;
use App\Models\MerchSize;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();
        Merch::factory()
            ->has(MerchSize::factory()->count(5))
            ->has(MerchColor::factory()->count(5))
            ->count(10)
            ->create();
    }
}
