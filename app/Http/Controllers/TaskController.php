<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // All tasks
    public function index()
    {
        $tasks = Task::select('id', 'title', 'completed')
            ->orderBy('completed', 'asc')
            ->orderBy('id', 'desc')
            ->paginate(7);
        return view('tasks.index', compact('tasks'));
    }

    // Single task
    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    // Edit task
    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }
    public function update(Task $task, TaskRequest $request)
    {
        $task->update($request->validated());
        return redirect()
            ->route('tasks.show', $task->id)
            ->with('success', 'Task updated successfuly!');
    }

    // Create task
    public function create()
    {
        return view('tasks.create');
    }
    public function store(TaskRequest $request)
    {
        $task = Task::create($request->validated());
        return redirect()
            ->route('tasks.show', $task->id)
            ->with('success', 'Task created successfuly!');
    }

    // Toggle status
    public function toggle(Task $task)
    {
        $task->completed = !$task->completed;
        $task->save();
        return redirect()
            ->route('tasks.show', $task->id);
    }

    // Delete task
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()
            ->route('tasks.index')
            ->with('success', 'Task deleted successfully!');
    }
}
