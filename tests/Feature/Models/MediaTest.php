<?php

use App\Models\Answer;
use App\Models\Checkpoint;
use App\Models\Media;
use App\Models\Question;
use App\Models\Route;
use App\Models\User;

test('media can be linked to a route', function () {
    User::factory()->create();
    $route = Route::factory()->create();
    Checkpoint::factory()->create(['route_id' => $route->id]);
    $media = Media::factory()->create(['mediable_type' => 'App\Models\Route', 'mediable_id' => $route->id]);

    expect($media->mediable->id)->toBe($route->id);
});

test('media can be linked to a question', function () {
    User::factory()->create();
    $route = Route::factory()->create();
    Checkpoint::factory()->create();
    $question = Question::factory()->create();
    $media = Media::factory()->create(['mediable_type' => 'App\Models\Question', 'mediable_id' => $question->id]);

    expect($media->mediable->id)->toBe($question->id);
});

test('media can be linked to a checkpoint', function () {
    User::factory()->create();
    $route = Route::factory()->create();
    $checkpoint = Checkpoint::factory()->create();
    $media = Media::factory()->create(['mediable_type' => 'App\Models\Checkpoint', 'mediable_id' => $checkpoint->id]);

    expect($media->mediable->id)->toBe($checkpoint->id);
});

test('media can be linked to an answer', function () {
    User::factory()->create();
    $route = Route::factory()->create();
    Checkpoint::factory()->create();
    Question::factory()->create();
    $answer = Answer::factory()->create();
    $media = Media::factory()->create(['mediable_type' => 'App\Models\Answer', 'mediable_id' => $answer->id]);

    expect($media->mediable->id)->toBe($answer->id);
});

test('multiple media can be linked to a route', function () {
    User::factory()->create();
    $route = Route::factory()->create();
    Checkpoint::factory()->create(['route_id' => $route->id]);
    $media = Media::factory()->count(2)->create(['mediable_type' => 'App\Models\Route', 'mediable_id' => $route->id]);

    expect($route->media->count())->toBe(2);
});
