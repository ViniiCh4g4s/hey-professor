<?php

use App\Http\Controllers\{DashboardController, Question, QuestionController};
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;

if (app()->isLocal()) {
    Route::get('/', function () {
        auth()->loginUsingId(1);

        return redirect()->route('dashboard');
    })->name('home');
} else {
    Route::inertia('/', 'welcome', [
        'canRegister' => Features::enabled(Features::registration()),
    ])->name('home');
}

Route::get('dashboard', DashboardController::class)->middleware(['auth', 'verified'])->name('dashboard');
Route::post('question/store', [QuestionController::class, 'store'])->name('questions.store');
Route::post('question/{question}/vote', Question\VoteController::class)->name('questions.vote');

// Route::middleware(['auth', 'verified'])->group(function () {
//    Route::inertia('dashboard', 'dashboard')->name('dashboard');
// });

require __DIR__ . '/settings.php';
