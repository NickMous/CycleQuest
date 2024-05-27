<?php

namespace Database\Factories;

use App\Models\Route;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Progress>
 */
class ProgressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $route = Route::all()->random();
        return [
            'user_id' => User::all()->random()->id,
            'route_id' => $route->id,
            'progress' => $this->faker->randomFloat(2, 0, $route->length),
            'checkpoint_id' => $route->checkpoints->random()->id,
            'started_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'finished_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
