<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskAssignmentController;

Route::get('/', function () {
    return view('pages.home.index');
})->name('home.index');


Route::middleware(['auth'])->group(function () {
    Route::resource('tasks', TaskController::class)->except(['show', 'destroy']);

   Route::resource('projects', ProjectController::class)->except('view');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
