<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Route>
 */
class RouteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence(6),
            'description' => $this->faker->sentence(20),
            'user_id' => User::all()->random()->id,
            'length' => $this->faker->randomFloat(2, 1, 100),
            'duration' => $this->faker->randomFloat(2, 1, 300),
            'available_at' => null,
            'unavailable_at' => null,
            'is_public' => $this->faker->boolean(50),
        ];
    }
}
