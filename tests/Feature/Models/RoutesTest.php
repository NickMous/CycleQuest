<?php

use App\Models\Checkpoint;
use App\Models\Route;
use App\Models\User;

test('routes are linked to users', function () {
    $user = User::factory()->create();
    $route = Route::factory()->create(['user_id' => $user->id]);

    expect($route->user->id)->toBe($user->id);
});

test('routes can get their checkpoints', function () {
    User::factory()->create();
    $route = Route::factory()->create();
    $checkpoint = Checkpoint::factory()->create(['route_id' => $route->id, 'name' => 'Checkpoint 1']);

    expect($route->checkpoints->first()->name)->toBe('Checkpoint 1');
});

test('routes can get their checkpoints in order', function () {
    User::factory()->create();
    $route = Route::factory()->create();
    $checkpoint1 = Checkpoint::factory()->create(['route_id' => $route->id, 'name' => 'Checkpoint 1', 'order' => 1]);
    $checkpoint2 = Checkpoint::factory()->create(['route_id' => $route->id, 'name' => 'Checkpoint 2', 'order' => 2]);

    expect($route->checkpoints->first()->name)->toBe('Checkpoint 1');
    expect($route->checkpoints->last()->name)->toBe('Checkpoint 2');
});

test('routes can have at least 8 checkpoints', function () {
    User::factory()->create();
    $route = Route::factory()->create();
    Checkpoint::factory()->count(8)->create(['route_id' => $route->id]);

    expect($route->checkpoints->count())->toBe(8);
});

test('routes can have many media', function () {
    User::factory()->create();
    $route = Route::factory()->create();
    $media = $route->media()->create(['url' => 'https://example.com/image.jpg']);

    expect($route->media->first()->url)->toBe($media->url);
});

test('routes can have many progress', function () {
    $user = User::factory()->create();
    $route = Route::factory()->create();
    $progress = $route->progress()->create(['user_id' => $user->id]);

    expect($route->progress->first()->user_id)->toBe($progress->user_id);
});
