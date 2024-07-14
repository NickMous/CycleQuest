<?php

namespace Database\Factories;

use App\Models\Route;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Checkpoint>
 */
class CheckpointFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $address = $this->faker->address;

        return [
            'name' => $address,
            'description' => $this->faker->sentence(30),
            'route_id' => Route::all()->random()->id,
            'order' => 0,
            'latitude' => $this->faker->latitude,
            'longitude' => $this->faker->longitude,
            'address' => $address,
        ];
    }
}
