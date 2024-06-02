<?php

use App\Models\Checkpoint;
use App\Models\Route;
use App\Models\User;

test('a checkpoint can have no questions', function () {
    User::factory()->create();
    Route::factory()->create();
    $checkpoint = Checkpoint::factory()->create();
    expect($checkpoint->questions->count())->toBe(0);
});

test('a checkpoint is linked to a route', function () {
    User::factory()->create();
    $route = Route::factory()->create();
    $checkpoint = Checkpoint::factory()->create(['route_id' => $route->id]);
    expect($checkpoint->route->id)->toBe($route->id);
});

test('a checkpoint can have many media', function () {
    User::factory()->create();
    Route::factory()->create();
    $checkpoint = Checkpoint::factory()->create();
    $media = $checkpoint->media()->create(['url' => 'https://example.com/image.jpg']);
    expect($checkpoint->media->first()->url)->toBe($media->url);
});

test('a checkpoint can get its questions', function () {
    User::factory()->create();
    Route::factory()->create();
    $checkpoint = Checkpoint::factory()->create();
    $question = $checkpoint->questions()->create(['question' => 'What is the capital of France?']);
    expect($checkpoint->questions->first()->question)->toBe($question->question);
});

test('a checkpoint can get its questions in order', function () {
    User::factory()->create();
    Route::factory()->create();
    $checkpoint = Checkpoint::factory()->create();
    $question1 = $checkpoint->questions()->create(['question' => 'What is the capital of France?', 'order' => 1]);
    $question2 = $checkpoint->questions()->create(['question' => 'What is the capital of Spain?', 'order' => 2]);
    expect($checkpoint->questions->first()->question)->toBe($question1->question)
        ->and($checkpoint->questions->last()->question)->toBe($question2->question);
});

test('a checkpoint can have at least 3 questions', function () {
    User::factory()->create();
    Route::factory()->create();
    $checkpoint = Checkpoint::factory()->create();
    $questions = $checkpoint->questions()->createMany([
        ['question' => 'What is the capital of France?'],
        ['question' => 'What is the capital of Spain?'],
        ['question' => 'What is the capital of Italy?'],
    ]);
    expect($checkpoint->questions->count())->toBe(3);
});
