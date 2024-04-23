@extends('layouts.teacher')
@section('content')
    <main class="min-h-screen w-full bg-gray-100 text-gray-700" x-data="layout">
        <!-- header page -->


        <div class="flex">
            <!-- aside -->


            <!-- main content page -->
            <section class="container mx-auto p-4 bg-[#F5F5F5]">
                <!-- 1 -->
                <div
                    class="w-11/12 mt-6 md:mt-10 lg:mt-16 mx-5 lg:mx-16 bg-[#F5F5F5] border-2 shadow-xl rounded-lg py-12 px-4 sm:px-6 lg:max-w-7xl lg:px-8 flex flex-col md:flex-row gap-6 items-center justify-between">
                    <h2 class="text-base font-normal tracking-tight text-neutral-900">
                        <span class="block">Jump Into Course Creation</span>
                    </h2>
                    <div class="space-y-4 sm:space-y-0 sm:flex sm:space-x-5">
                        <a href="{{route('instructor.courses.index') }}"
                           class="w-full flex items-center justify-center px-6 md:px-10 lg:px-20 py-2 border border-transparent rounded-none text-sm md:text-lg font-semibold text-white transition-all duration-300 bg-[#A435F0] hover:bg-purple-500">
                            All Courses
                        </a>
                    </div>
                </div>


                    @if($user->createdCourses->count() == 0)
                <!-- 2 -->
                <div
                    class="flex flex-col lg:flex-row w-11/12 mx-5 lg:mx-16 bg-[#F5F5F5] border-2 shadow-xl rounded-lg py-12 px-4 sm:px-6 lg:max-w-7xl lg:px-8 gap-6 items-center justify-between">
                    <div class="w-2/5 flex items-center justify-center">
                        <img src="{{ asset('images/image1.jpg') }}" alt="" />
                    </div>
                    <div class="w-full lg:w-3/5 space-y-4">
                        <h3 class="font-normal text-xl md:text-2xl text-black text-center lg:text-start">
                            Create an Engaging Course
                        </h3>
                        <p class="font-normal text-sm md:text-base text-black pt-3 text-center lg:text-start">
                            Whether you've been teaching for years or are teaching for the
                            first time, you can make an engaging course. We've compiled
                            resources and best practices to help you get to the next level,
                            no matter where you're starting.
                        </p>
                        <p
                            class="font-normal text-sm md:text-base text-[#5624D0] underline pt-2 text-center lg:text-start">
                            Get Started
                        </p>
                    </div>
                </div>
                <!-- 3 -->
                <div
                    class="flex flex-col md:flex-row my-6 w-11/12 mx-5 lg:mx-16 bg-[#F5F5F5] lg:max-w-7xl gap-6 items-center justify-between">
                    <!-- 3.1 -->
                    <div
                        class="flex flex-col lg:flex-row w-11/12 bg-[#F5F5F5] border-2 shadow-xl rounded-lg py-12 px-4 sm:px-6 lg:max-w-7xl lg:px-8 gap-5 lg:gap-2 items-center justify-between">
                        <div class="w-2/5 flex items-center justify-center">
                            <img src="{{ asset('images/image2.jpg') }}" alt="" />
                        </div>
                        <div class="w-full lg:w-3/5 space-y-4">
                            <h3 class="font-normal text-xl text-black text-center lg:text-start">
                                Get Started with Video
                            </h3>
                            <p class="font-normal text-sm text-black pt-3 text-center lg:text-start">
                                Quality video lectures can set your course apart. Use our
                                resources to learn the basics.
                            </p>
                            <p class="font-normal text-sm text-[#5624D0] underline pt-2 text-center lg:text-start">
                                Get Started
                            </p>
                        </div>
                    </div>
                    <!-- 3.2 -->
                    <div
                        class="flex flex-col lg:flex-row w-11/12 bg-[#F5F5F5] border-2 shadow-xl rounded-lg py-14 lg:py-12 px-4 sm:px-6 lg:max-w-7xl lg:px-8 gap-5 lg:gap-2 items-center justify-between">
                        <div class="w-2/5 flex items-center justify-center">
                            <img src="{{ asset('images/image3.jpg') }}" alt="" />
                        </div>
                        <div class="w-full lg:w-3/5 space-y-4">
                            <h3 class="font-normal text-xl text-black text-center lg:text-start">
                                Build Your Audience
                            </h3>
                            <p class="font-normal text-sm text-black pt-3 text-center lg:text-start">
                                Set your course up for success by building your audience.
                            </p>
                            <p class="font-normal text-sm text-[#5624D0] underline pt-2 text-center lg:text-start">
                                Get Started
                            </p>
                        </div>
                    </div>
                </div>
                <!-- 4 -->
                <div
                    class="flex flex-col lg:flex-row w-11/12 mx-5 lg:mx-16 bg-[#F5F5F5] border-2 shadow-xl rounded-lg py-12 px-4 sm:px-6 lg:max-w-7xl lg:px-8 gap-6 items-center justify-between">
                    <div class="w-2/5 flex items-center justify-center">
                        <img src="{{ asset('images/image4.jpg') }}" alt="" />
                    </div>
                    <div class="w-full lg:w-3/5 space-y-4">
                        <h3 class="font-normal text-xl md:text-2xl text-black text-center lg:text-start">
                            Join the New Instructor Challenge!
                        </h3>
                        <p class="font-normal text-sm md:text-base text-black pt-3 text-center lg:text-start">
                            Get exclusive tips and resources designed to help you launch
                            your first course faster! Eligible instructors who publish their
                            first course on time will receive a special bonus to celebrate.
                            Start today!
                        </p>
                        <p
                            class="font-normal text-sm md:text-base text-[#5624D0] underline pt-2 text-center lg:text-start">
                            Get Started
                        </p>
                    </div>
                </div>
                @endif


                    @if (session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                            <strong class="font-bold">Success!</strong>
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                            <strong class="font-bold">Error!</strong>
                            <span class="block sm:inline">{{ session('error') }}</span>
                        </div>
                    @endif
                    <section  id="our_courses"  class="container mx-auto  p-5 lg:p-8">
                        <section class="container mx-auto mt-20"></section>
                        <h3 class="pl-6 font-bold text-4xl text-black  text text-center dark:text-white pb-8">
                            Your Courses
                        </h3>
                    </section>
                    <section id="yourcourses" class="container mx-auto grid justify-center mt-6 md:mt-10 p-5">
                        @foreach($courses as $course)
                            <div>
                                <div class="flex gap-5 pl-3 lg:pl-32">
                                    <a href="{{ route('instructor.courses.show', $course->id) }}" >
                                        <div>
                                            @if($course->image_public_id)
                                                <img src="https://res.cloudinary.com/hkjp5o9bu/image/upload/c_crop,g_auto,h_200,w_300/{{$course->image_public_id}}.jpg" alt="{{ $course->title }}"    class="cld-responsive">
                                            @else
                                                <img src="https://res.cloudinary.com/hkjp5o9bu/image/upload/c_crop,g_south,h_200,w_300/default_images/ofztxhwstxzvgchzthoi.jpg" alt="{{ $course->title }}" >
                                            @endif
                                        </div>
                                    </a>
                                    <div class="flex justify-between gap-5 md:gap-20 lg:gap-56">
                                        <div>
                                            <h3 class="font-bold text-sm md:text-base text-black dark:text-white">
                                                {{ $course->title }}
                                            </h3>
                                            <p class="font-normal text-xs md:text-sm text-black dark:text-white">
                                                {{ $course->description }}
                                            </p>
                                            <p class="font-normal pt-px text-xs text-[#6A6F73] dark:text-slate-50">
                                                {{ $course->instructor->name ?? 'N/A' }}
                                            </p>
                                            <ul class="list-none pl-4 pt-4 lg:pt-8">
                                                <li class="font-normal text-xs text-[#6A6F73] dark:text-slate-50">
                                                    •  {{ $course->lessons_count }} lessons • {{ $course->exercises_count }} exercises
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="grid justify-center items-center justify-around	">
                                            <a href="{{ route('instructor.courses.edit', $course->id) }}" >
                                                    <button type="submit" class="flex gap-0 md:gap-1 justify-center items-center border border-black dark:border-white rounded-full py-1 px-2">
                                                        <i class="fas fa-edit" style="color: #000000;"></i>
                                                    </button>
                                                </a>

                                                <form action="{{ route('instructor.courses.destroy', $course->id) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="flex gap-0 md:gap-1 justify-center items-center border border-black dark:border-white rounded-full py-1 px-2">
                                                        <i class="fa-solid fa-trash" style="color: #000000;"></i>
                                                    </button>
                                                </form>


                                        </div>
                                    </div>
                                </div>
                                <!-- hr -->
                                <hr class="h-px my-6 ml-3 lg:ml-32 bg-[#D1D7DC] border-0 dark:bg-gray-700" />
                            </div>
                        @endforeach
                    </section>
                    <section class="container mx-auto">
                        <div class="flex justify-center items-center gap-10">
                            @if ($courses->onFirstPage())
                                <button class="w-5 h-5 border border-black rounded-full p-4 flex items-center justify-center" disabled>
                                    <i class="fa-solid fa-angle-left"></i>
                                </button>
                            @else
                                <a href="{{ $courses->previousPageUrl() }}" class="w-5 h-5 border border-black rounded-full p-4 flex items-center justify-center">
                                    <i class="fa-solid fa-angle-left"></i>
                                </a>
                            @endif

                            <div class="border-b border-black p-2 w-3 grid justify-center items-center">
                                <h3 class="font-bold text-sm text-[#5624D0]">{{ $courses->currentPage() }}</h3>
                            </div>

                            @if ($courses->hasMorePages())
                                <a href="{{ $courses->nextPageUrl() }}" class="w-5 h-5 border border-black rounded-full p-4 flex items-center justify-center">
                                    <i class="fa-solid fa-angle-right"></i>
                                </a>
                            @else
                                <button class="w-5 h-5 border border-black rounded-full p-4 flex items-center justify-center" disabled>
                                    <i class="fa-solid fa-angle-right"></i>
                                </button>
                            @endif
                        </div>
                    </section>


                <div class="grid justify-center my-36 space-y-7 pb-10">
                    <h3 class="font-normal text-base text-black text-center">
                        Are You Ready to Begin?
                    </h3>
                    <div class="space-y-4 sm:space-y-0 sm:flex sm:space-x-5">
                        <a href="{{route('instructor.courses.create') }}"
                           class="w-full flex items-center justify-center px-6 md:px-10 lg:px-20 py-2 border border-transparent rounded-none text-sm md:text-lg font-semibold text-white transition-all duration-300 bg-[#A435F0] hover:bg-purple-500">Create
                            Your Course
                        </a>
                    </div>
                </div>
            </section>
        </div>
    </main>
@endsection
