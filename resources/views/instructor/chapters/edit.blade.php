@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4 pt-32">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <h1 class="text-xl font-bold mb-4">Edit Chapter</h1>
        <form action="{{ route('instructor.chapters.update', $chapter->id) }}" method="POST">
            @csrf
            @method('PUT')

            <input type="hidden" name="course_id" value="{{ $chapter->course_id }}">

            <div class="mb-4">
                <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Title:</label>
                <input type="text" name="title" id="title" value="{{ $chapter->title }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>
            <div class="mb-4">
                <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description:</label>
                <textarea name="description" id="description" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ $chapter->description }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update Chapter</button>
        </form>
    </div>
@endsection
