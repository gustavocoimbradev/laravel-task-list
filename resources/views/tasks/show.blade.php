@extends('layouts.app')

@section('title', $task->title)

@section('content')

    <div>
        <h4 class="mb-4 text-md text-slate-600 font-medium">{{ $task->description }}</h4>
        @if ($task->long_description)
            <p class="mb-4 text-slate-600 text-md">{{ $task->long_description }}</p>
        @endif
    </div>

    <div class="flex justify-start gap-6 mb-6">
        <small class="text-sm text-slate-400">
            Created at <time>{{ \Carbon\Carbon::parse($task->created_at)->format('m/d/Y H:i') }}</time>
        </small>
        <small class="text-sm text-slate-400">
            Updated at <time>{{ \Carbon\Carbon::parse($task->updated_at)->format('m/d/Y H:i') }}</time>
        </small>
    </div>

    <div class="flex flex-col gap-4">
        <a class="bg-purple-400 hover:bg-purple-500 px-5 py-3 text-white font-bold w-full block cursor-pointer transition-all ease-in-out duration-300 text-center"
            href="{{ route('tasks.edit', $task->id) }}">Edit task</a>
        <a class="{{ $task->completed ? 'bg-red-400' : 'bg-blue-400'}} px-5 py-3 text-white font-bold w-full block cursor-pointer transition-all ease-in-out duration-300 {{ $task->completed ? 'hover:bg-red-500' : 'hover:bg-blue-500'}} text-center"
            href="{{ route('tasks.toggle', $task) }}">{{ $task->completed ? 'Mark as not done' : 'Mark as done'}}</a>
        <a class="bg-slate-400 px-5 py-3 text-white font-bold w-full block text-center cursor-pointer transition-all ease-in-out duration-300 hover:bg-slate-500"
            href="{{ route('tasks.index') }}">Back to home</a>
    </div>

@endsection