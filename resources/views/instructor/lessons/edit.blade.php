@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <h1>Edit Lesson</h1>
        <form action="{{ route('lessons.update', $lesson->id) }}" method="POST">
            @csrf
            @method('PUT')

            <input type="hidden" name="chapter_id" value="{{ request('chapter_id') ?? $lesson->chapter_id }}">
            <div>
                <label for="title">Title</label>
                <input type="text" name="title" id="title" value="{{ $lesson->title }}" required class="form-control">
            </div>

            <div>
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control">{{ $lesson->description }}</textarea>
            </div>

            <div>
                <label for="content">Content</label>
                <textarea name="content" id="content" required class="form-control">{{ $lesson->content }}</textarea>
            </div>

            <div>
                <label for="video_url">Video URL</label>
                <input type="text" name="video_url" id="video_url" value="{{ $lesson->video_url }}" required class="form-control">
            </div>

            <button type="submit" class="btn btn-primary mt-4">Update Lesson</button>
        </form>
    </div>
@endsection
