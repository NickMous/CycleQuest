<?php

use App\Models\Answer;
use App\Models\Checkpoint;
use App\Models\Question;
use App\Models\Route;
use App\Models\User;

test('an answer can be linked to a question', closure: function () {
    User::factory()->create();
    Route::factory()->create();
    Checkpoint::factory()->create();
    $question = Question::factory()->create();
    $answer = Answer::factory()->create(['question_id' => $question->id]);

    expect($answer->question->id)->toBe($question->id);
});

test('an answer can be correct', closure: function () {
    User::factory()->create();
    Route::factory()->create();
    Checkpoint::factory()->create();
    $question = Question::factory()->create();
    $answer = Answer::factory()->create(['question_id' => $question->id, 'is_correct' => true]);

    expect($answer->is_correct)->toBe(true);
});
