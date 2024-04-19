@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4 pt-24">
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Oops!</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="w-full max-w-2xl mx-auto bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <h2 class="text-xl font-bold mb-4">Create a New Lesson</h2>
            <form action="{{ route('instructor.lessons.store') }}" method="POST"  id="myForm" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Title:</label>
                    <input type="text" name="title" id="title" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4">
                    <label for="content" class="block text-gray-700 text-sm font-bold mb-2">Content:</label>
                    <textarea name="content" id="content" rows="5" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"></textarea>
                </div>
                <div class="mb-4">
                    <label for="video_url" class="block text-gray-700 text-sm font-bold mb-2">Video URL:</label>
                    <input name="video_url" id="video_url" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    <span id="videoError" style="color: red; display: none;"></span>
                </div>
                <div class="mb-4" id="video-file-container">
                    <label for="video" class="block text-gray-700 text-sm font-bold mb-2">Or Upload Video:</label>
                    <input type="file" name="video" id="video" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <input type="hidden" name="chapter_id" value="{{ $chapter->id ?? '' }}">
                <div class="flex items-center justify-between">
                    <div class="bg-blue-500">
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                            Create Lesson
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/izitoast/dist/js/iziToast.min.js"></script>

    <script src="https://cdn.tiny.cloud/1/zrpcg1x4ynlays7o2fexsq6ecvj3spkuebyxobx20yepris3/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#content',
            plugins: 'link image code',
            toolbar: 'undo redo | formatselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | code',
            height: 300,
        });
    </script>

    <script src="{{asset('js/lessonForm.js')}}"></script>
@endsection


