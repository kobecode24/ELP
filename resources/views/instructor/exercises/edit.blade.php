@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <h1>Edit Exercise</h1>
        <form method="POST" action="{{ route('exercises.update', $exercise->id) }}">
            @csrf
            @method('PUT')
            <div>
                <label for="question">Question</label>
                <textarea name="question" id="question" required class="form-control">{{ $exercise->question }}</textarea>
            </div>
            <div>
                <label for="initial_code">Initial Code</label>
                <textarea name="initial_code" id="initial_code" class="form-control">{{ $exercise->initial_code }}</textarea>
            </div>
            <div>
                <label for="test_code">Test Code</label>
                <textarea name="test_code" id="test_code" required class="form-control">{{ $exercise->test_code }}</textarea>
            </div>
            <div>
                <label for="expected_output">Expected Output</label>
                <textarea name="expected_output" id="expected_output" required class="form-control">{{ $exercise->expected_output }}</textarea>
            </div>
            <div>
                <label for="points_reward">Points Reward</label>
                <input type="number" name="points_reward" id="points_reward" required class="form-control" value="{{ $exercise->points_reward }}">
            </div>
            <input type="hidden" name="chapter_id" value="{{ $exercise->chapter_id }}">
            <button type="submit" class="btn btn-primary mt-2">Update Exercise</button>
        </form>
    </div>
@endsection
