<?php

namespace Database\Factories;

use App\Enums\PlatformEnum;
use App\Models\Platform;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Platform>
 */
class PlatformFactory extends Factory
{

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->randomElement(PlatformEnum::getValues())
        ];
    }
}
