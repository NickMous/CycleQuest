<?php

use App\Livewire\Home;

// Smoke test
test('Component exists on the page', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
    $response->assertSeeLivewire(Home::class);
})->group('home');

test('Home page can be rendered', function () {
    Livewire::test(Home::class)
//        ->assertSee('CycleQuest')
        ->assertStatus(200)
        ->assertDontSee('jetstream');
})->group('home');
