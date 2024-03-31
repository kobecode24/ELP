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
                <h3 class="font-normal text-base text-black text-center py-10 md:py-14 lg:py-20">
                    Based on your experience, we think these resources will be helpful.
                </h3>
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
