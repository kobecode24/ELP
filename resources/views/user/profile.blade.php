@extends('layouts.user')
@section('content')


    <div class=" w-full text-gray-700" x-data="layout">


        <!-- main content page -->
        <div class="bg-[#EFF0F0] w-full h-[90.5vh] xl:h-[70.5vh]">

            <main class="container mx-auto">
                <div class="px-5 lg:px-32 py-10">
                    <div class="flex items-center justify-around space-x-4 rtl:space-x-reverse pb-0 lg:pb-5">
                        <div class="min-w-0">
                            <p class="text-lg md:text-xl font-semibold text-[#565656] truncate">
                                My Profile
                            </p>
                        </div>
                        <div class="">
                            <div
                                class="flex gap-0 md:gap-1 justify-center items-center border border-black rounded-full py-1 px-2">
                                <div class="w-5 h-5 p-1 border border-[#565656] rounded-full">
                                    <img class="w-3 lg:w-4" src="{{ asset('images/money2.svg') }}" alt="" />
                                </div>
                                <h3 class="font-bold text-xs md:text-sm lg:text-base text-black">
                                    {{ auth()->user()->points }}
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="w-full bg-white mt-6   rounded-lg shadow-lg">
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
                        @if ($errors->any())
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="flex items-center p-4">
                            <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-2 sm:gap-2 sm:px-6">
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2 relative">
                                    <form method="POST" action="{{ route('user.upload-profile-image') }}" enctype="multipart/form-data">
                                        @csrf
                                        <input type="file" name="profile_image" id="profile_image" class="hidden" onchange="this.form.submit()">
                                        <label for="profile_image" class="cursor-pointer">
                                            <img class="h-32 w-32 rounded-full" src="{{ auth()->user()->profile_image_url ?? 'https://res.cloudinary.com/hxwhau759/image/upload/v1713822899/default_images/jlkamkirtzmtuiruyiwo.png' }}" alt="Profile picture">
                                            <span class="absolute inset-0 flex items-center justify-center opacity-0 hover:opacity-100 bg-gray-800 bg-opacity-50 text-white text-sm font-semibold rounded-full transition-opacity h-32 w-32">
                            Upload
                        </span>
                                        </label>
                                    </form>
                                </dd>
                            </div>
                            <h3 class="font-bold text-xl md:text-2xl text-black px-4 py-5">
                                {{ auth()->user()->name }}
                            </h3>
                        </div>
                        <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                            <div class="px-4 py-5 sm:px-6">
                                <h3 class="text-lg leading-6 font-medium text-gray-900">
                                    User Information
                                </h3>
                                <p class="mt-1 max-w-2xl text-sm text-gray-500">
                                    Personal details and application.
                                </p>
                            </div>
                            <div class="border-t border-gray-200">
                                <dl>
                                    <div class="container mx-auto p-4">
                                            <form action="{{ route('user.profile.update') }}" method="POST" class="bg-white p-6 rounded-lg shadow-lg">
                                            @csrf
                                            @method('PUT')

                                            <!-- Full Name -->
                                            <div class="mb-4">
                                                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                                                    Full name
                                                </label>
                                                <input name="name" type="text" id="name" value="{{ auth()->user()->name }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" >
                                            </div>

                                            <!-- Description -->
                                            <div class="mb-6">
                                                <label class="block text-gray-700 text-sm font-bold mb-2" for="description">
                                                    Description
                                                </label>
                                                <textarea name="description" id="description" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ auth()->user()->description }}</textarea>
                                            </div>


                                            <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                <dt class="text-sm font-medium text-gray-500">
                                                    Email address
                                                </dt>
                                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                    {{ auth()->user()->email }}
                                                </dd>
                                            </div>
                                            <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                <dt class="text-sm font-medium text-gray-500">
                                                    Status
                                                </dt>
                                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                    @foreach($roles as $role)
                                                        {{ $role->name }} @if(!$loop->last) / @endif
                                                    @endforeach
                                                </dd>
                                            </div>
                                                <div class="grid justify-center mt-6 pt-10 pb-52">
                                                    <!-- Update Profile Button -->
                                                    <div class="mb-4 ml-7">
                                                        <button class="px-12 md:px-32 py-2 rounded-full text-lg font-semibold text-white transition-all duration-300 bg-[#A435F0] hover:bg-purple-500">
                                                            Update Profile
                                                        </button>
                                                    </div>
                                                </div>
                                        </form>
                                        <div class="flex flex-col items-center justify-center mt-4">
                                            <!-- Become an Instructor Button -->
                                            @if(!auth()->user()->hasRole('instructor'))
                                                <form method="POST" action="{{ route('user.become-instructor') }}" class="mb-4">
                                                    @csrf
                                                    <button class="px-10 md:px-32 py-2 rounded-full text-lg font-semibold text-white transition-all duration-300 bg-[#A435F0] hover:bg-purple-500">
                                                        Become an Instructor
                                                    </button>
                                                </form>
                                            @endif

                                            <!-- Create a New Course Button -->
                                            <div>
                                                @if(auth()->user()->hasRole('instructor'))
                                                <a href="{{ route('instructor.dashboard') }}" class="ml-8 text px-10 md:px-32 py-2 rounded-full text-lg font-semibold text-white transition-all duration-300 bg-[#A435F0] hover:bg-purple-500">
                                                    My Courses
                                                </a>
                                                @endif
                                            </div>
                                        </div>

                                    </div>
                                </dl>
                            </div>
                        </div>
                        </div>
                    </div>
            </main>

        </div>
    </div>
    <script>
        tinymce.init({
            selector: '#description'
        });
    </script>
@endsection
