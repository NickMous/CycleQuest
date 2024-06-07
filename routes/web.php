<?php

use App\Livewire\Home;
use App\Livewire\Misc\UnderConstruction;
use Illuminate\Support\Facades\Route;
use Spatie\Health\Http\Controllers\HealthCheckResultsController;

Route::get('/', Home::class)->name('home');
Route::get('/language/{locale}', function ($locale) {
    session()->put('locale', $locale);
    return redirect()->back();
})->name('language');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::prefix('notifications')->name('notifications.')->group(function () {
        Route::get('', UnderConstruction::class)->name('index');
    });
});

Route::middleware([
    'can:manage health checks',
])->group(function () {
    Route::get('health', HealthCheckResultsController::class);
});
