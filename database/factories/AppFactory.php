<?php

namespace Database\Factories;

use App\Models\Platform;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\App>
 */
class AppFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $users_ids = User::query()->where('id', '>', 1)->pluck('id')->toArray();
        return [
            'name' => $this->faker->name,
            'platform_id' => Platform::query()->inRandomOrder()->first()->id,
            'user_id' => $this->faker->randomElement($users_ids)
            //'status' => $this->faker->randomElement([]),
        ];
    }
}
