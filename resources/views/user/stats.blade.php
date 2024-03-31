@extends('layouts.user')
@section('content')



    <!-- main content page -->
    <div class="bg-[#EFF0F0] w-full h-[calc(100vh+100px)] xl:h-[80.5vh] 2xl:h-[65.5vh]">
        <main class="container mx-auto">
            <div class="px-5 lg:px-32 py-10">
                <div class="flex items-center space-x-4 rtl:space-x-reverse pb-0 lg:pb-5">
                    <div class="flex-1 min-w-0">
                        <p class="text-2xl md:text-4xl font-semibold text-[#565656] truncate">
                            Welcome, KOBE 👋
                        </p>
                    </div>
                    <div class="">
                        <div
                            class="flex gap-0 md:gap-1 justify-center items-center border border-black rounded-full py-1 px-2">
                            <div class="w-5 h-5 p-1 border border-black rounded-full">
                                <img class="w-3 lg:w-4" src="{{ asset('images/money2.svg') }}" alt="" />
                            </div>
                            <h3 class="font-bold text-xs md:text-sm lg:text-base text-black">
                                500
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
                            <div
                                class="inline-block pr-0 md:pr-[13.5rem] lg:pr-[15.5rem] xl:pr-[25.3rem] 2xl:pr-[41.0rem]">
                                <div class="flex gap-2 md:gap-5 xl:gap-12 border border-gray-200 rounded-md items-center">
                                    <h3 class="font-bold text-xs xl:text-base text-black px-2">
                                        PHP MySQL Database - MySQL Get Last ID
                                    </h3>
                                    <button
                                        class="flex gap-1 md:gap-2 font-bold text-xs xl:text-base text-black items-center border border-gray-200 rounded-full m-2 px-4 py-1">
                                        Continue

                                        <img src="{{ asset('images/ar.svg') }}" alt="" />
                                    </button>
                                </div>
                            </div>
                            <br />
                            <div class="inline-block">
                                <div class="flex gap-2 md:gap-5 xl:gap-12 border border-gray-200 rounded-md items-center">
                                    <h3 class="font-bold text-xs xl:text-base text-black px-2">
                                        PHP Loops - Foreach Loop
                                    </h3>
                                    <button
                                        class="flex gap-1 md:gap-2 font-bold text-xs xl:text-base text-black items-center border border-gray-200 rounded-full m-2 px-4 py-1">
                                        Continue

                                        <img src="{{ asset('images/ar.svg') }}" alt="" />
                                    </button>
                                </div>
                            </div>
                            <br />

                            <div class="inline-block">
                                <div class="flex gap-2 md:gap-5 xl:gap-12 border border-gray-200 rounded-md items-center">
                                    <h3 class="font-bold text-xs xl:text-base text-black px-2">
                                        SQL Constraints and keys - Not Null
                                    </h3>
                                    <button
                                        class="flex gap-1 md:gap-2 font-bold text-xs xl:text-base text-black items-center border border-gray-200 rounded-full m-2 px-4 py-1">
                                        Continue

                                        <img src="{{ asset('images/ar.svg') }}" alt="" />
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <div class="py-40"></div>
    </div>

@endsection
