@extends('layouts.app')

@section('content')
    <div class="bg-gray-100 flex items-center justify-center min-h-screen">
        <div class="bg-white p-6 rounded-lg shadow-lg max-w-md w-full">
            <form action="{{ route('register') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
                <div>
                    <label for="name" class="block font-medium text-gray-700">Name:</label>
                    <input type="text" name="name" value="{{ old('name') }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    @error('name')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <label for="email" class="block font-medium text-gray-700">Email:</label>
                    <input type="email" name="email" value="{{ old('email') }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    @error('email')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <label for="password" class="block font-medium text-gray-700">Password:</label>
                    <input type="password" name="password" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    @error('password')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <label for="password_confirmation" class="block font-medium text-gray-700">Confirm Password:</label>
                    <input type="password" name="password_confirmation" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>
                <div>
                    <label for="image" class="block font-medium text-gray-700">Profile Image:</label>
                    <input type="file" name="image" class="mt-1 block w-full">
                    @error('image')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="w-full bg-indigo-600 text-white font-bold py-2 px-4 rounded hover:bg-indigo-700 focus:outline-none focus:shadow-outline">Register</button>
            </form>
        </div>
    </div>
@endsection
