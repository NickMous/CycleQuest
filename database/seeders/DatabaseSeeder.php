<?php

namespace Database\Seeders;

use App\Models\Answer;
use App\Models\Checkpoint;
use App\Models\Media;
use App\Models\Progress;
use App\Models\Question;
use App\Models\Route;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(rand(10, 100))->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        Route::factory(50)->create();

        for ($i = 1; $i <= 450; $i++) {
            $checkpoint = Checkpoint::factory()->create();
            $checkpointExisting = Checkpoint::where('route_id', $checkpoint->route_id);
            if ($checkpointExisting->count() > 1) {
                $checkpoint->order = $checkpointExisting->count() - 1;
                $checkpoint->save();
            }
        }

        foreach (Checkpoint::all() as $checkpoint) {
            $question = null;
            for ($i = 1; $i <= rand(0, 5); $i++) {
                $question = Question::factory()->create([
                    'checkpoint_id' => $checkpoint->id,
                ]);
                $questionExisting = Question::where('checkpoint_id', $question->checkpoint_id);
                if ($questionExisting->count() > 1) {
                    $question->order = $questionExisting->count() - 1;
                    $question->save();
                }

                $type = $question->type;

                if ($type === 'multiple_choice') {
                    $true = rand(0, 3);
                    for ($j = 0; $j < rand(3, 5); $j++) {
                        $correct = false;
                        if ((bool) $true) {
                            $correct = (bool) rand(0, 1);
                        }
                        if ($correct) {
                            $true -= 1;
                        }
                        $question->answers()->create([
                            'answer' => fake()->sentence(6).($correct ? ' (correct)' : ''),
                            'is_correct' => $correct,
                        ]);
                    }
                } elseif ($type === 'true_or_false') {
                    $question->answers()->create([
                        'answer' => 'True (correct)',
                        'is_correct' => true,
                    ]);
                    $question->answers()->create([
                        'answer' => 'False',
                        'is_correct' => false,
                    ]);
                } elseif ($type === 'short_answer') {
                    Answer::factory(rand(1, 5))->create([
                        'question_id' => $question->id,
                        'is_correct' => true,
                    ]);
                }
            }
        }

        Progress::factory(rand(50, 150))->create();

        Media::factory(rand(50, 150))->create();
    }
}
