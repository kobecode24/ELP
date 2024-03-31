@extends('layouts.app')
@section('content')
    <header class="w-full min-h-[calc(100vh-200px)]">
        <!-- navbar -->

        <!-- banner -->
        <div class="bg-white xl:bg-[#2D2F31]">
            <div
                class="container mx-auto flex frex flex-col-reverse xl:flex-row justify-start px-3 md:px-10 lg:px-48 xl:px-8 mt-20 xl:mt-14 items-center pb-0 min-h-[calc(100vh-270px)]">
                <div class="w-full xl:w-3/5 grid space-y-5 lg:space-y-10 p-4 ml-0 xl:ml-5">
                    <div class="space-y-1 md:space-y-3 pt-8 md:pt-0">
                        <h3 class="font-bold text-2xl md:text-4xl text-black xl:text-white dark:text-white pb-1">
                            {{ $course->title }}
                        </h3>
                        <p class="font-normal text-lg md:text-xl text-black xl:text-white dark:text-white">
                            {!! $course->description !!}
                        </p>
                        <p class="font-normal text-xs md:text-sm text-black xl:text-white dark:text-white pt-5">
                            1,159,467 students
                        </p>
                        <p class="font-normal text-xs md:text-sm text-black xl:text-white dark:text-white">
                            Created by
                            <span class="font-normal text-xs md:text-sm text-blue-400 xl:text-[#C0C4FC] underline">
                            {{ $course->instructor->name }} </span>
                        </p>
                        <div class="flex flex-col md:flex-row gap-4">
                            <div class="flex gap-1 lg:gap-2">
                                <img class="bg-black xl:bg-[#2D2F31]" src="{{ asset('images/ex.svg') }}" alt="" />
                                <h3
                                    class="w-50 font-normal text-xs md:text-sm text-black xl:text-white dark:text-white text-center">
                                   Creation date {{ $course->created_at->format('d/m/Y') }}
                                </h3>
                            </div>
                            <div class="flex gap-1 lg:gap-2">
                                <img class="bg-black xl:bg-[#2D2F31]" src="{{ asset('images/ex.svg') }}" alt="" />
                                <h3
                                    class="w-50 font-normal text-xs md:text-sm text-black xl:text-white dark:text-white text-center">
                                    Last updated {{ $course->updated_at->format('d/m/Y') }}
                                </h3>
                            </div>
                            <div class="flex gap-1 xl:gap-2">
                                <img class="bg-black xl:bg-[#2D2F31]" src="{{ asset('images/earth.svg') }}" alt="" />
                                <h3
                                    class="w-10 font-normal text-xs md:text-sm text-black xl:text-white dark:text-white text-center">
                                    {{ $course->spokenLanguage->name ?? 'Language not specified' }}
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="block xl:hidden">
                        <div class="flex items-center py-6">
                            <h2 class="font-bold text-3xl text-black dark:text-white">
                                {{ $course->price }}
                            </h2>
                            <img class="w-5" src="{{ asset('images/money2.svg') }}" alt="" />
                        </div>

                        <div class="w-full">
                            <button
                                class="w-full text-lg font-semibold text-white transition-all duration-300 bg-[#A435F0] hover:bg-purple-500 py-3">
                                Get now
                            </button>
                            <div class="px-2 py-3 space-y-1">
                                <h3 class="font-bold text-lg text-black dark:text-white">
                                    This course includes:
                                </h3>
                                <div class="flex gap-2 items-center">
                                    <img src="{{ asset('images/play.svg') }}" alt="" />
                                    <h3 class="font-normal text-base">
                                        54 hours on-demand video
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
                <!-- intro -->
                <div class="block xl:relative w-full xl:w-0">
                    <div
                        class="block xl:absolute -top-28 left-10 w-full xl:w-96 bg-base-100 border-none rounded-none">
                        <figure>
                            <img class="w-full h-full" src="{{$course->image_url ?? 'https://res.cloudinary.com/hkjp5o9bu/image/upload/v1708551498/default_images/ofztxhwstxzvgchzthoi.png'}}" alt="{{$course->title}}" style="width: 550px;height: 200px;object-fit: cover"/>
                        </figure>
                        <div class="hidden xl:block border shadow-lg">
                            <div class="flex items-center py-6 px-2">
                                <h2 class="font-bold text-3xl text-black dark:text-white">
                                    {{ $course->points_required ?? '0'}}
                                </h2>
                                <img class="w-5 pt-1" src="{{ asset('images/money2.svg') }}" alt="" />
                            </div>

                            <div class="w-full">
                                <button
                                    class="w-full text-lg font-semibold text-white transition-all duration-300 bg-[#A435F0] hover:bg-purple-500 py-3">
                                    Get now
                                </button>
                                <div class="px-2 py-3 space-y-1">
                                    <h3 class="font-bold text-lg text-black dark:text-white">
                                        This course includes:
                                    </h3>
                                    <div class="flex gap-2 items-center">
                                        <img src="{{ asset('images/play.svg') }}" alt="" />
                                        <h3 class="font-normal text-base">
                                            54 hours on-demand video
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
        <section class="px-3 md:px-8 lg:px-40 xl:px-0 ml-0 xl:ml-20">
            <div class="space-y-6 pb-3 w-96">
                <h3 class="font-bold text-xl md:text-2xl text-black dark:text-white">
                    Course content
                </h3>
                <p class="font-normal text-sm text-black dark:text-white">
                    {{$course->chapters->count()}}  sections • {{ $totalLecturesCount }} lectures
                </p>
            </div>
            <!-- collapse -->
            <div id="accordion-collapse" data-accordion="collapse" class="w-full xl:w-3/5 rounded-none">
                <!-- chapters -->
                @foreach($course->chapters  as $index => $chapter)
                <h2 id="accordion-collapse-heading-{{ $chapter->id }}">
                    <button type="button"
                            class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 focus:ring-0 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 bg-[#F7F9FA] hover:bg-gray-100 dark:hover:bg-gray-800 gap-3"
                            data-accordion-target="#accordion-collapse-body-{{$chapter->id}}"
                            aria-expanded="{{ $index == 0 ? 'true' : 'false' }}"
                            aria-controls="accordion-collapse-body-{{ $chapter->id }}">
                        <div class="flex items-start gap-3 w-2/3">
                            <div class="pt-2">
                                <svg data-accordion-icon class="w-2 h-2 md:w-3 md:h-3 rotate-180 shrink-0"
                                     aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                     viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                          stroke-width="2" d="M9 5 5 1 1 5" />
                                </svg>
                            </div>
                            <span class="font-bold text-sm md:text-base text-start">{{ $chapter->title }}</span>
                        </div>
                        <p class="font-normal text-xs md:text-sm">{{ $chapter->lessons->count() + $chapter->exercises->count() }} lectures</p>
                    </button>
                </h2>
                <div id="accordion-collapse-body-{{ $chapter->id }}" class="hidden" aria-labelledby="accordion-collapse-heading-{{ $chapter->id }}">
                    <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
                        <ul class="w-full">
                            @foreach($chapter->sortedItems as $item)
                            <li class="pb-2 pt-3">
                                <div class="flex items-center space-x-4 rtl:space-x-reverse">
                                    <div class="flex-shrink-0">
                                        <img src="{{ asset($item instanceof \App\Models\Lesson ? 'images/play.svg' : 'images/faq.jpg') }}" alt="" />
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <p
                                            class="text-xs md:text-sm font-normal text-[#5624D0] truncate dark:text-white underline">
                                            {{ $item->title }}
                                        </p>
                                    </div>
                                    <div
                                        class="inline-flex items-center text-xs md:text-sm font-normal text-[#6A6F73] truncate dark:text-white">
                                        03:27
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                @endforeach
        </section>
        <!-- requirement -->
        <section class="px-3 md:px-8 lg:px-40 xl:p-0 ml-0 xl:ml-20 mt-16 xl:mt-16">
            <h3 class="font-bold text-xl md:text-2xl text-black dark:text-white">
                Requirements
            </h3>
            <p class="list-disc font-normal text-sm text-black dark:text-white p-5 space-y-2">
                    {!!$course->requirements!!}
            </p>
        </section>
        <!-- Instructor -->
        <section class="px-3 md:px-8 lg:px-40 xl:p-0 ml-0 xl:ml-20 mt-16 xl:mt-16">
            <h3 class="font-bold text-xl md:text-2xl text-black dark:text-white">
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
                        <h3 class="font-normal text-sm text-black dark:text-white">
                            2,519,153 Students
                        </h3>
                    </div>
                    <div class="flex gap-3">
                        <img src="{{ asset('images/playBtn.svg') }}" alt="" />
                        <h3 class="font-normal text-sm text-black dark:text-white">
                            {{$coursesCreatedByCreator}} Courses
                        </h3>
                    </div>
                </div>
            </div>
            <p class="w-full xl:w-3/5 font-normal text-xs md:text-sm text-black dark:text-white mt-3">
                {!! $course->instructor->description !!}
            </p>
        </section>
        <!-- More Courses -->
        <section class="w-full xl:w-3/5 px-3 md:px-8 lg:px-40 xl:p-0 ml-0 xl:ml-20 mt-16 xl:mt-16 mb-10">
            <h3 class="font-bold text-xl md:text-2xl text-black dark:text-white">
                More Courses by <span class="text-[#5624D0]">{{$course->instructor->name}}</span>
            </h3>
            <div class="grid grid-cols-3 gap-4 md:gap-8 mt-5">
                @foreach($moreCoursesByInstructor as $moreCourse)
                <div class="">
                    <img class="mb-3" src="{{$moreCourse->image_url ?? 'https://res.cloudinary.com/hkjp5o9bu/image/upload/v1708551498/default_images/ofztxhwstxzvgchzthoi.png'}}" alt=""  style="width: 550px;height: 200px;object-fit: cover"/>
                    <div class="space-y-2">
                        <h3 class="font-bold text-sm md:text-base text-black dark:text-white">
                            <a href="{{ route('user.courses.show', $moreCourse->id) }}"> {{$moreCourse->title}}
                            </a>
                        </h3>
                        <p class="font-normal text-xs text-[#6A6F73] dark:text-gray-100">
                            {{$moreCourse->instructor->name}}
                        </p>
                        <p class="font-normal text-xs text-[#6A6F73] dark:text-gray-100">
                            ● {{$moreCourse->lectures_count}} lectures
                        </p>
                        <p class="font-bold text-sm md:text-base text-black dark:text-white">
                            <i class="fab fa-ethereum"></i> {{$moreCourse->points_required}}
                        </p>
                    </div>
                </div>
                @endforeach
            </div>
        </section>
    </main>
@endsection

