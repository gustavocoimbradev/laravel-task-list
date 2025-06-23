<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

// Root
Route::get('/', function () {
    return redirect()->route('tasks.index');
});

// All tasks
Route::get('/tasks', [TaskController::class, 'index'])
    ->name('tasks.index');

// Single task
Route::get('/tasks/{task}', [TaskController::class, 'show'])
    ->whereNumber('task')
    ->name('tasks.show');

// Edit task
Route::get('/tasks/{task}/edit', [TaskController::class, 'edit'])
    ->whereNumber('task')
    ->name('tasks.edit');

Route::put('/tasks/{task}', [TaskController::class, 'update'])
    ->whereNumber('task')
    ->name('tasks.update');

// Create task
Route::get('/tasks/create', [TaskController::class, 'create'])
    ->name('tasks.create');

Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');

// Toggle status
Route::any('/tasks/{task}/toggle', [TaskController::class, 'toggle'])
    ->whereNumber('task')
    ->name('tasks.toggle');

// Delete task
Route::delete('/tasks/{task}/destroy', [TaskController::class, 'destroy'])
    ->whereNumber('task')
    ->name('tasks.destroy');

// 404
Route::fallback(function () {
    return 'Página não encontrada!';
});

