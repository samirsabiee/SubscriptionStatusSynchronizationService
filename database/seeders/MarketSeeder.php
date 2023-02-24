<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MarketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Market::factory(2)->create();
    }
}
