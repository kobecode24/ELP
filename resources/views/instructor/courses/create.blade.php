@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto px-4 py-20">

    @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Success!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
        </span>
            </div>
        @elseif (session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Error!</strong>
                <span class="block sm:inline">{{ session('error') }}</span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
        </span>
            </div>
        @endif

                <h2 class="text-2xl font-semibold mb-6">Create a New Course</h2>
                <form action="{{ route('instructor.courses.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700">Course Title:</label>
                        <input type="text" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:ring-indigo-500 focus:border-indigo-500" id="title" name="title" required>
                    </div>
                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700">Course Description:</label>
                        <textarea class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:ring-indigo-500 focus:border-indigo-500" id="description" name="description"></textarea>
                    </div>
                    <div>
                        <label for="requirements" class="block text-sm font-medium text-gray-700">Requirements:</label>
                        <textarea class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:ring-indigo-500 focus:border-indigo-500" id="requirements" name="requirements"></textarea>
                    </div>
                    <div>
                        <label for="points_required" class="block text-sm font-medium text-gray-700">Points Required:</label>
                        <input type="number" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:ring-indigo-500 focus:border-indigo-500" id="points_required" name="points_required" value="100">
                    </div>
                    <div>
                        <label for="programming_language_id" class="block text-sm font-medium text-gray-700">Programming Language:</label>
                        <select class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:ring-indigo-500 focus:border-indigo-500" id="programming_language_id" name="programming_language_id">
                            @foreach($programmingLanguages as $language)
                                <option value="{{ $language->id }}">{{ $language->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="spoken_language_id" class="block text-sm font-medium text-gray-700">Spoken Language:</label>
                        <select class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:ring-indigo-500 focus:border-indigo-500" id="spoken_language_id" name="spoken_language_id">
                            @foreach($spokenLanguages as $language)
                                <option value="{{ $language->id }}">{{ $language->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="image" class="block text-sm font-medium text-gray-700">Course Image:</label>
                        <input type="file" class="mt-1 block w-full text-sm text-gray-500 file:border-0 file:py-2 file:px-4 file:rounded-md file:text-sm file:font-semibold file:bg-violet-50 file:text-violet-700 hover:file:bg-violet-100" id="image" name="course_images">
                    </div>
                    <button class="px-12 md:px-32 py-2 rounded-full text-lg font-semibold text-white transition-all duration-300 bg-[#A435F0] hover:bg-purple-500">
                    Submit</button>
                </form>
            </div>

@endsection
