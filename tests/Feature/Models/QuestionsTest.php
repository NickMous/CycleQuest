<?php

use App\Models\Checkpoint;
use App\Models\Question;
use App\Models\Route;
use App\Models\User;

test('a question can have no answers', function () {
    User::factory()->create();
    Route::factory()->create();
    Checkpoint::factory()->create();
    $question = Question::factory()->create();
    expect($question->answers->count())->toBe(0);
});

test('a question is linked to a checkpoint', function () {
    User::factory()->create();
    Route::factory()->create();
    $checkpoint = Checkpoint::factory()->create();
    $question = Question::factory()->create(['checkpoint_id' => $checkpoint->id]);
    expect($question->checkpoint->id)->toBe($checkpoint->id);
});

test('a question can have many answers', function () {
    User::factory()->create();
    Route::factory()->create();
    Checkpoint::factory()->create();
    $question = Question::factory()->create();
    $answer = $question->answers()->create(['answer' => 'Paris']);
    expect($question->answers->first()->answer)->toBe($answer->answer);
});

test('a question can get its answers', function () {
    User::factory()->create();
    Route::factory()->create();
    Checkpoint::factory()->create();
    $question = Question::factory()->create();
    $answer = $question->answers()->create(['answer' => 'Paris']);
    expect($question->answers->first()->answer)->toBe($answer->answer);
});

test('a question can have 1 answer', function () {
    User::factory()->create();
    Route::factory()->create();
    Checkpoint::factory()->create();
    $question = Question::factory()->create();
    $answer = $question->answers()->create(['answer' => 'Paris']);
    expect($question->answers->count())->toBe(1);
});

test('a question can have multiple correct answers', function () {
    User::factory()->create();
    Route::factory()->create();
    Checkpoint::factory()->create();
    $question = Question::factory()->create();
    $answer1 = $question->answers()->create(['answer' => 'Paris', 'is_correct' => true]);
    $answer2 = $question->answers()->create(['answer' => 'France', 'is_correct' => true]);
    expect($question->answers->where('is_correct', true)->count())->toBe(2);
});
