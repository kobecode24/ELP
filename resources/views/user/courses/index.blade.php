@extends('layouts.app')
@section('content')

    <main>
        <section class="container mx-auto mt-10 pt-20    ">
            <div class="flex w-full items-center justify-end p-5">
                <div
                    class="flex gap-0 md:gap-1 justify-center items-center border border-black dark:border-white rounded-full py-1 px-2">
                    <h3 class="font-bold text-xs md:text-sm lg:text-base text-black dark:text-white">
                        {{$user->points}}
                    </h3>
                    <img class="w-3 lg:w-4" src="{{ asset('images/money2.svg') }}" alt="" />
                </div>
            </div>
        </section>
        <section class="container mx-auto  p-5 lg:p-8">
            <section class="container mx-auto mt-20"></section>
            <h3 class="pl-6 font-bold text-4xl text-black dark:text-white pb-8">
                Our Courses
            </h3>
            <p class="pl-6 font-bold text-2xl text-black dark:text-white">
                All Development courses
            </p>
            <div class="flex gap-7 mt-5">
                <div class="flex p-4 border-2 shadow-lg w-24 items-center justify-center">
                    <img src="{{ asset('images/svg.svg') }}" alt="" />

                    <h3 class="font-bold text-base text-black dark:text-white pl-2">
                        Filter
                    </h3>
                </div>
                <div class="flex p-2 border-2 shadow-lg w-56 justify-between items-center">
                    <div>
                        <h3 class="font-bold text-sm text-black dark:text-white">
                            Sort by
                        </h3>
                        <h3 class="font-normal text-base text-black dark:text-white">
                            Most Popular
                        </h3>
                    </div>
                    <div>
                        <img src="{{ asset('images/arrow.svg') }}" alt="" />
                    </div>
                </div>
            </div>
        </section>
        <section class="container mx-auto grid justify-center mt-6 md:mt-10 p-5">
            @foreach($courses as $course)
            <div>
                <a href="{{ route('user.courses.show', $course->id) }}" >
                    <div class="flex gap-5 pl-3 lg:pl-32">
                        <div>
                            <img src="{{ $course->image_url ?? 'https://res.cloudinary.com/hkjp5o9bu/image/upload/v1708551498/default_images/ofztxhwstxzvgchzthoi.png' }}" alt="{{ $course->title }}"   style="width: 400px; height: 200px; object-fit: cover;">
                        </div>
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
                                <ul class="list-disc pl-4 pt-4 lg:pt-8">
                                    <li class="font-normal text-xs text-[#6A6F73] dark:text-slate-50">
                                        {{ $course->lessons_count }} lessons • {{ $course->exercises_count }} exercises
                                    </li>
                                </ul>
                            </div>
                            <div class="">
                                <div
                                    class="flex gap-0 md:gap-1 justify-center items-center border border-black dark:border-white rounded-full py-1 px-2">
                                    <h3 class="font-bold text-xs md:text-sm lg:text-base text-black dark:text-white">
                                        {{ $course->points_required ?? '0' }}
                                    </h3>
                                    <img class="w-3 lg:w-4" src="{{ asset('images/money2.svg') }}" alt="" />
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                <!-- hr -->
                <hr class="h-px my-6 ml-3 lg:ml-32 bg-[#D1D7DC] border-0 dark:bg-gray-700" />
            </div>
            @endforeach
        </section>
        <section class="container mx-auto">
            <div class="flex justify-center items-center gap-10 pb-16">
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

    </main>

@endsection