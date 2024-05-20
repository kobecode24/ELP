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
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <section class="container mx-auto  p-5 lg:p-8">
            <section class="container mx-auto mt-20"></section>
            <h3 id="our_courses" class="pl-6 font-bold text-4xl text-black dark:text-white pb-8">
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
                <form action="{{ route('user.courses') }}" method="GET">
                    <label class="flex p-2 border-2 shadow-lg w-56 justify-between items-center hover:bg-gray-100 cursor-pointer">
                        <div>
                            <h3 class="font-bold text-sm text-black dark:text-white ">Sort by:</h3>
                            <select name="sort" onchange="this.form.submit()">
                                <option value="updated_at"{{ request('sort') === 'updated_at' ? ' selected' : '' }}>Last Updated</option>
                                <option value="popular"{{ request('sort') === 'popular' ? ' selected' : '' }}>Most Popular</option>
                                <option value="price"{{ request('sort') === 'price' ? ' selected' : '' }}>Price</option>
                                <option value="newest"{{ request('sort') === 'newest' ? ' selected' : '' }}>Newest</option>
                                <option value="title"{{ request('sort') === 'title' ? ' selected' : '' }}>Course Title</option>
                            </select>
                        </div>
                    </label>
                </form>

            </div>
        </section>
        <section class="container mx-auto grid justify-center mt-6 md:mt-10 p-5">
            @foreach($courses as $course)
            <div>
                    <div class="flex gap-5 pl-3 lg:pl-32">
                        <a href="{{ route('user.courses.show', $course->id) }}" >
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
                            <div class="">
                                @if($user->courses->contains($course->id))
                                    <a href="{{ route('user.courses.show', $course->id) }}">
                                        <button type="button" class="flex gap-0 md:gap-1 justify-center items-center border border-black dark:border-white rounded-full py-1 px-2">
                                            <h3 class="hidden sm:block sm:font-bold text-xs md:text-sm lg:text-base text-black dark:text-white">
                                                Play
                                            </h3>
                                            <i class="pl-px fa-solid fa-play"></i>
                                        </button>
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
