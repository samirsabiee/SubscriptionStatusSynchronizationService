<?php

namespace Database\Factories;

use App\Enums\AppSubscriptionStatusEnum;
use App\Models\App;
use App\Models\Market;
use App\Models\Subscription;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Subscription>
 */
class SubscriptionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $apps = App::all()->pluck('id')->toArray();
        return [
            'app_id' => $this->faker->unique()->randomElement($apps),
            'market_id' => Market::query()->inRandomOrder()->first()->id,
            'status' => $this->faker->randomElement(AppSubscriptionStatusEnum::getValues()),
        ];
    }
}
