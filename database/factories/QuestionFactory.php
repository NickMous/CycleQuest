<?php

namespace Database\Factories;

use App\Models\Checkpoint;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Question>
 */
class QuestionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'checkpoint_id' => Checkpoint::all()->random()->id,
            'question' => $this->faker->sentence(10),
            'type' => $this->faker->randomElement(['text', 'radio', 'checkbox']),
            'order' => 0,
        ];
    }
}
