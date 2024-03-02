@extends('layouts.app')

@section('content')
    <div class="container">
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

        <h2>Create a New Course</h2>
        <form action="{{ route('courses.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Course Title:</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="form-group">
                <label for="description">Course Description:</label>
                <textarea class="form-control" id="description" name="description"></textarea>
            </div>
            <div class="form-group">
                <label for="requirements">Requirements:</label>
                <input type="text" class="form-control" id="requirements" name="requirements">
            </div>
            <div class="form-group">
                <label for="points_required">Points Required:</label>
                <input type="number" class="form-control" id="points_required" name="points_required" value="100">
            </div>
            <!-- Dropdown for Programming Language -->
            <div class="form-group">
                <label for="programming_language_id">Programming Language:</label>
                <select class="form-control" id="programming_language_id" name="programming_language_id">
                    @foreach($programmingLanguages as $language)
                        <option value="{{ $language->id }}">{{ $language->name }}</option>
                    @endforeach
                </select>
            </div>
            <!-- Dropdown for Spoken Language -->
            <div class="form-group">
                <label for="spoken_language_id">Spoken Language:</label>
                <select class="form-control" id="spoken_language_id" name="spoken_language_id">
                    @foreach($spokenLanguages as $language)
                        <option value="{{ $language->id }}">{{ $language->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="image">Course Image:</label>
                <input type="file" class="form-control-file" id="image" name="course_images">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
