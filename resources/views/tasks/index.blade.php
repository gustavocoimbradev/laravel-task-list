@extends('layouts.app')

@section('title', 'List of tasks')

@section('content')

    <div>
        <a class="bg-blue-400 px-5 py-3 text-white font-bold w-full block cursor-pointer transition-all ease-in-out duration-300 hover:bg-blue-500 text-center" href="{{ route('tasks.create') }}">Add task</a>
    </div>

    <div class="flex flex-col my-4 flex-1">
        @forelse ($tasks as $task)
            <article class="flex my-1 group">
                <a class="flex-1 block px-4 py-4  bg-white transition-all ease-in-out duration-300 {{ $task->completed ? 'text-slate-300 line-through' : 'text-slate-600' }}" href="{{ route('tasks.show', ['task' => $task->id]) }}" class="">{{ $task->title }}</a>
                <form action="{{ route('tasks.destroy', ['task' => $task->id]) }}" method="POST" class="bg-white flex">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-slate-200 text-white font-bold cursor-pointer hover:bg-red-200 transition-all ease-in-out duration-300 px-4 py-4 ">X</button>
                </form>
            </article>
        @empty
            <div>There are no tasks</div>
        @endforelse
    </div>

    @if ($tasks->count())
        {{ $tasks->links() }}
    @endif

@endsection