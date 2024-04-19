@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4 pt-20">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

            <h1>Create New Exercise</h1>
            <form method="POST" action="{{ route('instructor.exercises.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Title:</label>
                    <input type="text" name="title" id="title" value="{{ old('title') }}" class="form-control shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Exercise Title">
                </div>
                <div class="mb-4">
                    <label for="question" class="block text-gray-700 text-sm font-bold mb-2">Question:</label>
                    <textarea name="question" id="question" class="form-control shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ old('question') }}</textarea>
                </div>
                <div class="mb-4">
                    <label for="initial_code_editor" class="block text-gray-700 text-sm font-bold mb-2">Initial Code:</label>
                    <div id="initial_code_editor" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" style="height: 200px;"></div>
                    <textarea name="initial_code" id="initial_code" class="hidden">{{ old('initial_code') }}</textarea>
                </div>
                <div class="mb-4">
                    <label for="test_code_editor" class="block text-gray-700 text-sm font-bold mb-2">Test Code:</label>
                    <div id="test_code_editor" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" style="height: 200px;"></div>
                    <textarea name="test_code" id="test_code" class="hidden">{{ old('test_code') }}</textarea>
                </div>
                <div class="mb-4">
                    <label for="expected_output" class="block text-gray-700 text-sm font-bold mb-2">Expected Output:</label>
                    <textarea name="expected_output" id="expected_output" class="form-control shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ old('expected_output') }}</textarea>
                </div>
                <div class="mb-4">
                    <label for="points_reward" class="block text-gray-700 text-sm font-bold mb-2">Points Reward:</label>
                    <input type="number" name="points_reward" id="points_reward" value="{{ old('points_reward', 5) }}" class="form-control shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <input type="hidden" name="chapter_id" value="{{ request('chapter_id') }}">
                <button type="submit" class="btn btn-primary mt-2">Create Exercise</button>
            </form>
    </div>

    <script src="https://cdn.tiny.cloud/1/zrpcg1x4ynlays7o2fexsq6ecvj3spkuebyxobx20yepris3/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.4.12/ace.js" type="text/javascript" charset="utf-8"></script>
    <script>
        var editorMode = "{{ $editorMode ?? 'ace/mode/plain_text' }}";
    </script>
    <script src="{{ asset('js/editor-setup.js') }}"></script>

@endsection
