@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4">
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Success!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
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

        <h1 class="text-xl font-bold mb-4">{{ $course->title }}</h1>
        <p>{{ $course->description }}</p>

        <div class="mt-6">
            <h2 class="text-lg font-semibold">Chapters</h2>
            <div class="container mx-auto p-4">
                <!-- Chapters List -->
                @php $counter = 0; @endphp
                @foreach($course->chapters as $chapter)
                    <div class="flex flex-col justify-between items-center p-4 bg-gray-100 rounded mb-2">
                        <div class="flex justify-between items-center w-full">
                            <h3 class="font-semibold">{{ $chapter->title }}</h3>
                            <div class="flex items-center">
                                <a href="{{ route('chapters.edit', $chapter->id) }}" class="px-2 bg-yellow-500 text-white rounded hover:bg-yellow-600">Edit</a>
                                <form action="{{ route('chapters.destroy', $chapter) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-2 bg-red-500 text-white rounded hover:bg-red-600 ml-2">Delete</button>
                                </form>
                                <!-- Toggle Dropdown Icon -->
                                <svg onclick="toggleDropdown('dropdown-{{ $chapter->id }}')" class="ml-2 h-6 w-6 fill-current text-blue-500 cursor-pointer" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"/>
                                </svg>
                            </div>
                        </div>
                        <!-- Dropdown Content -->
                        <div id="dropdown-{{ $chapter->id }}" class="{{ $counter++ == 0 ? '' : 'hidden' }} mt-2 w-full ">
                            <!-- List existing lessons -->
                            @if($chapter->lessons->isNotEmpty())
                                <ul class="text-sm">
                                    @foreach($chapter->lessons as $lesson)
                                        <li class="bg-black-100">
                                            <i class="fas fa-book text-green-500 mr-2"></i>
                                            <a href="{{ route('lessons.show', $lesson->id) }}" class="hover:underline">
                                                {{ $lesson->title }}
                                            </a>
                                            <a href="{{ route('lessons.edit', $lesson->id) }}" class="px-2 bg-yellow-500 text-white rounded hover:bg-yellow-600">Edit</a>
                                            <form action="{{ route('lessons.destroy', $lesson->id) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="px-2 bg-red-500 text-white rounded hover:bg-red-600">Delete</button>
                                            </form>
                                        </li>
                                    @endforeach
                                </ul>
                            @else
                                <p class="text-red-500">No lessons available.</p>
                            @endif
                            <!-- List existing exercises -->
                            @if($chapter->exercises->isNotEmpty())
                                <ul class="text-sm mt-2">
                                    @foreach($chapter->exercises as $exercise)
                                        <li>
                                            <i class="fas fa-dumbbell"></i>
                                            <a href="{{ route('exercises.show', $exercise->id) }}" class="hover:underline">
                                                {{ $exercise->title }}
                                            </a>
                                            <a href="{{ route('exercises.edit', $exercise->id) }}" class="px-2 bg-yellow-500 text-white rounded hover:bg-yellow-600">Edit</a>
                                            <form action="{{ route('exercises.destroy', $exercise->id) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="px-2 bg-red-500 text-white rounded hover:bg-red-600">Delete</button>
                                            </form>
                                        </li>
                                    @endforeach
                                </ul>
                            @else
                                <p class="text-red-500">No exercises available.</p>
                            @endif
                            <div class="flex justify-center">
                                <a href="{{ route('lessons.create', ['chapter_id' => $chapter->id]) }}" class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600 mr-2">Add Lesson</a>
                                <a href="{{ route('exercises.create', ['chapter_id' => $chapter->id]) }}" class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">Add Exercise</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <button onclick="openModal()" class="mt-4 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Add Chapter</button>

        @include('instructor.chapters._addModal')
    </div>
@endsection
