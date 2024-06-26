@extends('layouts.auth')

@section('content')


    <main class="container mx-auto py-10 px-4">
        <!-- component -->
        <div class="flex items-center justify-center w-full">
            <div
                class="bg-white dark:bg-gray-900 shadow-md border rounded-lg px-8 py-6 w-[32rem]"
            >
                <form class="py-10" action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="pb-10">
                        <span class="text-3xl font-bold">Sign up</span>
                    </div>
                    <div>
                        <div class="flex items-center justify-between px-1">
                            <label
                                for="email"
                                class="block text-base font-semibold leading-6 text-black"
                            >Email</label
                            >
                            <div class="flex text-sm">
                                <p class="text-sm font-normal">Already have an account?</p>
                                <a
                                    href="{{route('login')}}"
                                    class="font-semibold text-[#A435F0] hover:text-purple-500 pl-4"
                                >Log in</a
                                >
                            </div>
                        </div>
                        <div class="mt-2">
                            <input type="email" name="email" value="{{ old('email') }}" required

                                   class="w-full rounded-md py-2 px-4 border text-sm md:text-lg ring-1 ring-inset ring-gray-300 focus:ring-1 focus:ring-inset focus:ring-balck"
                            />
                            @error('email')
                            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="mt-6">
                        <div class="flex items-center justify-between px-1">
                            <label
                                for="name"
                                class="block text-base font-semibold leading-6 text-black"
                            >Name</label
                            >
                        </div>
                        <div class="mt-2">
                            <input type="text" name="name" value="{{ old('name') }}" required

                                   class="w-full rounded-md py-2 px-4 border text-sm md:text-lg ring-1 ring-inset ring-gray-300 focus:ring-1 focus:ring-inset focus:ring-balck"
                            />
                            @error('name')
                            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    <!-- password -->
                    <div class="mt-6">
                        <div class="flex items-center justify-between px-1">
                            <label
                                for="password"
                                class="block text-base font-semibold leading-6 text-black"
                            >Password</label
                            >
                            <div class="flex text-sm cursor-pointer" id="togglePassword">
                                <p class="text-sm font-normal mr-2">Show</p>
                                <i class="pt-1 fa-solid fa-eye-slash" id="toggleIcon" style="color: #000000;"></i>
                            </div>
                        </div>
                        <div class="mt-2">
                            <input
                                id="passwordInput"  type="password" name="password" required value="{{ old('password') }}"
                                class="w-full rounded-md py-2 px-4 border text-sm md:text-lg ring-1 ring-inset ring-gray-300 focus:ring-1 focus:ring-inset focus:ring-balck"
                            />
                            @error('password')
                            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                        <div class="mb-4">
                            <div class="grid grid-cols-2 gap-2 mt-2">
                                <ul id="passwordCriteriaList1" class="px-4">
                                    <li class="list-disc marker:text-gray-500" data-criteria="lowercase">One lowercase character</li>
                                    <li class="list-disc marker:text-gray-500" data-criteria="uppercase">One uppercase character</li>
                                    <li class="list-disc marker:text-gray-500" data-criteria="number">One number</li>
                                </ul>
                                <ul id="passwordCriteriaList2" class="px-4">
                                    <li class="list-disc marker:text-gray-500" data-criteria="special">One special character</li>
                                    <li class="list-disc marker:text-gray-500" data-criteria="minLength">6 characters minimum</li>
                                </ul>
                            </div>
                        </div>

                        <!-- login btn -->
                    <div class="block mt-6">
                        <button type="submit"
                                class="h-12 w-full rounded-3xl text-lg font-semibold text-white transition-all duration-300 bg-[#A435F0] hover:bg-purple-500"
                        >
                            Sign up for free
                        </button>
                    </div>
                    <!-- hr -->
                    <div
                        class="inline-flex relative items-center justify-center w-full"
                    >
                        <hr
                            class="w-full h-px my-8 bg-gray-300 border-0 dark:bg-gray-700"
                        />
                        <span
                            class="absolute px-3 font-medium text-black -translate-x-1/2 bg-white left-1/2 dark:text-white dark:bg-gray-900"
                        >OR</span
                        >
                    </div>
                    <!-- github -->
                    <div class="block mt-6">
                        <a
                            href="{{route('login.github')}}"
                            class="border-black group m-auto my-0 inline-flex h-12 w-full items-center justify-center space-x-2 rounded-3xl border px-4 py-2 transition-colors duration-300 focus:outline-none"
                        >
                  <span>
                    <svg
                        class="h-5 w-5 fill-current text-black"
                        viewBox="0 0 16 16"
                        version="1.1"
                        aria-hidden="true"
                    >
                      <path
                          fill-rule="text-white"
                          d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.013 8.013 0 0016 8c0-4.42-3.58-8-8-8z"
                      ></path>
                    </svg>
                  </span>
                            <span class="text-base font-normal text-black dark:text-white"
                            >Continue with GitHub</span
                            >
                        </a>
                    </div>
                        </div>
                </form>
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/izitoast/dist/js/iziToast.min.js"></script>
    <script src="{{asset('js/passwordValidation.js')}}"></script>
    <script src="{{asset('js/togglePasswordVisibility.js')}}"></script>

@endsection
