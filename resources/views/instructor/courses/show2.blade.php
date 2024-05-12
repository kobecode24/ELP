@extends('layouts.app')
@section('content')
    <header class="w-full min-h-[calc(100vh-200px)]">
        <!-- navbar -->

        <!-- banner -->
        <div class="bg-white xl:bg-[#2D2F31]">
            <div
                class="container mx-auto flex frex flex-col-reverse xl:flex-row justify-start px-0 md:px-20 lg:px-52 xl:px-8 mt-14 md:mt-20 lg:mt-24 xl:mt-14 items-center pb-0 min-h-[calc(100vh-270px)]">
                <div class="w-full xl:w-3/5 grid space-y-5 lg:space-y-10 px-5 md:px-0 xl:px-4 pt-0 md:pt-6 ml-0 xl:ml-5">
                    <div class="space-y-1 md:space-y-3 pt-4 md:pt-0">
                        @if (!$course->is_approved)
                            <div class="alert alert-warning">
                                Your course is not approved by the admins yet. You can add content meanwhile.
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
                            <div class="  text-[#C0C4FC] w-full  overflow-hidden flex flex-row flex-wrap items-end justify-start px-1 pb-[7.8px] box-border gap-[4px] leading-[normal] tracking-[normal] text-left text-xl ">
                                <div class="flex flex-col items-start justify-start py-0 pr-[6.3px] pl-0 bg-[#401B9C[">
                                    <a href="{{route('instructor.dashboard')}}#yourcourses"><b class=" leading-[17px] inline-block min-w-[83px]">Your Courses</b></a>
                                </div>
                                <i class="pb-[5px] fas fa-greater-than noblock text-xs text-white"></i>
                                <img class="xl:hidden h-4 w-4  overflow-hidden shrink-0" loading="lazy" alt="" src="{{ asset('images/right_svg.svg') }}">
                                <div class="flex flex-col items-start justify-start py-0 pr-[8.5px] pl-0">
                                    <a href="{{route('instructor.courses.show' , $course->id)}}"><b>{{ $course->title }}</b></a>
                                </div>
                            </div>

                        <h3 class="font-bold text-2xl md:text-4xl text-[#2D2F31] xl:text-white dark:text-white pb-1">
                            {{ $course->title }}
                        </h3>
                        <p class="font-normal text-base md:text-xl text-[#2D2F31] xl:text-white dark:text-white pt-2">
                            {!! $course->description !!}
                        </p>
                        <p class="font-normal text-xs md:text-sm text-[#2D2F31] xl:text-white dark:text-white pt-5">
                            {{ number_format($totalEnrolledUsers) }} students
                        </p>
                        <p class="font-normal text-sm md:text-sm text-[#2D2F31] xl:text-white dark:text-white">
                            Created by
                            <span class="font-normal text-sm md:text-sm text-blue-400 xl:text-[#C0C4FC] underline">
                            {{ $course->instructor->name }} </span>
                        </p>
                        <div class="flex flex-col xl:flex-row gap-4">
                            <div class="flex gap-2 lg:gap-2">
                                <img class="bg-black xl:bg-[#2D2F31] hidden xl:block" src="{{ asset('images/ex.svg') }}" alt="" />
                                <img class="bg-white xl:bg-[#2D2F31] block xl:hidden" src="{{ asset('images/ex_small.svg') }}" alt="" />
                                <h3
                                    class="w-50 font-normal text-sm md:text-sm text-[#2D2F31] xl:text-white dark:text-white text-center">
                                    Creation date {{ $course->created_at->format('d/m/Y') }}
                                </h3>
                            </div>
                            <div class="flex gap-2 lg:gap-2">
                                <img class="bg-black xl:bg-[#2D2F31] hidden xl:block" src="{{ asset('images/ex.svg') }}" alt="" />
                                <img class="bg-white xl:bg-[#2D2F31] block xl:hidden" src="{{ asset('images/ex_small.svg') }}" alt="" />

                                <h3
                                    class="w-50 font-normal text-sm md:text-sm text-[#2D2F31] xl:text-white dark:text-white text-center">
                                    Last updated {{ $course->updated_at->format('d/m/Y') }}
                                </h3>
                            </div>
                            <div class="flex gap-2 xl:gap-2">
                                <img class="bg-black xl:bg-[#2D2F31] hidden xl:block" src="{{ asset('images/earth.svg') }}" alt="" />
                                <img class="bg-white xl:bg-[#2D2F31] block xl:hidden" src="{{ asset('images/earth_small.svg') }}" alt="" />

                                {{-- <img class="bg-black xl:bg-[#2D2F31] " src="{{ asset('images/earth.svg') }}" alt="" /> --}}

                                <h3
                                    class="w-10 font-normal text-xs md:text-sm text-[#2D2F31] xl:text-white dark:text-white text-center">
                                    {{ $course->spokenLanguage->name ?? 'Language not specified' }}
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="block xl:hidden">
                        <div class="flex items-center py-6">
                            <h2 class="font-bold text-3xl text-[#2D2F31] dark:text-white">
                                {{ $course->points_required }}
                            </h2>
                            <img class="w-5" src="{{ asset('images/money2.svg') }}" alt="" />
                        </div>

                        <div class="w-full">

                                <a href="{{route('instructor.courses.edit', $course->id)}}">
                                    <button
                                        class="rounded-lg w-full text-lg font-semibold text-white transition-all duration-300 bg-[#A435F0] hover:bg-purple-500 py-3 ">
                                        EDIT COURSE
                                    </button>
                                </a>
                            <div class=" py-3 space-y-1">
                                <h3 class="font-semibold md:font-bold text-base md:2xl text-[#2D2F31] dark:text-white">
                                    This course includes:
                                </h3>
                                <div class="flex gap-4 items-center">
                                    <img src="{{ asset('images/play.svg') }}" alt="" />
                                    <h3 class="font-normal text-[.868] md:text-[.992rem] dark:text-white">
                                        {{ $totalDuration }} on-demand video
                                    </h3>
                                </div>
                                <div class="flex gap-4 items-center">
                                    <i class="text-lg fa-solid fa-clipboard-list"></i>
                                    <h3 class="font-normal text-[.868] md:text-[.992rem] dark:text-white">{{ $course->lessons_count }} lessons , {{ $course->exercises_count }} exercises</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- intro -->
                <div class="block xl:relative w-full xl:w-0">
                    <div
                        class="block xl:absolute -top-28 left-10 w-full xl:w-96 bg-base-100 border-none rounded-none">
                        <figure>
                            <img class="w-full h-full" src="{{$course->image_url ?? 'https://res.cloudinary.com/hkjp5o9bu/image/upload/v1708551498/default_images/ofztxhwstxzvgchzthoi.png'}}" alt="{{$course->title}}" />
                        </figure>
                        <div class="hidden xl:block border shadow-lg">
                            <div class="flex items-center py-6 px-2">
                                <h2 class="font-bold text-3xl text-[#2D2F31] dark:text-white">
                                    {{ $course->points_required ?? '0'}}
                                </h2>
                                <img class="w-5 pt-1" src="{{ asset('images/money2.svg') }}" alt="" />
                            </div>

                            <div class="w-full">
                                    <a href="{{route('instructor.courses.edit', $course->id)}}">
                                        <button
                                            class="rounded-lg w-full text-lg font-semibold text-white transition-all duration-300 bg-[#A435F0] hover:bg-purple-500 py-3">
                                            EDIT COURSE
                                        </button>
                                    </a>
                                <div class="px-2 py-3 space-y-1">
                                    <h3 class="font-bold text-lg text-[#2D2F31] dark:text-white">
                                        This course includes:
                                    </h3>
                                    <div class="flex gap-2 items-center">
                                        <img src="{{ asset('images/play.svg') }}" alt="" />
                                        <h3 class="font-normal text-base">
                                            {{ $totalDuration }} on-demand video
                                        </h3>
                                    </div>
                                    <div class="flex gap-2 items-center">
                                        <i class="text-lg fa-solid fa-clipboard-list"></i>
                                        <h3 class="font-normal text-base">{{ $course->lessons_count }} lessons , {{ $course->exercises_count }} exercises</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <main class="container mx-auto">
        <!-- collapse -->
        <section class="px-5 md:px-8 lg:px-40 xl:px-0 ml-0 xl:ml-20">
            <div class="space-y-3 md:space-y-4 lg:space-y-6 pb-4 mt-2 w-full xl:w-96">
                <h3  id="accordion-collapse"  class="font-bold text-2xl md:text-2xl text-[#2D2F31] dark:text-white">
                    Course content
                </h3>
                <p class="font-normal text-[.868rem] text-[#2D2F31] dark:text-white">
                    {{$course->chapters->count()}}  sections • {{ $totalLecturesCount }} lectures
                </p>
            </div>
            <!-- collapse -->
            <div data-accordion="collapse" class="w-full xl:w-3/5 rounded-none" >
                <!-- chapters -->
                @foreach($course->chapters  as $index => $chapter)
                    <h2 id="accordion-collapse-heading-{{ $chapter->id }}">
                        <button type="button"
                                class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 focus:ring-0 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 bg-[#F7F9FA] hover:bg-gray-100 dark:hover:bg-gray-800 gap-3"
                                data-accordion-target="#accordion-collapse-body-{{$chapter->id}}"
                                aria-expanded="{{ $index == 0 ? 'true' : 'false' }}"
                                aria-controls="accordion-collapse-body-{{ $chapter->id }}">
                            <div class="flex items-start gap-3 -full md:w-2/3">
                                <div class="pt-2">
                                    <svg data-accordion-icon class="w-2 h-2 md:w-3 md:h-3 rotate-180 shrink-0"
                                         aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                         viewBox="0 0 10 6">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                              stroke-width="2" d="M9 5 5 1 1 5" />
                                    </svg>
                                </div>
                                <span class="font-bold text-base text-start">{{ $chapter->title }}</span>
                            </div>
                            <p class="hidden md:block font-normal text-sm">{{ $chapter->lessons->count() + $chapter->exercises->count() }} lectures</p>
                        </button>
                        <div class="pl-6 flex gap-4">
                            <a href="{{ route("instructor.chapters.edit", $chapter->id) }}">
                                <i class="fas fa-edit" style="color: #000000;"></i>
                            </a>
                            <form class="cursor-pointer" action="{{ route("instructor.chapters.destroy", $chapter->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit"><i class="fa-solid fa-trash" style="color: #000000;"></i></button>
                            </form>
                        </div>
                    </h2>
                    <div id="accordion-collapse-body-{{ $chapter->id }}" class="hidden" aria-labelledby="accordion-collapse-heading-{{ $chapter->id }}">
                        <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
                            <ul class="w-full">
                                @foreach($chapter->sortedItems as $item)
                                    <li class="pb-2 pt-3">
                                        <div class="flex items-center space-x-4 rtl:space-x-reverse">
                                            <div class="flex-shrink-0">
                                                <img src="{{ asset($item->image) }}" alt="" />
                                            </div>
                                            <div class="flex-1 min-w-0">
                                                <a href="{{ $item instanceof \App\Models\Lesson ? route('instructor.lessons.show', $item) : route('instructor.exercises.show', $item) }}"
                                                   class="text-xs md:text-sm font-normal text-[#2D2F31] truncate dark:text-white" >
                                                    {{ $item->title }}
                                                </a>
                                            </div>
                                            <div
                                                class="hidden md:block items-center text-[.868rem] md:text-sm font-normal text-[#6A6F73] truncate dark:text-white">
                                                {{ $item->formatted_video_duration ?? ''}}
                                            </div>
                                            <a href="{{ $item instanceof \App\Models\Lesson ? route("instructor.lessons.edit", $item->id) : route('instructor.exercises.edit' , $item->id)}}">
                                                <i class="fas fa-edit" style="color: #000000;"></i>
                                            </a>
                                            <form class="cursor-pointer" action="{{ $item instanceof \App\Models\Lesson ? route("instructor.lessons.destroy", $item->id) : route('instructor.exercises.destroy' , $item->id)}}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"><i class="fa-solid fa-trash" style="color: #000000;"></i></button>
                                            </form>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                            <div class="flex justify-center gap-2">
                                <a href="{{ route('instructor.lessons.create', ['chapter_id' => $chapter->id]) }}" class="btn btn-primary">Add Lesson</a>
                                <a href="{{ route('instructor.exercises.create', ['chapter_id' => $chapter->id]) }}" class="btn-primary btn">Add Exercise</a>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="flex items-center justify-around">
                    <div x-data="{ open: false }">
                        <button @click="open = true" class="mt-4 px-4 py-2 text-white rounded btn btn-primary block  m-auto">Add Chapter</button>

                        <div x-show="open" x-transition.opacity class="fixed inset-0 bg-black bg-opacity-50 z-50 flex justify-center items-center" >
                            <div class="bg-white rounded-lg p-5">
                                @include('instructor.chapters._addModal')
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
        <!-- requirement -->
        <section class="px-5 md:px-8 lg:px-40 xl:p-0 ml-0 xl:ml-20 mt-10 md:mt-16 xl:mt-16">
            <h3 class="font-bold text-2xl text-[#2D2F31] dark:text-white pb-3">
                Requirements
            </h3>
            <ul>
                <li class="list-none	 font-normal text-sm text-[#2D2F31] dark:text-white p-0 md:p-5 space-y-2">
                    {!!$course->requirements!!}
                </li>
            </ul>
        </section>
        <!-- Instructor -->
        <section class="px-5 md:px-8 lg:px-40 xl:p-0 ml-0 xl:ml-20 mt-16 xl:mt-16">
            <h3 class="font-bold text-2xl text-[#2D2F31] dark:text-white">
                Instructor
            </h3>
            <h3 class="font-bold text-lg md:text-xl text-[#5624D0] underline mt-5 mb-2">
                {{$course->instructor->name}}
            </h3>
            <div class="flex gap-5">
                <img class="rounded-full w-20 h-15" src="{{$course->instructor->profile_image_url}}" alt="" />
                <div>
                    <div class="flex gap-3">
                        <img src="{{ asset('images/people.svg') }}" alt="" />
                        <h3 class="font-normal text-sm text-[#2D2F31] dark:text-white">
                            {{ number_format($totalEnrollments) }} Students
                        </h3>
                    </div>
                    <div class="flex gap-3">
                        <img src="{{ asset('images/playBtn.svg') }}" alt="" />
                        <h3 class="font-normal text-sm text-[#2D2F31] dark:text-white">
                            {{$coursesCreatedByCreator}} Courses
                        </h3>
                    </div>
                </div>
            </div>
            <p class="w-full xl:w-3/5 font-normal text-xs md:text-sm text-[#2D2F31] dark:text-white mt-3">
                {!! $course->instructor->description !!}
            </p>
        </section>
        <!-- More Courses -->
        <section class="w-full xl:w-3/5 px-5 md:px-8 lg:px-40 xl:p-0 ml-0 xl:ml-20 mt-16 xl:mt-16 mb-10">
            <h3 class="font-bold text-2xl text-[#2D2F31] dark:text-white">
                More Courses by <span class="text-[#5624D0]">{{$course->instructor->name}}</span>
            </h3>
            <div class="grid grid-cols-3 gap-4 md:gap-8 mt-5">
                @foreach($moreCoursesByInstructor as $moreCourse)
                    <div class="">
                        <img class="responsive-img" src="{{$moreCourse->image_url ?? 'https://res.cloudinary.com/hkjp5o9bu/image/upload/v1708551498/default_images/ofztxhwstxzvgchzthoi.png'}}" alt=""/>
                        <div class="space-y-2">
                            <h3 class="font-medium md:font-bold text-base text-[#2D2F31] dark:text-white pt-2">
                                <a href="{{ route('instructor.courses.show', $moreCourse->id) }}"> {{$moreCourse->title}}
                                </a>
                            </h3>
                            <p class="font-normal text-[.738rem] text-[#6A6F73] dark:text-gray-100">
                                {{$moreCourse->instructor->name}}
                            </p>
                            <p class="font-normal text-xs text-[#6A6F73] dark:text-gray-100">
                                ● {{$moreCourse->lectures_count}} lectures
                            </p>
                            <p class="font-bold text-base text-[#2D2F31] dark:text-white">
                                <i class="fab fa-ethereum"></i> {{$moreCourse->points_required}}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    </main>
@endsection

