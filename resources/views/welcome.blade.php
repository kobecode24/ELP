@extends('layouts.app')
@section('content')
    <!-- image -->
    @include('components.home_hero')
    <div class="relative bg-[#0D1721] pt-16 md:pt-0">
        <div class="w-full h-full relative top-0">
            <img class="w-full h-full" src="{{ asset('images/frame.png') }}" alt="" />
    </div>
    <main class="bg-[#0D1721]">
        <!-- js example -->

        <section class="bg-[#0D1721] p-4">
            <div class="container mx-auto pt-20 pb-36">
                <div class="grid grid-cols-1 md:grid-cols-2 items-center justify-items-center justify-center gap-6 lg:gap-0">
                    <div class="max-w-lg space-y-5 grid justify-center justify-items-center">
                        <h2 class="font-bold text-4xl lg:text-7xl text-white pb-4">
                            JavaScript
                        </h2>
                        <p class="font-normal text-lg text-white">
                            The language for programming web pages
                        </p>
                        <div>
                            <button
                                class="px-10 py-2 rounded-3xl text-base font-normal text-white transition-all duration-300 bg-[#A435F0] hover:bg-purple-500">
                                Learn JavaScript
                            </button>
                        </div>
                    </div>
                    <div class="mt-12 md:mt-0 grid justify-center">
                        <div class="border-8 md:border-[14px] border-[#38444D] rounded-md">
                            <div class="bg-[#38444D]">
                                <h3 class="font-normal text-lg md:text-2xl text-[#DDDDDD] py-2 md:py-4">
                                    JavaScript Example:
                                </h3>
                            </div>
                            <div class="py-2 pl-2 pr-10 md:pr-16 lg:pr-20">
                                <h3 class="font-normal text-sm lg:text-base text-white">
                                    <span class="text-[#88C999]">&lt;</span><span class="text-[#FF9999]">button</span>
                                    <span class="text-[#C5A5C5]">onclick</span><span
                                        class="text-[#88C999]">="myFunction()"&gt;</span>Click Me! <br /><span
                                        class="text-[#88C999]">&lt;</span><span class="text-[#FF9999]">/button</span><span
                                        class="text-[#88C999]">&gt;</span>
                                </h3>
                                <br />
                                <p class="font-normal text-sm lg:text-base text-white">
                                    <span class="text-[#88C999]">&lt;</span><span class="text-[#FF9999]">script</span><span
                                        class="text-[#88C999]">&gt;</span>
                                    <span class="text-[#C5A5C5]">function</span> myFunction() {
                                    <br /><span class="text-[#C5A5C5]">let</span> x =
                                    document.getElementById(<span class="text-[#88C999]">"demo"</span>); <br />x.style.fontSize =
                                    <span class="text-[#88C999]">"25px"</span>;
                                    <br />x.style.color =
                                    <span class="text-[#88C999]">"red"</span>;<br />} <br />
                                    <span class="text-[#88C999]">&lt;</span><span class="text-[#FF9999]">/script</span><span
                                        class="text-[#88C999]">&gt;</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- python example -->
        <section class="bg-[#F3ECEA] p-4">
            <div class="container mx-auto pt-20 pb-36">
                <div class="grid grid-cols-1 md:grid-cols-2 items-center justify-items-center justify-center gap-6 lg:gap-0">
                    <div class="max-w-lg space-y-5 grid justify-center justify-items-center">
                        <h2 class="font-bold text-4xl lg:text-7xl text-black pb-4">
                            Python
                        </h2>
                        <p class="font-normal text-lg text-black">
                            A popular programming language
                        </p>
                        <div>
                            <button
                                class="px-10 py-2 rounded-3xl text-base font-normal text-white transition-all duration-300 bg-[#A435F0] hover:bg-purple-500">
                                Learn Python
                            </button>
                        </div>
                    </div>
                    <div class="mt-12 md:mt-0 grid justify-center">
                        <div class="border-8 md:border-[14px] border-[#38444D] rounded-md">
                            <div class="bg-[#38444D]">
                                <h3 class="font-normal text-lg md:text-2xl text-[#DDDDDD] py-2 md:py-4">
                                    Python Example:
                                </h3>
                            </div>
                            <div class="bg-[#0D1721] pt-2 pb-28 md:pb-32 lg:pb-40 pl-2 pr-20 md:pr-24 lg:pr-28">
                                <h3 class="font-normal text-sm lg:text-base text-white">
                                    <span class="text-[#C5A5C5]">if </span>
                                    <span class="text-[#80B6FF]"> 5</span>
                                    <span class="text-[#88C999]">&gt;</span>
                                    <span class="text-[#80B6FF]">2</span>:

                                    <p class="font-normal text-sm lg:text-base text-white px-2">
                                        print<span class="text-[#88C999]"> ("Five is greater than two!")</span>
                                    </p>
                                </h3>
                                <br />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- learn -->

        <section class="container mx-auto bg-[#0D1721]">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-7 pt-28 pb-36 px-5">
                <div class="grid justify-center bg-[#FFC0C7] rounded-lg lg:mr-5 px-10">
                    <!-- php -->
                    <div class="block w-full h-full rounded-xl p-4">
                        <div class="max-w-lg space-y-5 grid justify-center justify-items-center">
                            <h2 class="font-bold text-3xl lg:text-5xl text-black pb-4 pt-5">
                                PHP
                            </h2>
                            <p class="font-normal text-lg text-black text-center">
                                A web server programming language
                            </p>
                            <div class="pb-5">
                                <button
                                    class="px-10 py-2 rounded-3xl text-base font-normal text-white transition-all duration-300 bg-[#0D1721]">
                                    Learn PHP
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="grid justify-center bg-[#FFF4A3] rounded-lg lg:mr-5 px-10">
                    <!-- Java Script -->
                    <div class="block rounded-xl p-4">
                        <div class="max-w-lg space-y-5 grid justify-center justify-items-center">
                            <h2 class="font-bold text-3xl lg:text-5xl text-black pb-4 pt-5">
                                Java Script
                            </h2>
                            <p class="font-normal text-lg text-black text-center">
                                A JS library for developing web pages
                            </p>
                            <div class="pb-5">
                                <button
                                    class="px-10 py-2 rounded-3xl text-base font-normal text-white transition-all duration-300 bg-[#0D1721]">
                                    Learn jQuery
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="grid justify-center bg-[#F3ECEA] rounded-lg lg:mr-5 px-10">
                    <!-- Python -->
                    <div class="block w-full h-full rounded-xl p-4">
                        <div class="max-w-lg space-y-5 grid justify-center justify-items-center">
                            <h2 class="font-bold text-3xl lg:text-5xl text-black pb-4 pt-5">
                                Python
                            </h2>
                            <p class="font-normal text-lg text-black text-center">
                                A programming language
                            </p>
                            <div class="pb-5">
                                <button
                                    class="px-10 py-2 rounded-3xl text-base font-normal text-white transition-all duration-300 bg-[#0D1721]">
                                     Learn Python
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="grid justify-center bg-[#D9EEE1] rounded-lg lg:mr-5 px-10">
                    <!-- C -->
                    <div class="block rounded-xl p-4">
                        <div class="max-w-lg space-y-5 grid justify-center justify-items-center">
                            <h2 class="font-bold text-3xl lg:text-5xl text-black pb-4 pt-5">
                                C
                            </h2>
                            <p class="font-normal text-lg text-black text-center">
                                A programming language
                            </p>
                            <div class="pb-5">
                                <button
                                    class="px-10 py-2 rounded-3xl text-base font-normal text-white transition-all duration-300 bg-[#0D1721]">
                                    Learn C
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="grid items-center justify-center mt-10 py-16 px-5">
                <div class="space-y-5 py-10">
                    <h3 class="font-bold text-6xl text-white text-center">
                        Code Editor
                    </h3>
                    <p class="font-normal text-xl text-white text-center">
                        With our online code editor, you can edit code and view the result
                        in your browser
                    </p>
                </div>
                <div class="px-5">
                    <img src="{{asset('images/editor.jpg')}}" alt="de">
                    <div class="mt-5 w-[20rem] md:w-96 rounded-lg mb-10">
                        <h3 class="bg-[#FFF4A3] font-normal text-base md:text-lg p-2 text-center">
                            Try Backend Editor (Python/PHP/Java/C..)
                        </h3>
                    </div>
                </div>
            </div>
        </section>
        <!-- my learning -->
        <section class="bg-[#D9EEE1]">
            <div class="container mx-auto">
                <h3 class="font-bold text-6xl text-center pt-10 md:pt-20 pb-12 text-black">
                    My Learning
                </h3>
                <p class="font-bold text-xl text-center text-black pb-5">
                    Track your progress with our free "My Learning" program.
                </p>
                <p class="font-bold text-xl text-center text-black pb-10">
                    Log in to your account, and start earning points!
                </p>
                <!-- browse -->
                <div class="relative flex md:flex-col justify-center p-10 lg:p-20 xl:p-36">
                    <div class="rounded-lg border shadow-md flex flex-col px-10 py-14 bg-white">
                        <h3 class="font-bold text-3xl pb-4">Hi, Liam</h3>
                        <p class="font-normal text-lg xl:text-xl text-gray-600 w-full lg:w-2/5 xl:w-7/12">
                            Welcome to the new "My learning hear at ELP.This willbe
                            your hub to all the tutorials we offer and your learning
                            prograss.
                        </p>
                        <p class="font-normal text-lg xl:text-xl w-full lg:w-2/5 xl:w-full text-gray-600 pt-3">
                            We hope you will continue to learn with us.
                        </p>

                        <div class="pt-10 flex flex-col lg:flex-row w-full lg:w-2/5 xl:w-full">
                            <button
                                class="px-10 lg:px-4 py-2 rounded-3xl text-sm xl:text-base font-normal text-white transition-all duration-300 bg-[#0D1721]">
                                Continue"Learn C++""
                            </button>
                            <button class="px-10 lg:px-4 py-2 rounded-3xl text-sm xl:text-base font-medium text-black">
                                Browse tutorials
                            </button>
                        </div>
                    </div>
                    <!-- Progress -->
                    <div
                        class="absolute min-[320px]:top-[46rem] min-[375px]:top-[42rem] min-[425px]:top-[40rem] min-[566px]:top-[34rem] md:top-[30rem] lg:top-0 xl:top-3 left-0 lg:left-[23rem] xl:left-[33rem] 2xl:left-[46rem] right-0 flex items-center justify-center">
                        <card class="w-80 md:w-96 rounded-lg border shadow-md flex flex-col p-5 bg-white">
                            <!-- Top Section -->
                            <div class="relative my-5 flex flex-col items-center">
                                <div class="absolute">
                                    <h3 class="text-3xl font-bold text-black text-center">
                                        Good Job!
                                    </h3>
                                    <p class="pt-3 text-xl font-normal text-black text-center">
                                        Your Score
                                    </p>
                                </div>
                            </div>
                            <!-- donut chart -->
                            <div class="flex justify-center items-center top-0">
                                <div class="w-60 md:w-72 bg-white">
                                    <div class="">
                                        <canvas id="myChart"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="relative">
                                <div class="absolute -top-32 lg:-top-36 left-20 md:left-28 lg:left-24">
                                    <h3 class="font-bold text-5xl lg:text-6xl xl:text-7xl text-center">
                                        2297
                                    </h3>
                                    <p class="font-bold text-xl text-center">Points</p>
                                </div>
                            </div>
                            <!-- Bottom Section -->
                            <div class="mx-auto">
                                <div class="relative isolate overflow-hidden bg-white">
                                    <div class="flex w-full flex-wrap items-center justify-between gap-4 pb-5 lg:flex-nowrap">
                                        <div class="lg:max-w-xl">
                                            <h2 class="block w-full pb-2 font-normal text-lg">
                                                Score factor
                                            </h2>
                                            <div class="grid grid-cols-2 gap-4 justify-center text-lg">
                                                <div href="#" class="bg-white border flex-grow text-black rounded-md w-full">
                                                    <div class="border-r-8 border-[#D9EEE1] rounded-md pl-2 pr-9 py-2">
                                                        <h3 class="font-bold text-xl">755</h3>
                                                        <p class="text-gray-500 font-normal text-sm">
                                                            lesson read
                                                        </p>
                                                    </div>
                                                </div>
                                                <div href="#" class="bg-white border flex-grow text-black rounded-md w-full">
                                                    <div class="border-r-8 border-white pl-2 pr-9 py-2 rounded-md">
                                                        <h3 class="font-bold text-xl">
                                                            15 <i class="fa-solid fa-star"></i>
                                                        </h3>
                                                        <p class="text-gray-500 font-normal text-sm">
                                                            stars collected
                                                        </p>
                                                    </div>
                                                </div>
                                                <div href="#" class="bg-white border flex-grow text-black rounded-md w-full">
                                                    <div class="border-r-8 border-green-500 pl-2 pr-9 py-2 rounded-md">
                                                        <h3 class="font-bold text-xl">948</h3>
                                                        <p class="text-gray-500 font-normal text-sm">
                                                            quiz points
                                                        </p>
                                                    </div>
                                                </div>
                                                <div href="#" class="bg-white border flex-grow text-black rounded-md w-full">
                                                    <div class="border-r-8 border-[#FFF4A3] rounded-md pl-2 pr-9 py-2">
                                                        <h3 class="font-bold text-xl">594</h3>
                                                        <p class="text-gray-500 font-normal text-sm">
                                                            exercise points
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </card>
                    </div>
                </div>
            </div>
            <div>
                <div class="grid justify-center pt-[45rem] lg:pt-10 pb-28">
                    <button
                        class="px-24 py-4 rounded-full text-xl font-normal text-white transition-all duration-300 bg-[#A435F0] hover:bg-purple-500">
                        Sign Up for Free
                    </button>
                </div>
            </div>
        </section>
        <!-- Exercises and Quizzes -->
        <section class="bg-[#0D1721]">
            <div class="container mx-auto py-20 px-5">
                <h3 class="font-bold text-4xl md:text-6xl text-white text-center">
                    Exercises and Quizzes
                </h3>
                <p class="font-bold text-lg md:text-xl text-white text-center pt-8">
                    Test your skills!
                </p>
                <div class="grid grid-cols-1 lg:grid-cols-2 justify-center gap-14 px-5 pt-14">
                    <div class="grid justify-center bg-[#A435F0] rounded-lg lg:mr-5 px-10">
                        <!-- Exercises -->
                        <div class="block w-full h-full rounded-xl p-4">
                            <div class="max-w-lg space-y-5 grid justify-center justify-items-center">
                                <h2 class="font-normal text-3xl lg:text-4xl text-white py-16 px-16 md:px-44">
                                    Exercises
                                </h2>
                            </div>
                        </div>
                    </div>

                    <div class="grid justify-center bg-[#FFF4A3] rounded-lg lg:mr-5 px-10">
                        <!-- Quizzes -->
                        <div class="block w-full h-full rounded-xl p-4">
                            <div class="max-w-lg space-y-5 grid justify-center justify-items-center">
                                <h2 class="font-normal text-3xl lg:text-4xl text-black py-16 px-16 md:px-44">
                                    Quizzes
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>






@endsection
