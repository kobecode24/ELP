@extends('layouts.app')

@section('content')
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
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center">
            <h1 class="text-2xl font-bold my-4">Your Courses</h1>
            <a href="{{ route('courses.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Create New Course
            </a>
        </div>

        @if($courses->isEmpty())
            <div class="bg-white p-4 rounded-md shadow-md">
                <p class="text-gray-700">You have not created any courses yet.</p>
            </div>
        @else
            <div class="bg-white shadow-md rounded-md overflow-hidden">
                <ul class="divide-y divide-gray-200">
                    @foreach($courses as $course)
                        <li class="p-4 hover:bg-gray-50 flex justify-between items-center">
                            <div class="flex items-center">
                                @if($course->image_url)
                                    <img src="{{ $course->image_url }}" alt="Course Image" class="w-16 h-16 mr-4 rounded">
                                @else
                                    <img src="https://res.cloudinary.com/hkjp5o9bu/image/upload/v1708551498/default_images/ofztxhwstxzvgchzthoi.png" alt="Default Image" class="w-16 h-16 mr-4 rounded">
                                @endif
                                    <div>
                                        <a href="{{ route('courses.show', $course->id) }}" class="text-lg font-semibold text-gray-800 hover:text-gray-600 transition-colors duration-200">{{ $course->title }}</a>
                                    </div>
                            </div>
                            <div class="flex items-center space-x-2">
                                <a href="{{ route('courses.edit', $course->id) }}" class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center">
                                    <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M17.414 2.586a2 2 0 0 0-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 0 0 0-2.828zM3 17a2 2 0 0 0 2 2h12v-2H5V4H3v13z"/></svg>
                                    <span>Edit</span>
                                </a>
                                <form action="{{ route('courses.destroy', $course->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded inline-flex items-center">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </li>
                    @endforeach

                </ul>
            </div>
        @endif
    </div>
@endsection
