@extends('layouts.teacher')
@section('content')
    <main class="min-h-screen w-full bg-gray-100 text-gray-700" x-data="layout">
        <!-- header page -->


        <div class="flex">
            <!-- aside -->


            <!-- main content page -->
            <section class="container mx-auto p-4 bg-[#F5F5F5]">

                <section  id="our_courses"  class="container mx-auto  p-5 lg:p-8">
                    <section class="container mx-auto mt-20"></section>
                    @if (session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded " role="alert">
                            <strong class="font-bold">Success!</strong>
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded" role="alert">
                            <strong class="font-bold">Error!</strong>
                            <span class="block sm:inline">{{ session('error') }}</span>
                        </div>
                    @endif
                    <h3 class="pl-6 font-bold text-4xl text-black  text text-center dark:text-white pb-8">
                        Private Courses
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
                                                •  {{ $course->lessons_count ?? 0 }} lessons • {{ $course->exercises_count ?? 0 }} exercises
                                            </li>
                                        </ul>
                                    </div>
                                    <form action="{{ route('admin.courses.approve', $course->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="w-5 h-5 border border-black rounded-full p-4 flex items-center justify-center">
                                            <i class="fa-solid fa-lock"></i>
                                        </button>
                                    </form>
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
            </section>
        </div>
    </main>
@endsection
