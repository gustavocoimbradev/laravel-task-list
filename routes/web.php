<?php

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Root
Route::get('/', function () {
    return redirect()->route('tasks.index');
});

// All tasks
Route::get('/tasks', function () {
    return view('tasks.index', [
        'tasks' => Task::select('id', 'title', 'completed')->orderBy('completed', 'asc')->orderBy('id', 'desc')->get()
    ]);
})->name('tasks.index');

// Single task
Route::get('/tasks/{task}', function (Task $task) {
    return view('tasks.show', [
        'task' => $task
    ]);
})->whereNumber('task')->name('tasks.show');

// Edit task
Route::get('/tasks/{task}/edit', function (Task $task) {
    return view('tasks.edit', [
        'task' => $task
    ]);
})->whereNumber('task')->name('tasks.edit');

Route::put('/tasks/{task}/edit', function (Task $task, TaskRequest $request) {
    $task->update($request->validated());
    return redirect()->route('tasks.show', ['task' => $task->id])
        ->with('success', 'Task updated successfuly!');
})->name('tasks.update');

// Create task
Route::get('/tasks/create', function () {
    return view('tasks.create');
})->name('tasks.create');

Route::post('/tasks/create', function (TaskRequest $request) {
    $task = Task::create($request->validated());
    return redirect()->route('tasks.show', ['task' => $task->id])
        ->with('success', 'Task created successfuly!');
})->name('tasks.store');

// Toggle task status
Route::any('/tasks/{task}/toggle', function (Task $task) {
    $task->completed = !$task->completed;
    $task->save();
    return redirect()->route('tasks.show', ['task' => $task->id]);
})->name('tasks.toggle');

// Delete task
Route::delete('/tasks/{task}/destroy', function(Task $task) {
    $task->delete();
    return redirect()->route('tasks.index')
    ->with('success','Task deleted successfully!');
})->name('tasks.destroy');

// 404
Route::fallback(function () {
    return 'Página não encontrada!';
});
