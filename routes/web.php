<?php

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
Route::get('/tasks/{id}', function ($id) {
    return view('tasks.show', [
        'task' => Task::findOrFail($id)
    ]);
})->whereNumber('id')->name('tasks.show');

// Create task
Route::get('/tasks/create', function () {
    return view('tasks.create');
})->name('tasks.create');

Route::post('/tasks/create', function (Request $request) {

    $data = $request->validate([
        'title'             => 'required|max:255',
        'description'       => 'required',
        'long_description'  => 'required'
    ]);

    $task                   = new Task;
    $task->title            = $data['title'];
    $task->description      = $data['description'];
    $task->long_description = $data['long_description'];
    $task->save();

    return redirect()->route('tasks.show', ['id' => $task->id])
        ->with('success', 'Task created successfuly!');
        
})->name('tasks.store');

// Toggle task status
Route::any('/tasks/{id}/toggle', function ($id) {
    $task = Task::findOrFail($id);
    $task->completed = !$task->completed;
    $task->save();
    return redirect()->route('tasks.show', ['id'=> $task->id]);
})->name('tasks.toggle');

// 404
Route::fallback(function () {
    return 'Página não encontrada!';
});
