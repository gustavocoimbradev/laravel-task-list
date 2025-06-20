@extends('layouts.app')

@section('title', 'Add task')

@section('content')
    <form action="{{ route('tasks.store') }}" method="POST" class="flex flex-col gap-3">
        @csrf
        <fieldset>
            <label for="title" class="block mb-2 text-slate-500">Title</label>
            <input type="text" name="title" id="title" class="border-1 border-slate-200 py-2 px-4 bg-white outline-none w-full transition-all ease-in-out duration-300 focus:border-slate-500"/>
            @error('title')
                <span class="text-red-500">{{$message}}</span>
            @enderror
        </fieldset>
        <fieldset>
            <label for="description" class="block mb-2 text-slate-500">Description</label>
            <textarea name="description" id="description" rows="3" class="border-1 border-slate-200 py-2 px-4 bg-white outline-none w-full transition-all ease-in-out duration-300 focus:border-slate-500"></textarea>
            @error('description')
                <span class="text-red-500">{{$message}}</span>
            @enderror
        </fieldset>
        <fieldset>
            <label for="long_description" class="block mb-2 text-slate-500">Long description</label>
            <textarea name="long_description" id="long_description" rows="10" class="border-1 border-slate-200 py-2 px-4 bg-white outline-none w-full transition-all ease-in-out duration-300 focus:border-slate-500"></textarea>
            @error('long_description')
                <span class="text-red-500">{{$message}}</span>
            @enderror
        </fieldset>
        <fieldset class="flex flex-col gap-4">
            <button type="submit" class="bg-blue-400 px-5 py-3 text-white font-bold w-full block cursor-pointer transition-all ease-in-out duration-300 hover:bg-blue-500">Add task</button>
            <a href="{{ route('tasks.index') }}" class="bg-slate-400 px-5 py-3 text-white font-bold w-full block text-center cursor-pointer transition-all ease-in-out duration-300 hover:bg-slate-500">Cancel</a>
        </fieldset>
    </form>
@endsection