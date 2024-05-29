@extends('layouts.user')
@section('content')



    <!-- main content page -->
    <div class="bg-[#EFF0F0] w-full h-[calc(100vh+100px)] xl:h-[80.5vh] 2xl:h-[65.5vh]">
        <main class="container mx-auto">
            <div class="px-5 lg:px-32 py-10">
                <div class="flex items-center space-x-4 rtl:space-x-reverse pb-0 lg:pb-5">
                    <div class="flex-1 min-w-0">
                        <p class="text-2xl md:text-4xl font-semibold text-[#565656] truncate">
                            Welcome,  {{ auth()->user()->name }} 👋
                        </p>
                    </div>
                    <div class="">
                        <div
                            class="flex gap-0 md:gap-1 justify-center items-center border border-black rounded-full py-1 px-2">
                            <div class="w-5 h-5 p-1 border border-black rounded-full">
                                <img class="w-3 lg:w-4" src="{{ asset('images/money2.svg') }}" alt="" />
                            </div>
                            <h3 class="font-bold text-xs md:text-sm lg:text-base text-black">
                                {{ auth()->user()->points }}
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="w-full bgColor mt-6 py-5 md:py-10">
                    <h3 class="font-medium text-2xl lg:text-5xl text-center text-white">
                        &lt;<span class="text-[#D408CD]">creative</span>=<span
                            class="text-[#A435F0]">"coding"</span>&gt;
                    </h3>
                    <h3 class="font-bold text-xl lg:text-3xl text-[#D1D7DC] text-center mt-10 pb-4">
                        Become the next Galactic Overlord of coding
                    </h3>
                </div>
            </div>
            <div class="p-2 md:p-0">
                <div class="relative">
                    <div
                        class="absolute -top-8 md:left-5 lg:left-32 bg-white  rounded-lg shadow-xl mt-5">
                        <h3 class="font-bold text-xl text-black px-4 py-5">
                            Last Activities
                        </h3>
                        <div class="space-y-4 px-2 py-3 mx-0 md:mx-2 xl:mx-10">
                            @foreach($lastCourses as $progress)
                            <div
                                class="inline-block pr-0 md:pr-[13.5rem] lg:pr-[15.5rem] xl:pr-[25.3rem] 2xl:pr-[41.0rem]">
                                <div class="flex gap-2 md:gap-5 xl:gap-12 border border-gray-200 rounded-md items-center">
                                    <h3 class="font-bold text-xs xl:text-base text-black px-2">
                                        {{ $progress->course->title }}
                                    </h3>
                                    <a href="{{ route('user.items.next', ['courseId' => $progress->course_id, 'type' => $progress->last_item_type, 'currentItemId' => $progress->last_item_id]) }}"
                                       class="flex gap-1 md:gap-2 font-bold text-xs xl:text-base text-black items-center border border-gray-200 rounded-full m-2 px-4 py-1">
                                        Continue
                                        <img src="{{ asset('images/ar.svg') }}" alt="" />
                                    </a>
                                </div>
                            </div>
                            <br />
                            @endforeach

                        </div>

                        <section class="container mx-auto  p-5 lg:p-8">
                            <section class="container mx-auto mt-20"></section>
                            <h3 id="our_courses" class="pl-6 font-bold text-4xl text-black dark:text-white pb-8">
                                Enrolled Courses
                            </h3>
                        </section>
                        <section class="container mx-auto grid justify-center mt-6 md:mt-10 p-5">
                            @foreach($courses as $course)
                                <div>
                                    <div class="flex gap-5 pl-3 lg:pl-32">
                                        <a href="{{ route('user.courses.show', $course->id) }}" class="flex-none">
                                            <img
                                                src="{{ $course->image_public_id ? 'https://res.cloudinary.com/hkjp5o9bu/image/upload/c_scale,w_300/'.$course->image_public_id.'.jpg' : 'https://res.cloudinary.com/hkjp5o9bu/image/upload/c_crop,g_south,h_200,w_300/default_images/ofztxhwstxzvgchzthoi.jpg' }}"
                                                alt="{{ $course->title }}"
                                                class="cld-responsive w-32 h-32 object-cover">
                                        </a>
                                        <div class="flex flex-col justify-between flex-grow">
                                            <div>
                                                <h3 class="font-bold text-sm md:text-base text-black dark:text-white">
                                                    {{ $course->title }}
                                                </h3>
                                                <p class="font-normal text-xs md:text-sm text-black dark:text-white overflow-hidden text-ellipsis">
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
                                            <div class="flex justify-between items-center gap-5 md:gap-20 lg:gap-56">
                                                @if($user->courses->contains($course->id))
                                                    <a href="{{ route('user.courses.show', $course->id) }}" class="flex gap-0 md:gap-1 justify-center items-center border border-black dark:border-white rounded-full py-1 px-2">
                                                        <h3 class="hidden sm:block sm:font-bold text-xs md:text-sm lg:text-base text-black dark:text-white">
                                                            Play
                                                        </h3>
                                                        <i class="pl-px fa-solid fa-play"></i>
                                                    </a>
                                                @else
                                                    <form method="POST" action="{{ route('user.courses.enroll', $course->id) }}">
                                                        @csrf
                                                        <button type="submit" class="flex gap-0 md:gap-1 justify-center items-center border border-black dark:border-white rounded-full py-1 px-2">
                                                            <h3 class="font-bold text-xs md:text-sm lg:text-base text-black dark:text-white">
                                                                {{ $course->points_required ?? '0' }}
                                                            </h3>
                                                            <img class="w-3 lg:w-4" src="{{ asset('images/money2.svg') }}" alt="" />
                                                        </button>
                                                    </form>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
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
                    </div>
                </div>
            </div>
        </main>
        <div class="py-40"></div>
    </div>
    <style>
        .cld-responsive {
            width: 100%;
            height: auto;
        }

        .flex-none {
            flex: none;
        }

        .flex-grow {
            flex-grow: 1;
        }

        .text-ellipsis {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

    </style>
@endsection
