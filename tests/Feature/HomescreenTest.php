<?php

use App\Livewire\Home;
use Livewire\Livewire;

// Smoke test
test('Component exists on the page', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
    $response->assertSeeLivewire(Home::class);
})->group('home');

test('Home page can be rendered', function () {
    Livewire::test(Home::class)
        ->assertStatus(200)
        ->assertDontSee('jetstream');
})->group('home');
