<?php

namespace Database\Factories;

use App\Models\Checkpoint;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Media>
 */
class MediaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'url' => $this->faker->imageUrl(),
            'type' => 'image',
            'mediable_type' => 'App\Models\Checkpoint',
            'mediable_id' => Checkpoint::all()->random()->id,
        ];
    }
}
