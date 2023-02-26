<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::query()->create([
            'name' => 'admin',
            'email' => 'admin@info.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
        ]);
        \App\Models\User::factory(10)->create();
        $this->call(
            [
                PlatformSeeder::class,
                MarketSeeder::class,
                AppSeeder::class,
                SubscriptionSeeder::class
            ]
        );
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
