@extends('layouts.app')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="container mx-auto p-4">
        <div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow">
            <h1 class="text-2xl font-semibold mb-6">Edit Course: {{ $course->title }}</h1>
            <form action="{{ route('instructor.courses.update', $course) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                @if($course->image_url)
                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Current Course Image</label>
                        <img src="{{ $course->image_url }}" alt="Course Image" class="w-full max-w-xs">
                    </div>
                @endif

                <div class="mb-4">
                    <label for="title" class="block text-gray-700 font-bold mb-2">Course Title</label>
                    <input type="text" name="title" id="title" value="{{ $course->title }}"
                           class="w-full p-3 rounded border shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                           required>
                </div>

                <div class="mb-4">
                    <label for="description" class="block text-gray-700 font-bold mb-2">Description</label>
                    <textarea name="description" id="description"
                              class="w-full p-3 h-40 rounded border shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">{{ $course->description }}</textarea>
                </div>

                <div class="mb-4">
                    <label for="requirements" class="block text-gray-700 font-bold mb-2">Requirements</label>
                    <input type="text" name="requirements" id="requirements" value="{{ $course->requirements }}"
                           class="w-full p-3 rounded border shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                </div>

                <div class="mb-4">
                    <label for="points_required" class="block text-gray-700 font-bold mb-2">Points Required</label>
                    <input type="number" name="points_required" id="points_required" value="{{ $course->points_required }}"
                           class="w-full p-3 rounded border shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                </div>

                <div class="mb-4">
                    <label for="programming_language_id" class="block text-gray-700 font-bold mb-2">Programming Language</label>
                    <select name="programming_language_id" id="programming_language_id"
                            class="w-full p-3 rounded border shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        @foreach($programmingLanguages as $language)
                            <option value="{{ $language->id }}" {{ $course->programming_language_id === $language->id ? 'selected' : '' }}>{{ $language->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label for="spoken_language_id" class="block text-gray-700 font-bold mb-2">Spoken Language</label>
                    <select name="spoken_language_id" id="spoken_language_id"
                            class="w-full p-3 rounded border shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        @foreach($spokenLanguages as $language)
                            <option value="{{ $language->id }}" {{ $course->spoken_language_id === $language->id ? 'selected' : '' }}>{{ $language->name }}</option>
                        @endforeach
                    </select>

                <div class="mb-4">
                    <label for="image" class="block text-gray-700 font-bold mb-2">Course Image</label>
                    <input type="file" name="course_images" id="image"
                           class="w-full border rounded p-2 text-gray-700 file:mr-4 file:py-2 file:px-4
                    file:rounded file:border-0 file:text-sm file:font-semibold
                    file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                </div>

                <button type="submit"
                        class="w-full bg-blue-500 text-white font-bold py-2 px-4 rounded hover:bg-blue-700">
                    Update Course
                </button>
                </div>
            </form>
        </div>
    </div>
@endsection
