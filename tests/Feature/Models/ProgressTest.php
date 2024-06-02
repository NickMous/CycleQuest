<?php

use App\Models\Answer;
use App\Models\Checkpoint;
use App\Models\Progress;
use App\Models\Question;
use App\Models\Route;
use App\Models\User;

test('a progress can be linked to a route', function () {
    $user = User::factory()->create();
    $route = Route::factory()->create();
    Checkpoint::factory()->create();
    Question::factory()->create();
    Answer::factory()->create();
    $progress = Progress::factory()->create(['route_id' => $route->id]);

    expect($progress->route->id)->toBe($route->id);
});

test('a progress can be linked to a user', function () {
    $user = User::factory()->create();
    $route = Route::factory()->create();
    Checkpoint::factory()->create();
    Question::factory()->create();
    Answer::factory()->create();
    $progress = Progress::factory()->create(['user_id' => $user->id]);

    expect($progress->user->id)->toBe($user->id);
});

test('a progress can be linked to a checkpoint', function () {
    $user = User::factory()->create();
    $route = Route::factory()->create();
    $checkpoint = Checkpoint::factory()->create();
    Question::factory()->create();
    Answer::factory()->create();
    $progress = Progress::factory()->create(['checkpoint_id' => $checkpoint->id]);

    expect($progress->checkpoint->id)->toBe($checkpoint->id);
});

test('a progress can be linked to a question', function () {
    $user = User::factory()->create();
    $route = Route::factory()->create();
    Checkpoint::factory()->create();
    $question = Question::factory()->create();
    Answer::factory()->create();
    $progress = Progress::factory()->create(['question_id' => $question->id]);

    expect($progress->question->id)->toBe($question->id);
});

test('an user can have many progress', function () {
    $user = User::factory()->create();
    $route = Route::factory()->create();
    Checkpoint::factory()->create();
    Question::factory()->create();
    Answer::factory()->create();
    $progress = Progress::factory()->count(2)->create(['user_id' => $user->id]);

    expect($user->progress->count())->toBe(2);
});

test('a route can have many progress', function () {
    $user = User::factory()->create();
    $route = Route::factory()->create();
    Checkpoint::factory()->create();
    Question::factory()->create();
    Answer::factory()->create();
    $progress = Progress::factory()->count(2)->create(['route_id' => $route->id]);

    expect($route->progress->count())->toBe(2);
});
