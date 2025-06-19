@extends('layouts.app')

@section('title', 'List of tasks')

@section('content')

    <div>
        <a class="bg-blue-400 px-5 py-3 text-white font-bold w-full block cursor-pointer transition-all ease-in-out duration-300 hover:bg-blue-500 text-center" href="{{ route('tasks.create') }}">Add task</a>
    </div>

    <div class="flex flex-col my-4 flex-1">
        @forelse ($tasks as $task)
            @if (!$task->completed)
                <a class="px-4 py-4 my-1 bg-white hover:bg-slate-200 transition-all ease-in-out duration-300 text-slate-600" href="{{ route('tasks.show', ['id' => $task->id]) }}">{{ $task->title }}</a>
            @else 
                <a class="px-4 py-4 my-1 bg-white hover:bg-slate-200 transition-all ease-in-out duration-300 text-slate-300 line-through" href="{{ route('tasks.show', ['id' => $task->id]) }}">{{ $task->title }}</a>
            @endif
        @empty
            <div>There are no tasks</div>
        @endforelse
    </div>

@endsection